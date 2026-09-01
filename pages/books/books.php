<!-- books.php -->


<?php require_once __DIR__ . '/../../includes/config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Books | EduVerse</title>


    <!-- Core CSS -->
    <link rel="stylesheet" href="../../Assets/css/core/style.css">
    <link rel="stylesheet" href="../../Assets/css/core/components.css">
    <link rel="stylesheet" href="../../Assets/css/core/animations.css">
    <link rel="stylesheet" href="../../Assets/css/core/utilities.css">
    <!-- Layout -->
     <?php $activePage = 'books'; ?>
    <link rel="stylesheet" href="../../Assets/css/sidebar.css">
    <link rel="stylesheet" href="../../Assets/css/header.css">
    <link rel="stylesheet" href="../../Assets/css/footer.css">
    <link rel="stylesheet" href="../../Assets/css/responsive.css">
    <!-- content -->
     <link rel="stylesheet" href="assets/css/books-hero.css">
    <link rel="stylesheet" href="assets/css/books-categories.css">
    <link rel="stylesheet" href="assets/css/featured-books.css">

    <link rel="stylesheet" href="assets/css/books-by-category.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


</head>


<body>


<?php include("../../includes/sidebar.php"); ?>


<?php include("../../includes/header.php"); ?>



<div class="main-content">


    <div class="page-container">


       <?php include("includes/books-hero.php"); ?>
       <?php include("includes/book-categories.php"); ?>
       <?php include("includes/featured-books.php"); ?>

        <?php include("../../includes/footer.php"); ?>


    </div>


</div>

<script src="../../Assets/js/sidebar-header.js"></script>

</body>

</html>