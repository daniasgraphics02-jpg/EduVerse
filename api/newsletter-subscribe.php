<?php
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../includes/config.php';

function newsletterRespond(int $httpCode, bool $success, string $message): void
{
    http_response_code($httpCode);
    echo json_encode(['success' => $success, 'message' => $message]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    newsletterRespond(405, false, 'Invalid request method.');
}

$email = trim($_POST['email'] ?? '');

if ($email === '') {
    newsletterRespond(400, false, 'Please enter your email address.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    newsletterRespond(400, false, 'That doesn\'t look like a valid email address.');
}

$stmt = $conn->prepare(
    "SELECT id FROM newsletter_subscribers WHERE email = ?"
);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->close();
    newsletterRespond(200, true, 'You\'re already subscribed — thanks for being with us!');
}
$stmt->close();

$insertStmt = $conn->prepare(
    "INSERT INTO newsletter_subscribers (email, subscribed_at) VALUES (?, NOW())"
);
$insertStmt->bind_param("s", $email);

if ($insertStmt->execute()) {
    $insertStmt->close();
    newsletterRespond(200, true, 'You have subscribed! Watch your inbox for updates.');
}

$insertStmt->close();
newsletterRespond(500, false, 'Something went wrong. Please try again in a moment.');
