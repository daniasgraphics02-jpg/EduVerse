<?php require_once __DIR__ . '/../../includes/config.php'; ?>
<?php require_once __DIR__ . '/../courses/data/courses-data.php'; ?>
<?php require_once __DIR__ . '/../institutes/data/institutes-data.php'; ?>
<?php

$q = trim($_GET['q'] ?? '');

$bookResults = [];
if ($q !== '') {
    $stmt = $conn->prepare(
        "SELECT b.*, c.category_name
         FROM books b
         LEFT JOIN book_categories c ON b.category_id = c.id
         WHERE b.status = 'Active'
           AND (b.title LIKE ? OR b.author LIKE ? OR c.category_name LIKE ?)
         ORDER BY b.featured DESC, b.rating DESC
         LIMIT 12"
    );
    $like = "%{$q}%";
    $stmt->bind_param("sss", $like, $like, $like);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $bookResults[] = $row;
    }
    $stmt->close();
}

$courseResults = [];
if ($q !== '') {
    foreach ($coursesData as $slug => $cat) {
        foreach ($cat['courses'] as $id => $course) {
            $haystack = $course['title'] . ' ' . $course['institute'] . ' ' . $cat['name'] . ' ' . $course['description'];
            if (stripos($haystack, $q) !== false) {
                $courseResults[] = [
                    'slug' => $slug,
                    'id' => $id,
                    'category_name' => $cat['name'],
                    'course' => $course,
                ];
            }
        }
    }
}

$instituteResults = [];
if ($q !== '') {
    foreach ($institutesData as $inst) {
        if (stripos($inst['name'], $q) !== false || stripos($inst['keyword'], $q) !== false) {
            $courseCount = 0;
            foreach ($coursesData as $cat) {
                foreach ($cat['courses'] as $course) {
                    if (stripos($course['institute'], $inst['keyword']) !== false) {
                        $courseCount++;
                    }
                }
            }
            $inst['courseCount'] = $courseCount;
            $instituteResults[] = $inst;
        }
    }
}

$totalResults = count($bookResults) + count($courseResults) + count($instituteResults);

