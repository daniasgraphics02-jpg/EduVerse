<?php
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../includes/config.php';

function contactRespond(int $httpCode, bool $success, string $message): void
{
    http_response_code($httpCode);
    echo json_encode(['success' => $success, 'message' => $message]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    contactRespond(405, false, 'Invalid request method.');
}

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
    contactRespond(400, false, 'Please fill in your name, email and message.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    contactRespond(400, false, 'That doesn\'t look like a valid email address.');
}

if (mb_strlen($message) < 10) {
    contactRespond(400, false, 'Your message is a bit short — tell us a little more.');
}

$stmt = $conn->prepare(
    "INSERT INTO contact_messages (name, email, message, submitted_at) VALUES (?, ?, ?, NOW())"
);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    $stmt->close();
    contactRespond(200, true, 'Thanks for reaching out — we\'ll get back to you within 24–48 hours.');
}

$stmt->close();
contactRespond(500, false, 'Something went wrong. Please try again in a moment.');
