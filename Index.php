<?php require_once __DIR__ . '/includes/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduVerse</title>
    

    <!-- Core CSS -->
<link rel="stylesheet" href="Assets/css/core/style.css">
<link rel="stylesheet" href="Assets/css/core/components.css">
<link rel="stylesheet" href="Assets/css/core/animations.css">
<link rel="stylesheet" href="Assets/css/core/utilities.css">

<!-- Layout & Sections -->
<link rel="stylesheet" href="Assets/css/sidebar.css">
<link rel="stylesheet" href="Assets/css/header.css">
<link rel="stylesheet" href="Assets/css/hero.css">
<link rel="stylesheet" href="Assets/css/categories.css">
<link rel="stylesheet" href="Assets/css/dashboard.css">
<link rel="stylesheet" href="Assets/css/institutes.css">
<link rel="stylesheet" href="Assets/css/why-eduverse.css">
<link rel="stylesheet" href="Assets/css/statistics.css">
<link rel="stylesheet" href="Assets/css/testimonials.css">
<link rel="stylesheet" href="Assets/css/featured-resources.css">
<link rel="stylesheet" href="Assets/css/responsive.css">

<link rel="stylesheet" href="Assets/css/success-stories.css">
<link rel="stylesheet" href="Assets/css/faq.css">
<link rel="stylesheet" href="Assets/css/final-cta.css">
<link rel="stylesheet" href="Assets/css/footer.css">

    <!-- fontawesome icons -->
     <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
       
</style>
</head>

<body>


<!-- sidebar -->
 <?php $activePage = 'home'; ?>
 <?php include 'includes/sidebar.php'; ?>

 <!-- header -->
    <?php include 'includes/header.php'; ?>


<div class="main-content">

    <div class="page-container">

        <?php include 'includes/hero.php'; ?>

        <?php include 'includes/categories.php'; ?>

        <?php include 'includes/dashboard.php'; ?>

        <?php include 'includes/why-eduverse.php'; ?>

        <?php include 'includes/statistics.php'; ?>

        <?php include 'includes/testimonials.php'; ?>

        <?php include 'includes/featured-resources.php'; ?>

        <?php include 'includes/success-stories.php'; ?>

        <?php include 'includes/faq.php'; ?>

        <?php include 'includes/final-cta.php'; ?>

        <?php include 'includes/footer.php'; ?>

    </div>

</div>


  <script src="Assets/js/sidebar-header.js"></script>
<script src="Assets/js/dashboard.js"></script>
<script src="Assets/js/statistics.js"></script>
<script src="Assets/js/faq.js"></script>
</body>
</html>