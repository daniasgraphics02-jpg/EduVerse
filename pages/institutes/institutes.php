<?php require_once __DIR__ . '/../../includes/config.php'; ?>
<?php require_once __DIR__ . '/../courses/data/courses-data.php'; ?>
<?php require_once __DIR__ . '/data/institutes-data.php'; ?>
<?php

// Count real courses per institute by matching institute name
// keywords against every course entry already in courses-data.php.
function countCourses($coursesData, $keyword) {
    $count = 0;
    foreach ($coursesData as $cat) {
        foreach ($cat['courses'] as $course) {
            if (stripos($course['institute'], $keyword) !== false) {
                $count++;
            }
        }
    }
    return $count;
}

foreach ($institutesData as &$inst) {
    $inst['count'] = countCourses($coursesData, $inst['keyword']);
}
unset($inst);

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institutes | EduVerse</title>

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
    <link rel="stylesheet" href="assets/css/institutes.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>

<?php include(__DIR__ . "/../../includes/sidebar.php"); ?>
<?php include(__DIR__ . "/../../includes/header.php"); ?>

<div class="main-content">

    <div class="page-container">

        <div class="institutes-hero">
            <span class="section-badge">🤝 Partner Institutes</span>
            <h1>Every Institute Behind EduVerse's Courses</h1>
            <p>Browse the real institutes offering courses on EduVerse, and see exactly how many courses each one has listed.</p>
        </div>

        <div class="institutes-list-grid">

            <?php foreach ($institutesData as $inst): ?>

                <div class="institute-card">

                    <div class="institute-card-logo">
                        <img src="<?php echo BASE_URL; ?>Assets/images/<?php echo rawurlencode($inst['logo']); ?>" alt="<?php echo htmlspecialchars($inst['name']); ?>">
                    </div>

                    <h3><?php echo htmlspecialchars($inst['name']); ?></h3>

                    <span class="institute-course-count">
                        <?php if ($inst['count'] > 0): ?>
                            <?php echo $inst['count']; ?> course<?php echo $inst['count'] === 1 ? '' : 's'; ?> on EduVerse
                        <?php else: ?>
                            Courses coming soon
                        <?php endif; ?>
                    </span>

                    <a href="<?php echo htmlspecialchars($inst['slug']); ?>.php" class="institute-card-btn">
                        View Institute <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            <?php endforeach; ?>

        </div>

        <?php include(__DIR__ . "/../../includes/footer.php"); ?>

    </div>

</div>

<script src="<?php echo BASE_URL; ?>Assets/js/sidebar-header.js"></script>

</body>
</html>