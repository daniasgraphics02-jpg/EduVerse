<?php require_once __DIR__ . '/../../includes/config.php'; ?>
<?php require_once __DIR__ . '/data/courses-data.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses | EduVerse</title>

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/components.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/animations.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/utilities.css">

    <!-- Layout -->
    <?php $activePage = 'courses'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/header.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/footer.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/responsive.css">

    <!-- content -->
    <link rel="stylesheet" href="assets/css/courses-hero.css">
    <link rel="stylesheet" href="assets/css/courses-institutes.css">
    <link rel="stylesheet" href="assets/css/course-category.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>


<body>


<?php include(__DIR__ . "/../../includes/sidebar.php"); ?>


<?php include(__DIR__ . "/../../includes/header.php"); ?>


<div class="main-content">


    <div class="page-container">


        <?php include(__DIR__ . "/includes/courses-hero.php"); ?>
        <?php include(__DIR__ . "/includes/courses-institutes.php"); ?>

        <section class="courses-category-section" id="categories">

            <div class="container">

                <div class="category-grid-header">
                    <span class="section-badge">📚 ALL CATEGORIES</span>
                    <h2>Browse Courses by Category</h2>
                    <p>Pick a track below to see every course EduVerse has found for it, pulled from Pakistan's partner institutes.</p>
                </div>

                <div class="category-grid">

                    <?php foreach ($coursesData as $slug => $cat): ?>

                        <a href="category.php?slug=<?php echo urlencode($slug); ?>" class="category-card">
                            <div class="category-icon"><i class="bi <?php echo htmlspecialchars($cat['icon']); ?>"></i></div>
                            <h3><?php echo htmlspecialchars($cat['name']); ?></h3>
                            <span class="category-count"><?php echo count($cat['courses']); ?> courses</span>
                            <span class="category-arrow">Explore courses &rarr;</span>
                        </a>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>

        <?php include(__DIR__ . "/../../includes/footer.php"); ?>


    </div>


</div>

<script src="<?php echo BASE_URL; ?>Assets/js/sidebar-header.js"></script>

</body>

</html>
