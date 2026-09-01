<?php
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../includes/ai-config.php';

// While building/testing locally, this adds a short "debug" field to error
// responses (visible in the Network tab) so you can see exactly which stage
// failed. It never includes the API key. Set this to false before treating
// the project as finished/handed in.
// Debug mode adds a "debug" field to error responses in the Network tab.
// Leave this false — only flip to true temporarily if something breaks again.
define('EDUVERSE_AI_DEBUG', false);

function eduverseAiFail(int $httpCode, string $userMessage, string $debugReason): void
{
    error_log('EduVerse AI: ' . $debugReason);
    http_response_code($httpCode);
    $body = ['error' => $userMessage];
    if (EDUVERSE_AI_DEBUG) {
        $body['debug'] = $debugReason;
    }
    echo json_encode($body);
    exit();
}

// only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    eduverseAiFail(405, 'Method not allowed.', 'request was not POST');
}

if (!function_exists('curl_init')) {
    eduverseAiFail(500, 'Sorry, EduVerse AI is temporarily unavailable. Please try again in a moment.', 'the PHP curl extension is not enabled — enable extension=curl in php.ini and restart Apache');
}

$rawBody = file_get_contents('php://input');
$payload = json_decode($rawBody, true);

if (json_last_error() !== JSON_ERROR_NONE || !is_array($payload)) {
    eduverseAiFail(400, 'Sorry, EduVerse AI could not read that message. Please try again.', 'request body was not valid JSON');
}

$userMessage = isset($payload['message']) ? trim((string) $payload['message']) : '';
$historyIn   = isset($payload['history']) && is_array($payload['history']) ? $payload['history'] : [];

if ($userMessage === '') {
    eduverseAiFail(400, 'Please type a message first.', 'message field was empty');
}

if (function_exists('mb_strlen')) {
    $tooLong = mb_strlen($userMessage) > EDUVERSE_AI_MAX_MESSAGE_LENGTH;
} else {
    $tooLong = strlen($userMessage) > EDUVERSE_AI_MAX_MESSAGE_LENGTH;
}

if ($tooLong) {
    eduverseAiFail(400, 'That message is a bit long — could you shorten it?', 'message exceeded max length');
}

if (!defined('GROQ_API_KEY') || GROQ_API_KEY === '') {
    eduverseAiFail(503, 'Sorry, EduVerse AI is temporarily unavailable. Please try again in a moment.', 'GROQ_API_KEY is empty — create includes/ai-key.local.php with your key');
}

function eduverseAiSystemPrompt(): string
{
    return <<<PROMPT
You are EduVerse AI, the official educational assistant built into the EduVerse platform, a website that helps students in Pakistan discover courses, books, and training institutes.

Your job is to help visitors and students:
- Find suitable courses and understand what EduVerse offers
- Find books and learning resources
- Learn about partner institutes
- Think through learning paths and what to study next
- Understand general educational/career topics
- Get directed to the right section of the EduVerse website

REAL EduVerse content you can rely on (do not invent beyond this list):

Course categories on the Courses page: Artificial Intelligence, Machine Learning, Data Science, Data Analytics, Business Analytics, Generative AI, Natural Language Processing, Cloud Computing, DevOps, Cybersecurity, Ethical Hacking, Digital Forensics, Blockchain, Computer Networking, Front-End Development, Back-End Development, App Development, Game Development, Python Programming, Certificate in IT (CIT), Graphic Designing, Video Editing, Digital Marketing, Shopify & E-Commerce, Power BI.

Book categories: Technology (Programming, Web Development, and related), Creative (Graphic Design and related), Business (Digital Marketing and related), Personal Growth (Productivity and related).

Partner institutes listed on the Institutes page: Aptech Computer Education, Arena Multimedia, Bano Qabil (Alkhidmat Youth Program), Saylani Mass IT Training (SMIT), Al-Khair Academy / Foundation, Corvit Systems, Omni Academy, Cisco Networking Academy, JDC Free IT City, NED University of Engineering & Technology, Virtual University of Pakistan (VU), Coursera.

Main sections of the site: Home, Courses, Books, Institutes, Wishlist, Blog, FAQs, Contact/Help Center.

IMPORTANT RULES:
- Do not invent specific course names, instructors, prices, durations, or ratings — you don't have access to that level of detail. Point the user to the Courses or Books page to see current listings instead.
- EduVerse includes an AI Career Advisor for a guided career assessment and a Roadmaps section for saved learning plans. Explain these features accurately, but do not invent scientific guarantees.
- Do not claim EduVerse has features it doesn't have (no progress tracking, no live counselor booking, no enrollment automation).
- Be concise, warm, and encouraging — you're talking to students figuring out what to learn.
- If asked something unrelated to education or EduVerse, politely steer back to what you can help with.
- Keep replies short (2-5 sentences) unless the user asks for more detail.
PROMPT;
}

