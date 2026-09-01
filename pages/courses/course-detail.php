<?php require_once __DIR__ . '/../../includes/config.php'; ?>
<?php require_once __DIR__ . '/data/courses-data.php'; ?>
<?php

$slug = $_GET['slug'] ?? '';
$id   = isset($_GET['id']) ? (int) $_GET['id'] : -1;

if (!isset($coursesData[$slug]) || !isset($coursesData[$slug]['courses'][$id])) {
    header("Location: " . BASE_URL . "pages/courses/courses.php");
    exit();
}

$category = $coursesData[$slug];
$course   = $category['courses'][$id];

$courseImagePath = __DIR__ . '/assets/images/' . ($course['image'] ?? '');
$imageUrl = ($course['image'] && file_exists($courseImagePath))
    ? BASE_URL . 'pages/courses/assets/images/' . htmlspecialchars($course['image'])
    : BASE_URL . 'pages/courses/assets/images/course-placeholder.png';

// Optional fields — not present in the source data your partner sent.
// Left here so you (or your partner) can add real numbers to
// data/courses-data.php later without touching this template.
$fees   = $course['fees']   ?? null;
$rating = $course['rating'] ?? null;

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course['title']); ?> | EduVerse</title>

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
            <a href="category.php?slug=<?php echo urlencode($slug); ?>">
                <i class="bi bi-arrow-left"></i> Back to <?php echo htmlspecialchars($category['name']); ?> Courses
            </a>
        </div>

        <!-- ================= HERO BANNER ================= -->
        <div class="detail-hero" style="background-image: linear-gradient(180deg, rgba(10,14,26,0.35) 0%, rgba(10,14,26,0.92) 100%), url('<?php echo $imageUrl; ?>');">

            <div class="detail-hero-content">

                <span class="detail-category-tag">
                    <i class="bi <?php echo htmlspecialchars($category['icon']); ?>"></i>
                    <?php echo htmlspecialchars($category['name']); ?>
                </span>

                <h1><?php echo htmlspecialchars($course['title']); ?></h1>

                <a class="institute-badge detail-hero-institute" href="#institute-section">
                    <i class="bi bi-building"></i> <?php echo htmlspecialchars($course['institute']); ?>
                </a>

                <div class="detail-hero-stats">
                    <?php foreach ($course['meta'] as $m): ?>
                        <div class="hero-stat">
                            <span class="hero-stat-emoji"><?php echo $m['emoji']; ?></span>
                            <div>
                                <p class="hero-stat-label"><?php echo htmlspecialchars($m['label']); ?></p>
                                <p class="hero-stat-value"><?php echo htmlspecialchars($m['value']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>

        <!-- ================= BODY ================= -->
        <div class="detail-grid">

            <div class="detail-main">

                <section class="detail-section">
                    <h2>Course Overview</h2>
                    <p class="detail-desc"><?php echo htmlspecialchars($course['description']); ?></p>
                </section>

                <section class="detail-section" id="institute-section">
                    <h2>Offered By</h2>
                    <div class="institute-info-card">
                        <div class="institute-info-icon"><i class="bi bi-building"></i></div>
                        <div>
                            <h3><?php echo htmlspecialchars($course['institute']); ?></h3>
                            <p>One of EduVerse's partner institutes. Full syllabus, fee structure, and enrollment details are listed on their official course page.</p>
                        </div>
                    </div>
                </section>

            </div>

            <aside class="detail-aside">

                <div class="quick-facts-card">

                    <h3>Quick Facts</h3>

                    <div class="fact-row">
                        <span class="fact-label"><i class="bi bi-building"></i> Institute</span>
                        <span class="fact-value"><?php echo htmlspecialchars($course['institute']); ?></span>
                    </div>

                    <?php foreach ($course['meta'] as $m): ?>
                        <div class="fact-row">
                            <span class="fact-label"><?php echo $m['emoji']; ?> <?php echo htmlspecialchars($m['label']); ?></span>
                            <span class="fact-value"><?php echo htmlspecialchars($m['value']); ?></span>
                        </div>
                    <?php endforeach; ?>

                    <div class="fact-row">
                        <span class="fact-label"><i class="bi bi-cash-coin"></i> Fees</span>
                        <span class="fact-value <?php echo $fees ? '' : 'fact-value-muted'; ?>">
                            <?php echo $fees ? htmlspecialchars($fees) : 'See institute site'; ?>
                        </span>
                    </div>

                    <div class="fact-row">
                        <span class="fact-label"><i class="bi bi-star"></i> Rating</span>
                        <span class="fact-value <?php echo $rating ? '' : 'fact-value-muted'; ?>">
                            <?php echo $rating ? htmlspecialchars($rating) : 'Not yet rated'; ?>
                        </span>
                    </div>

                    <a href="<?php echo htmlspecialchars($course['url']); ?>"
                       target="_blank" rel="noopener noreferrer"
                       class="visit-btn detail-enroll-btn">
                        Enroll on Website
                        <i class="bi bi-box-arrow-up-right"></i>
                    </a>

                </div>

            </aside>

        </div>

        <?php include(__DIR__ . "/../../includes/footer.php"); ?>

    </div>

</div>

<script src="<?php echo BASE_URL; ?>Assets/js/sidebar-header.js"></script>

</body>
</html>