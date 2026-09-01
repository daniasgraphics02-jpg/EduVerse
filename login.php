<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduVerse - Student Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="reg.css?v=3">
</head>
<body>

    <div class="glass-container">
        <div class="form-header">
            <h2>Welcome to <span>EduVerse</span></h2>
            <p>Enter your credentials to access your account</p>
        </div>

        <?php if (isset($_GET['signup']) && $_GET['signup'] === 'success'): ?>
            <div class="alert-success">
                Account created successfully. Please log in.
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert-error">
                <?php 
                    if ($_GET['error'] == 'emptyfields') echo "Please fill in all fields.";
                    elseif ($_GET['error'] == 'wrongcredentials') echo "Invalid email or password.";
                    elseif ($_GET['error'] == 'sqlerror') echo "Database error. Try again.";
                ?>
            </div>
        <?php endif; ?>

        <form action="login_process.php" method="POST">
            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="name@example.com" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                    <i class="fa-regular fa-eye toggle-password" onclick="togglePassword('password', this)"></i>
                </div>
            </div>

            <button type="submit" name="login_submit" class="submit-btn">Login</button>
        </form>

        <div class="form-footer">
            Don't have an account? <a href="register.php">Register here</a>
        </div>
    </div>

    <script>
        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>