$messages = [
    ['role' => 'system', 'content' => eduverseAiSystemPrompt()],
];

$historyIn = array_slice($historyIn, -1 * (EDUVERSE_AI_MAX_HISTORY_TURNS * 2));

foreach ($historyIn as $turn) {
    if (!is_array($turn) || !isset($turn['role'], $turn['content'])) {
        continue;
    }
    $role = $turn['role'] === 'assistant' ? 'assistant' : 'user';
    $content = trim((string) $turn['content']);
    if ($content === '') {
        continue;
    }
    $messages[] = ['role' => $role, 'content' => mb_substr($content, 0, EDUVERSE_AI_MAX_MESSAGE_LENGTH)];
}

$messages[] = ['role' => 'user', 'content' => $userMessage];

$requestBody = json_encode([
    'model'       => GROQ_MODEL,
    'messages'    => $messages,
    'temperature' => 0.6,
    'max_tokens'  => 400,
]);

$ch = curl_init(GROQ_API_ENDPOINT);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $requestBody,
    CURLOPT_HTTPHEADER     => [
        'Content-Type: application/json',
        'Authorization: Bearer ' . GROQ_API_KEY,
    ],
    CURLOPT_TIMEOUT        => EDUVERSE_AI_TIMEOUT_SECONDS,
    CURLOPT_CONNECTTIMEOUT => 10,
]);

$response  = curl_exec($ch);
$curlErrno = curl_errno($ch);
$curlError = curl_error($ch);
$httpCode  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($response === false) {
    if ($curlErrno === 60 || stripos($curlError, 'certificate') !== false) {
        eduverseAiFail(502, 'Sorry, EduVerse AI is temporarily unavailable. Please try again in a moment.',
            "cURL SSL certificate error ({$curlError}) — this is the common XAMPP/Windows issue: PHP curl has no CA bundle. Fix: download https://curl.se/ca/cacert.pem, save it somewhere like C:\\xampp\\php\\cacert.pem, then in php.ini set curl.cainfo=\"C:\\xampp\\php\\cacert.pem\" and openssl.cafile to the same path, then fully restart Apache.");
    }
    eduverseAiFail(502, 'Sorry, EduVerse AI is temporarily unavailable. Please try again in a moment.',
        "cURL could not reach Groq — errno {$curlErrno}: {$curlError}");
}

if ($httpCode === 401 || $httpCode === 403) {
    eduverseAiFail(503, 'Sorry, EduVerse AI is temporarily unavailable. Please try again in a moment.',
        "Groq rejected the request (HTTP {$httpCode}) — the API key is likely wrong, expired, or missing 'Bearer '. Response: {$response}");
}

if ($httpCode === 429) {
    eduverseAiFail(429, 'EduVerse AI is a little busy right now — please try again in a few seconds.',
        'Groq rate limit hit (HTTP 429)');
}

if ($httpCode >= 500) {
    eduverseAiFail(502, 'Sorry, EduVerse AI is temporarily unavailable. Please try again in a moment.',
        "Groq server error (HTTP {$httpCode}). Body: {$response}");
}

$decoded = json_decode($response, true);

if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
    eduverseAiFail(502, 'Sorry, EduVerse AI is temporarily unavailable. Please try again in a moment.',
        'Groq response was not valid JSON. Body: ' . substr((string) $response, 0, 300));
}

$reply = $decoded['choices'][0]['message']['content'] ?? '';
$reply = trim((string) $reply);

if ($httpCode !== 200 || $reply === '') {
    eduverseAiFail(502, 'Sorry, EduVerse AI is temporarily unavailable. Please try again in a moment.',
        "unexpected response, HTTP {$httpCode}. Body: " . substr((string) $response, 0, 300));
}

http_response_code(200);
echo json_encode(['reply' => $reply]);
