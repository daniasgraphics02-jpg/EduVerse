<?php
/*
    Shared institute detail page renderer.

    Each of the 7 institute files (aptech.php, arena.php, etc.)
    sets these 4 variables, then includes this file:

        $instituteName    - full display name
        $instituteKeyword - text to match against course['institute']
        $instituteLogo    - filename inside Assets/images/
        $instituteSlug    - matches the filename, e.g. 'aptech'

    This keeps all 7 pages in sync instead of duplicating the
    same ~150 lines of markup seven times.
*/

require_once __DIR__ . '/../../../includes/config.php';
require_once __DIR__ . '/../../courses/data/courses-data.php';

$instituteCourses = [];
foreach ($coursesData as $slug => $cat) {
    foreach ($cat['courses'] as $id => $course) {
        if (stripos($course['institute'], $instituteKeyword) !== false) {
            $instituteCourses[] = [
                'slug' => $slug,
                'id' => $id,
                'category_name' => $cat['name'],
                'course' => $course,
            ];
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($instituteName); ?> | EduVerse</title>

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/components.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/animations.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/utilities.css">

    <!-- Layout -->
    <?php $activePage = 'institutes'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/header.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/footer.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/responsive.css">

    <!-- content -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>pages/institutes/assets/css/institutes.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>pages/courses/assets/css/course-category.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>

<?php include(__DIR__ . "/../../../includes/sidebar.php"); ?>
<?php include(__DIR__ . "/../../../includes/header.php"); ?>

<div class="main-content">

    <div class="page-container">

        <div class="category-back-link">
            <a href="<?php echo BASE_URL; ?>pages/institutes/institutes.php">
                <i class="bi bi-arrow-left"></i> All Institutes
            </a>
        </div>

        <div class="institute-detail-hero">

            <div class="institute-detail-logo">
                <img src="<?php echo BASE_URL; ?>Assets/images/<?php echo rawurlencode($instituteLogo); ?>" alt="<?php echo htmlspecialchars($instituteName); ?>">
            </div>

            <div>
                <h1><?php echo htmlspecialchars($instituteName); ?></h1>
                <span class="institute-course-count">
                    <?php echo count($instituteCourses); ?> course<?php echo count($instituteCourses) === 1 ? '' : 's'; ?> on EduVerse
                </span>
            </div>

        </div>

        <?php if (empty($instituteCourses)): ?>

            <div class="no-results">
                <i class="bi bi-mortarboard"></i>
                <h3>No courses listed yet</h3>
                <p><?php echo htmlspecialchars($instituteName); ?> doesn't have any courses on EduVerse yet — check back soon.</p>
            </div>

        <?php else: ?>

            <div class="container">
                <?php foreach ($instituteCourses as $r): $course = $r['course']; ?>

                    <a href="<?php echo BASE_URL; ?>pages/courses/course-detail.php?slug=<?php echo urlencode($r['slug']); ?>&id=<?php echo $r['id']; ?>"
                       class="course-card-horizontal">

                        <img
                            src="<?php echo $course['image']
                                ? BASE_URL . 'pages/courses/assets/images/' . htmlspecialchars($course['image'])
                                : BASE_URL . 'pages/courses/assets/images/course-placeholder.png'; ?>"
                            alt="<?php echo htmlspecialchars($course['title']); ?>"
                            class="course-img">

                        <div class="course-details">
                            <div>
                                <span class="institute-badge"><?php echo htmlspecialchars($r['category_name']); ?></span>
                                <h3><?php echo htmlspecialchars($course['title']); ?></h3>
                                <p class="course-desc"><?php echo htmlspecialchars($course['description']); ?></p>
                            </div>
                            <span class="visit-btn">View Details &rarr;</span>
                        </div>

                    </a>

                <?php endforeach; ?>
            </div>

        <?php endif; ?>

        <?php include(__DIR__ . "/../../../includes/footer.php"); ?>

    </div>

</div>

<script src="<?php echo BASE_URL; ?>Assets/js/sidebar-header.js"></script>

</body>
</html>
