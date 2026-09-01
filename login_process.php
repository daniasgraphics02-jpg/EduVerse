<?php
ob_start();
session_start();
require_once 'db.php';

if (isset($_POST['login_submit'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        header("Location: login.php?error=emptyfields");
        exit();
    }

    $stmt = $conn->prepare("SELECT id, full_name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {

            // Prevent session fixation by issuing a fresh session ID on login
            session_regenerate_id(true);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];

            header("Location: Index.php");
            exit();
        } else {
            header("Location: login.php?error=wrongcredentials");
            exit();
        }
    } else {
        header("Location: login.php?error=wrongcredentials");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
ob_end_flush();