function starRating($rating) {
    $rating = (float) $rating;
    $full = floor($rating);
    $half = ($rating - $full) >= 0.5;
    $html = '';
    for ($i = 0; $i < $full; $i++) $html .= '<i class="bi bi-star-fill"></i>';
    if ($half) $html .= '<i class="bi bi-star-half"></i>';
    $empty = 5 - $full - ($half ? 1 : 0);
    for ($i = 0; $i < $empty; $i++) $html .= '<i class="bi bi-star"></i>';
    return $html;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $q !== '' ? htmlspecialchars($q) . ' — Search Results' : 'Search'; ?> | EduVerse</title>

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/components.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/animations.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/utilities.css">

    <!-- Layout -->
    <?php $activePage = ''; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/header.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/footer.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/responsive.css">

    <!-- content (reusing existing card styles from all three sections) -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>pages/books/assets/css/featured-books.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>pages/courses/assets/css/course-category.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>pages/institutes/assets/css/institutes.css">
    <link rel="stylesheet" href="assets/css/search-results.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>

<?php include(__DIR__ . "/../../includes/sidebar.php"); ?>
<?php include(__DIR__ . "/../../includes/header.php"); ?>

<div class="main-content">

    <div class="page-container">

        <div class="search-results-header">
            <?php if ($q === ''): ?>
                <h1>Search EduVerse</h1>
                <p>Type something in the search bar above to find books, courses, and institutes.</p>
            <?php else: ?>
                <h1>Results for "<?php echo htmlspecialchars($q); ?>"</h1>
                <p><?php echo $totalResults; ?> result<?php echo $totalResults === 1 ? '' : 's'; ?> found</p>
            <?php endif; ?>
        </div>

        <?php if ($q !== '' && $totalResults === 0): ?>

            <div class="no-results">
                <i class="bi bi-search"></i>
                <h3>No results for "<?php echo htmlspecialchars($q); ?>"</h3>
                <p>Try a different keyword, or check the spelling.</p>
            </div>

        <?php endif; ?>

        <?php if (!empty($instituteResults)): ?>

            <section class="search-section">
                <h2>Institutes <span><?php echo count($instituteResults); ?></span></h2>

                <div class="institutes-list-grid">
                    <?php foreach ($instituteResults as $inst): ?>

                        <div class="institute-card">

                            <div class="institute-card-logo">
                                <img src="<?php echo BASE_URL; ?>Assets/images/<?php echo rawurlencode($inst['logo']); ?>" alt="<?php echo htmlspecialchars($inst['name']); ?>">
                            </div>

                            <h3><?php echo htmlspecialchars($inst['name']); ?></h3>

                            <span class="institute-course-count">
                                <?php if ($inst['courseCount'] > 0): ?>
                                    <?php echo $inst['courseCount']; ?> course<?php echo $inst['courseCount'] === 1 ? '' : 's'; ?> on EduVerse
                                <?php else: ?>
                                    Courses coming soon
                                <?php endif; ?>
                            </span>

                            <a href="<?php echo BASE_URL; ?>pages/institutes/<?php echo htmlspecialchars($inst['slug']); ?>.php" class="institute-card-btn">
                                View Institute <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    <?php endforeach; ?>
                </div>
            </section>

        <?php endif; ?>

        <?php if (!empty($courseResults)): ?>

            <section class="search-section">
                <h2>Courses <span><?php echo count($courseResults); ?></span></h2>

                <div class="container">
                    <?php foreach ($courseResults as $r): $course = $r['course']; ?>

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
                                    <span class="institute-badge"><?php echo htmlspecialchars($course['institute']); ?></span>
                                    <h3><?php echo htmlspecialchars($course['title']); ?></h3>
                                    <p class="course-desc"><?php echo htmlspecialchars($course['description']); ?></p>
                                </div>
                                <span class="visit-btn">View Details &rarr;</span>
                            </div>

                        </a>

                    <?php endforeach; ?>
                </div>
            </section>

        <?php endif; ?>

        <?php if (!empty($bookResults)): ?>

            <section class="search-section">
                <h2>Books <span><?php echo count($bookResults); ?></span></h2>

                <div class="books-grid">
                    <?php foreach ($bookResults as $b):
                        $imgSrc = BASE_URL . 'pages/books/uploads/bookcovers/' . htmlspecialchars($b['image_folder']) . '/' . htmlspecialchars($b['image']);
                        $hasSale = !empty($b['sale_price']);
                    ?>

                        <div class="book-card">

                            <div class="book-image">
                                <img src="<?php echo $imgSrc; ?>" alt="<?php echo htmlspecialchars($b['title']); ?>">
                                <?php if ($b['featured'] === 'Yes'): ?>
                                    <span class="book-badge">Bestseller</span>
                                <?php endif; ?>
                                <div class="book-wishlist"><i class="bi bi-heart"></i></div>
                            </div>

                            <div class="book-content">

                                <span class="book-category"><?php echo htmlspecialchars($b['category_name'] ?? ''); ?></span>
                                <h3 class="book-title"><?php echo htmlspecialchars($b['title']); ?></h3>
                                <p class="book-author"><?php echo htmlspecialchars($b['author']); ?></p>

                                <div class="book-rating">
                                    <?php echo starRating($b['rating']); ?>
                                    <span><?php echo number_format((float) $b['rating'], 1); ?></span>
                                </div>

                                <div class="book-price">
                                    <?php if ($hasSale): ?>
                                        <span class="current-price">Rs. <?php echo number_format($b['sale_price']); ?></span>
                                        <span class="old-price" style="text-decoration:line-through; opacity:.6; margin-left:8px; font-size:12px;">
                                            Rs. <?php echo number_format($b['price']); ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="current-price">Rs. <?php echo number_format($b['price']); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="book-actions">
                                    <a href="<?php echo BASE_URL; ?>pages/books/book-details.php?id=<?php echo $b['id']; ?>" class="details-btn">Details</a>
                                    <a href="<?php echo BASE_URL; ?>pages/books/book-details.php?id=<?php echo $b['id']; ?>" class="cart-btn">Read</a>
                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>
                </div>
            </section>

        <?php endif; ?>

        <?php include(__DIR__ . "/../../includes/footer.php"); ?>

    </div>

</div>

<script src="<?php echo BASE_URL; ?>Assets/js/sidebar-header.js"></script>

</body>
</html>