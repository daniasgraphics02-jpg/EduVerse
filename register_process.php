<?php
session_start();
require_once 'db.php'; 

if (isset($_POST['register_submit'])) {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($full_name) || empty($email) || empty($password) || empty($confirm_password)) {
        header("Location: register.php?error=emptyfields");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?error=invalidemail");
        exit();
    }

    if (strlen($password) < 8) {
        header("Location: register.php?error=weakpassword");
        exit();
    }

    if ($password !== $confirm_password) {
        header("Location: register.php?error=passwordmatch");
        exit();
    }

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: register.php?error=emailtaken");
        exit();
    }
    $stmt->close();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $insert_stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
    $insert_stmt->bind_param("sss", $full_name, $email, $hashed_password);

    if ($insert_stmt->execute()) {
        header("Location: login.php?signup=success");
        exit();
    } else {
        header("Location: register.php?error=sqlerror");
        exit();
    }
} else {
    header("Location: register.php");
    exit();
}