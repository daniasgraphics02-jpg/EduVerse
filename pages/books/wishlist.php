<?php require_once __DIR__ . '/../../includes/config.php'; ?>
<?php

/*
    Handles three cases:
    1. ?action=add&id=X    -> add a book to the logged-in user's wishlist
    2. ?action=remove&id=X -> remove a book from the wishlist
    3. no action           -> show the full wishlist page
*/

$action = $_GET['action'] ?? '';
$bookId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Safe redirect target: back to wherever the click came from,
// falling back to this same page. Only allow redirecting within
// this site, never to an external URL.
$referer = $_SERVER['HTTP_REFERER'] ?? '';
$redirectTo = (strpos($referer, BASE_URL) === 0) ? $referer : (BASE_URL . 'pages/books/wishlist.php');

if ($action === 'add' || $action === 'remove') {

    if (!isset($_SESSION['user_id'])) {
        header('Location: ' . BASE_URL . 'login.php');
        exit();
    }

    $userId = (int) $_SESSION['user_id'];

    if ($action === 'add' && $bookId > 0) {
        $stmt = $conn->prepare(
            "INSERT INTO book_wishlist (user_id, book_id)
             SELECT ?, ? FROM DUAL
             WHERE NOT EXISTS (
                 SELECT 1 FROM book_wishlist WHERE user_id = ? AND book_id = ?
             )"
        );
        $stmt->bind_param("iiii", $userId, $bookId, $userId, $bookId);
        $stmt->execute();
        $stmt->close();
    }

    if ($action === 'remove' && $bookId > 0) {
        $stmt = $conn->prepare("DELETE FROM book_wishlist WHERE user_id = ? AND book_id = ?");
        $stmt->bind_param("ii", $userId, $bookId);
        $stmt->execute();
        $stmt->close();
    }

    header('Location: ' . $redirectTo);
    exit();
}

// -------- Display mode (no action) --------

if (!isset($_SESSION['user_id'])) {
    header('Location: ' . BASE_URL . 'login.php');
    exit();
}

$userId = (int) $_SESSION['user_id'];

$stmt = $conn->prepare(
    "SELECT b.*, c.category_name
     FROM book_wishlist w
     JOIN books b ON w.book_id = b.id
     LEFT JOIN book_categories c ON b.category_id = c.id
     WHERE w.user_id = ?
     ORDER BY w.created_at DESC"
);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$wishlistBooks = [];
while ($row = $result->fetch_assoc()) {
    $wishlistBooks[] = $row;
}
$stmt->close();

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
    <title>My Wishlist | EduVerse</title>

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/components.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/animations.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/core/utilities.css">

    <!-- Layout -->
    <?php $activePage = 'wishlist'; ?>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/header.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/footer.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/responsive.css">

    <!-- content -->
    <link rel="stylesheet" href="assets/css/featured-books.css">
    <link rel="stylesheet" href="assets/css/wishlist.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>

<?php include(__DIR__ . "/../../includes/sidebar.php"); ?>
<?php include(__DIR__ . "/../../includes/header.php"); ?>

<div class="main-content">

    <div class="page-container">

        <div class="wishlist-header">
            <h1>My Wishlist</h1>
            <p><?php echo count($wishlistBooks); ?> book<?php echo count($wishlistBooks) === 1 ? '' : 's'; ?> saved</p>
        </div>

        <?php if (empty($wishlistBooks)): ?>

            <div class="no-results">
                <i class="bi bi-heart"></i>
                <h3>Your wishlist is empty</h3>
                <p>Tap the heart on any book to save it here for later.</p>
                <a href="<?php echo BASE_URL; ?>pages/books/books.php" class="visit-btn">Browse Books</a>
            </div>

        <?php else: ?>

            <div class="books-grid">
                <?php foreach ($wishlistBooks as $b):
                    $imgSrc = BASE_URL . 'pages/books/uploads/bookcovers/' . htmlspecialchars($b['image_folder']) . '/' . htmlspecialchars($b['image']);
                    $hasSale = !empty($b['sale_price']);
                ?>

                    <div class="book-card">

                        <div class="book-image">
                            <img src="<?php echo $imgSrc; ?>" alt="<?php echo htmlspecialchars($b['title']); ?>">
                            <?php if ($b['featured'] === 'Yes'): ?>
                                <span class="book-badge">Bestseller</span>
                            <?php endif; ?>
                            <a href="<?php echo BASE_URL; ?>pages/books/wishlist.php?action=remove&id=<?php echo $b['id']; ?>" class="book-wishlist" title="Remove from wishlist">
                                <i class="bi bi-heart-fill"></i>
                            </a>
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
                                <a href="<?php echo BASE_URL; ?>pages/books/wishlist.php?action=remove&id=<?php echo $b['id']; ?>" class="cart-btn">Remove</a>
                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>
            </div>

        <?php endif; ?>

        <?php include(__DIR__ . "/../../includes/footer.php"); ?>

    </div>

</div>

<script src="<?php echo BASE_URL; ?>Assets/js/sidebar-header.js"></script>

</body>
</html>