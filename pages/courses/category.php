<?php require_once __DIR__ . '/../../includes/config.php'; ?>
<?php require_once __DIR__ . '/data/courses-data.php'; ?>
<?php

$slug = $_GET['slug'] ?? '';

if (!isset($coursesData[$slug])) {
    header("Location: " . BASE_URL . "pages/courses/courses.php");
    exit();
}

$category = $coursesData[$slug];

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($category['name']); ?> Courses | EduVerse</title>

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

        <div class="category-back-link">
            <a href="courses.php">
                <i class="bi bi-arrow-left"></i> All Course Categories
            </a>
        </div>

        <div class="banner">
            <h1><?php echo htmlspecialchars($category['banner_title']); ?></h1>
            <p><?php echo htmlspecialchars($category['banner_desc']); ?></p>
        </div>

        <div class="container">

            <?php foreach ($category['courses'] as $id => $course): ?>

                <a href="course-detail.php?slug=<?php echo urlencode($slug); ?>&id=<?php echo $id; ?>"
                   class="course-card-horizontal">

                    <img
                        src="<?php
                            $courseImagePath = __DIR__ . '/assets/images/' . ($course['image'] ?? '');
                            echo ($course['image'] && file_exists($courseImagePath))
                                ? BASE_URL . 'pages/courses/assets/images/' . htmlspecialchars($course['image'])
                                : BASE_URL . 'pages/courses/assets/images/course-placeholder.png';
                        ?>"
                        alt="<?php echo htmlspecialchars($course['title']); ?>"
                        class="course-img">

                    <div class="course-details">
                        <div>
                            <span class="institute-badge"><?php echo htmlspecialchars($course['institute']); ?></span>
                            <h3><?php echo htmlspecialchars($course['title']); ?></h3>

                            <div class="meta-info">
                                <?php foreach ($course['meta'] as $m): ?>
                                    <span><?php echo $m['emoji']; ?> <strong><?php echo htmlspecialchars($m['label']); ?>:</strong> <?php echo htmlspecialchars($m['value']); ?></span>
                                <?php endforeach; ?>
                            </div>

                            <p class="course-desc"><?php echo htmlspecialchars($course['description']); ?></p>
                        </div>

                        <span class="visit-btn">View Details &rarr;</span>
                    </div>

                </a>

            <?php endforeach; ?>

        </div>

        <?php include(__DIR__ . "/../../includes/footer.php"); ?>

    </div>

</div>

<script src="<?php echo BASE_URL; ?>Assets/js/sidebar-header.js"></script>

</body>
</html>
