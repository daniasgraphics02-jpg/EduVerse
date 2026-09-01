<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduVerse Dashboard</title>
    <link rel="stylesheet" href="reg.css?v=3">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body, button, a, h2, p {
            font-family: 'Poppins', sans-serif !important;
        }

        .glass-container {
            max-width: 600px;
            text-align: center;
            margin: 0 auto;
        }

        .submit-btn {
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>
<body>

    <div class="glass-container">
        <div class="form-header">
            <h2>Welcome, <span><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>!</h2>
            <p>You have successfully logged into EduVerse.</p>
        </div>

        <a href="Index.php" class="submit-btn">Explore Eduverse</a>
    </div>

</body>
</html>