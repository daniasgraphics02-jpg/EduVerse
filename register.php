<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduVerse - Student Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="reg.css?v=3">
</head>
<body>

    <div class="glass-container">
        <div class="form-header">
            <h2>Join <span>EduVerse</span></h2>
            <p>Create your account to start learning</p>
        </div>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert-error">
                <?php 
                    if ($_GET['error'] == 'emptyfields') echo "Please fill in all fields.";
                    elseif ($_GET['error'] == 'invalidemail') echo "Please enter a valid email address.";
                    elseif ($_GET['error'] == 'weakpassword') echo "Password must be at least 8 characters.";
                    elseif ($_GET['error'] == 'passwordmatch') echo "Passwords do not match.";
                    elseif ($_GET['error'] == 'emailtaken') echo "Email is already registered!";
                    elseif ($_GET['error'] == 'sqlerror') echo "Database error. Try again.";
                ?>
            </div>
        <?php endif; ?>

        <form action="register_process.php" method="POST">
            <div class="input-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" placeholder="e.g. Ali Khan" required>
            </div>

            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="name@example.com" required>
            </div>

            <!-- Password with Eye Icon -->
            <div class="input-group">
                <label for="password">Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                    <i class="fa-regular fa-eye toggle-password" onclick="togglePassword('password', this)"></i>
                </div>
            </div>

            <div class="input-group">
                <label for="confirm_password">Confirm Password</label>
                <div class="password-wrapper">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="••••••••" required>
                    <i class="fa-regular fa-eye toggle-password" onclick="togglePassword('confirm_password', this)"></i>
                </div>
            </div>

            <button type="submit" name="register_submit" class="submit-btn">Create Account</button>
        </form>

        <div class="form-footer">
            Already have an account? <a href="login.php">Login here</a>
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