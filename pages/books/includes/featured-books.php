<?php

// Which of these 5 books (if any) are already in the logged-in
// user's wishlist, so the heart shows filled/outline correctly.
$wishlistedIds = [];
if (isset($_SESSION['user_id'])) {
    $uid = (int) $_SESSION['user_id'];
    $wl = $conn->prepare("SELECT book_id FROM book_wishlist WHERE user_id = ?");
    $wl->bind_param("i", $uid);
    $wl->execute();
    $wlResult = $wl->get_result();
    while ($row = $wlResult->fetch_assoc()) {
        $wishlistedIds[] = (int) $row['book_id'];
    }
    $wl->close();
}

function wishlistHeart($bookId, $wishlistedIds) {
    $isWishlisted = in_array((int) $bookId, $wishlistedIds, true);
    $icon = $isWishlisted ? 'bi-heart-fill' : 'bi-heart';
    $action = $isWishlisted ? 'remove' : 'add';
    echo '<a href="' . BASE_URL . 'pages/books/wishlist.php?action=' . $action . '&id=' . $bookId . '" class="book-wishlist">';
    echo '<i class="bi ' . $icon . '"></i>';
    echo '</a>';
}

?>

<section class="featured-books">

    <div class="section-heading">

        <span class="section-badge">
            📚 Featured Books
        </span>

        <h2>
            Popular
            <span class="gradient-text">Books</span>
        </h2>

        <p>
            Discover the most recommended books across technology, design, business, and personal development.
        </p>

    </div>


    <div class="books-grid">


        <!-- ================= Book 1 ================= -->

        <div class="book-card">

            <div class="book-image">

                <img src="https://picsum.photos/400/600?random=1" alt="Book Cover">

                <span class="book-badge">
                    Bestseller
                </span>

                <?php wishlistHeart(1, $wishlistedIds); ?>

            </div>

            <div class="book-content">

                <span class="book-category">
                    Programming
                </span>

                <h3 class="book-title">
                    Clean Code
                </h3>

                <p class="book-author">
                    Robert C. Martin
                </p>

                <div class="book-rating">

                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>

                    <span>4.8</span>

                </div>

                <div class="book-price">

                    <span class="current-price">
                        Free
                    </span>

                </div>

                <div class="book-actions">

                    <a href="<?php echo BASE_URL; ?>pages/books/book-details.php?id=1" class="details-btn">
                        Details
                    </a>

                    <a href="<?php echo BASE_URL; ?>pages/books/book-details.php?id=1" class="cart-btn">
                        Read
                    </a>

                </div>

            </div>

        </div>


        <!-- ================= Book 2 ================= -->

        <div class="book-card">

            <div class="book-image">

                <img src="https://picsum.photos/400/600?random=2" alt="Book Cover">

                <span class="book-badge">
                    New
                </span>

                <?php wishlistHeart(71, $wishlistedIds); ?>

            </div>

            <div class="book-content">

                <span class="book-category">
                    Artificial Intelligence
                </span>

                <h3 class="book-title">
                    AI Superpowers
                </h3>

                <p class="book-author">
                    Kai-Fu Lee
                </p>

                <div class="book-rating">

                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>

                    <span>4.5</span>

                </div>

                <div class="book-price">

                    <span class="current-price">
                        Free
                    </span>

                </div>

                <div class="book-actions">

                    <a href="<?php echo BASE_URL; ?>pages/books/book-details.php?id=71" class="details-btn">
                        Details
                    </a>

                    <a href="<?php echo BASE_URL; ?>pages/books/book-details.php?id=71" class="cart-btn">
                        Read
                    </a>

                </div>

            </div>

        </div>


        <!-- ================= Book 3 ================= -->

        <div class="book-card">

            <div class="book-image">

                <img src="https://picsum.photos/400/600?random=3" alt="Book Cover">

                <span class="book-badge">
                    Popular
                </span>

                <?php wishlistHeart(174, $wishlistedIds); ?>

            </div>

            <div class="book-content">

                <span class="book-category">
                    UI / UX
                </span>

                <h3 class="book-title">
                    Don't Make Me Think
                </h3>

                <p class="book-author">
                    Steve Krug
                </p>

                <div class="book-rating">

                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>

                    <span>5.0</span>

                </div>

                <div class="book-price">

                    <span class="current-price">
                        Free
                    </span>

                </div>

                <div class="book-actions">

                    <a href="<?php echo BASE_URL; ?>pages/books/book-details.php?id=174" class="details-btn">
                        Details
                    </a>

                    <a href="<?php echo BASE_URL; ?>pages/books/book-details.php?id=174" class="cart-btn">
                        Read
                    </a>

                </div>

            </div>

        </div>


        <!-- ================= Book 4 ================= -->

        <div class="book-card">

            <div class="book-image">

                <img src="https://picsum.photos/400/600?random=4" alt="Book Cover">

                <span class="book-badge">
                    Trending
                </span>

                <?php wishlistHeart(258, $wishlistedIds); ?>

            </div>

            <div class="book-content">

                <span class="book-category">
                    Business
                </span>

                <h3 class="book-title">
                    The Lean Startup
                </h3>

                <p class="book-author">
                    Eric Ries
                </p>

                <div class="book-rating">

                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>

                    <span>4.7</span>

                </div>

                <div class="book-price">

                    <span class="current-price">
                        Free
                    </span>

                </div>

                <div class="book-actions">

                    <a href="<?php echo BASE_URL; ?>pages/books/book-details.php?id=258" class="details-btn">
                        Details
                    </a>

                    <a href="<?php echo BASE_URL; ?>pages/books/book-details.php?id=258" class="cart-btn">
                        Read
                    </a>

                </div>

            </div>

        </div>

<!-- ================= Book 5 ================= -->

        <div class="book-card">

            <div class="book-image">

                <img src="https://picsum.photos/400/600?random=5" alt="Book Cover">

                <span class="book-badge">
                    Trending
                </span>

                <?php wishlistHeart(290, $wishlistedIds); ?>

            </div>

            <div class="book-content">

                <span class="book-category">
                    Finance
                </span>

                <h3 class="book-title">
                    The Psychology of Money
                </h3>

                <p class="book-author">
                    Morgan Housel
                </p>

                <div class="book-rating">

                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>

                    <span>4.7</span>

                </div>

                <div class="book-price">

                    <span class="current-price">
                        Free
                    </span>

                </div>

                <div class="book-actions">

                    <a href="<?php echo BASE_URL; ?>pages/books/book-details.php?id=290" class="details-btn">
                        Details
                    </a>

                    <a href="<?php echo BASE_URL; ?>pages/books/book-details.php?id=290" class="cart-btn">
                        Read
                    </a>

                </div>

            </div>

        </div>


    </div>

</section>