<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../../includes/config.php");


/*=========================================================
                    GET BOOK ID
=========================================================*/

$bookId = isset($_GET['id'])
    ? (int) $_GET['id']
    : 0;


if ($bookId <= 0) {

    die("Invalid book ID.");

}


/*=========================================================
                    BOOK IMAGE FUNCTION
=========================================================*/

function getBookImage($book)
{
    $folder = trim($book['image_folder'] ?? '');
    $image  = trim($book['image'] ?? '');


    /*
        If database values are empty.
    */

    if ($folder === '' || $image === '') {

        return "uploads/bookcovers/placeholders/no-book.png";

    }


    /*
        Remove accidental slashes.
    */

    $folder = trim($folder, "/\\");
    $image  = trim($image, "/\\");


    /*
        Physical file path.

        This file is:

        pages/books/book-details.php

        Therefore __DIR__ is:

        pages/books/

        So this checks:

        pages/books/uploads/bookcovers/
        technology/html-css.jpg
    */

    $physicalPath =
        __DIR__
        . DIRECTORY_SEPARATOR
        . "uploads"
        . DIRECTORY_SEPARATOR
        . "bookcovers"
        . DIRECTORY_SEPARATOR
        . $folder
        . DIRECTORY_SEPARATOR
        . $image;


    /*
        If the physical file exists,
        return the browser URL.
    */

    if (file_exists($physicalPath)) {

        return "uploads/bookcovers/"
            . rawurlencode($folder)
            . "/"
            . rawurlencode($image);

    }


    /*
        File does not exist.
    */

    return "uploads/bookcovers/placeholders/no-book.png";
}


/*=========================================================
                    GET BOOK
=========================================================*/

$bookStmt = mysqli_prepare(

    $conn,

    "SELECT
        books.*,
        book_categories.category_name

     FROM books

     LEFT JOIN book_categories
        ON books.category_id = book_categories.id

     WHERE books.id = ?

     AND books.status = 'Active'

     LIMIT 1"

);


if (!$bookStmt) {

    die(
        "Book query preparation failed: "
        . mysqli_error($conn)
    );

}


mysqli_stmt_bind_param(
    $bookStmt,
    "i",
    $bookId
);


mysqli_stmt_execute($bookStmt);


$bookResult =
    mysqli_stmt_get_result($bookStmt);


$book =
    mysqli_fetch_assoc($bookResult);


if (!$book) {

    die("Book not found.");

}


/*=========================================================
                    RELATED BOOKS
=========================================================*/

$relatedStmt = mysqli_prepare(

    $conn,

    "SELECT *

     FROM books

     WHERE category_id = ?

     AND id != ?

     AND status = 'Active'

     ORDER BY featured DESC,
              rating DESC,
              id DESC

     LIMIT 4"

);


if (!$relatedStmt) {

    die(
        "Related books query failed: "
        . mysqli_error($conn)
    );

}


mysqli_stmt_bind_param(

    $relatedStmt,

    "ii",

    $book['category_id'],

    $bookId

);


mysqli_stmt_execute($relatedStmt);


$relatedBooks =
    mysqli_stmt_get_result($relatedStmt);


/*=========================================================
                    BOOK VALUES
=========================================================*/

$bookTitle = htmlspecialchars(

    $book['title'] ?? 'Untitled Book'

);


$bookAuthor = htmlspecialchars(

    $book['author'] ?? 'Unknown Author'

);


$bookCategory = htmlspecialchars(

    $book['category_name'] ?? 'Books'

);


$bookDescription = htmlspecialchars(

    $book['description'] ?? ''

);


$bookPrice = number_format(

    (float)($book['price'] ?? 0)

);


$bookRating = number_format(

    (float)($book['rating'] ?? 0),

    1

);


$bookStock =
    (int)($book['stock'] ?? 0);


/*=========================================================
                    BOOK IMAGE
=========================================================*/

$bookImage =
    getBookImage($book);

?>


<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>


<title>

<?php echo $bookTitle; ?>

| EduVerse

</title>


<!-- CORE CSS -->

<link
    rel="stylesheet"
    href="../../Assets/css/core/style.css"
>

<link
    rel="stylesheet"
    href="../../Assets/css/core/components.css"
>

<link
    rel="stylesheet"
    href="../../Assets/css/core/animations.css"
>

<link
    rel="stylesheet"
    href="../../Assets/css/core/utilities.css"
>


<!-- LAYOUT CSS -->

<link
    rel="stylesheet"
    href="../../Assets/css/sidebar.css"
>

<link
    rel="stylesheet"
    href="../../Assets/css/header.css"
>

<link
    rel="stylesheet"
    href="../../Assets/css/footer.css"
>


<!-- BOOK DETAILS CSS -->

<link
    rel="stylesheet"
    href="assets/css/book-details.css"
>


<!-- BOOTSTRAP ICONS -->

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>

</head>


<body class="book-details-page">


<?php include("../../includes/sidebar.php"); ?>


<?php include("../../includes/header.php"); ?>


<div class="main-content">

<div class="page-container">


<!--=========================================================
                    BOOK HERO
=========================================================-->

<section class="book-hero">


<!-- BOOK COVER -->

<div class="book-cover">

<img
    src="<?php echo htmlspecialchars($bookImage); ?>"
    alt="<?php echo $bookTitle; ?>"
>

</div>


<!-- BOOK INFORMATION -->

<div class="book-info">


<span class="book-category">

<i class="bi bi-book"></i>

<?php echo $bookCategory; ?>

</span>


<h1>

<?php echo $bookTitle; ?>

</h1>


<p class="book-author">

By

<strong>

<?php echo $bookAuthor; ?>

</strong>

</p>


<div class="book-rating">

<span class="rating-stars">

★★★★★

</span>

<span class="rating-number">

<?php echo $bookRating; ?>

/ 5

</span>

</div>


<div class="book-price">

Rs.

<?php echo $bookPrice; ?>

</div>


<div class="book-stock">

<?php

if ($bookStock > 0) {

?>

<span class="in-stock">

<i class="bi bi-check-circle-fill"></i>

In Stock

</span>

<?php

} else {

?>

<span class="out-stock">

<i class="bi bi-x-circle-fill"></i>

Out of Stock

</span>

<?php

}

?>

</div>


<div class="book-description">

<?php

echo nl2br($bookDescription);

?>

</div>


<a
    href="add-to-cart.php?id=<?php echo $bookId; ?>"
    class="cart-btn"
>

<i class="bi bi-cart-plus"></i>

Add to Cart

</a>


<a
    href="add-to-cart.php?id=<?php echo $bookId; ?>"
    class="buy-btn"
>

<i class="bi bi-lightning-fill"></i>

Buy Now

</a>


<a
    href="wishlist.php?action=add&id=<?php echo $bookId; ?>"
    class="wishlist-btn"
>

<i class="bi bi-heart"></i>

Wishlist

</a>


</div>

</section>


<!--=========================================================
                    ABOUT THIS BOOK
=========================================================-->

<section class="about-book">

<div class="section-title">

<span class="section-label">

📖 About This Book

</span>


<h2>

Discover What This Book Offers

</h2>

</div>


<div class="about-content">

<?php

if (!empty($book['about_book'])) {

    echo nl2br(
        htmlspecialchars(
            $book['about_book']
        )
    );

} else {

?>

<p>

<?php echo $bookDescription; ?>

</p>

<?php

}

?>

</div>

</section>


<!--=========================================================
                    WHAT YOU'LL LEARN
=========================================================-->

<section class="what-you-learn">

<div class="section-title">

<span class="section-label">

🎯 What You'll Learn

</span>


<h2>

Skills & Knowledge You'll Gain

</h2>

</div>


<?php

$learningItems = [];


if (!empty($book['what_you_learn'])) {

    $learningItems =
        preg_split(
            '/\|/',
            $book['what_you_learn']
        );

}

?>


<?php if (!empty($learningItems)) { ?>

<div class="learn-list">

<?php

foreach (
    $learningItems
    as $item
) {

    $item = trim($item);


    if ($item === '') {
        continue;
    }

?>

<div class="learn-item">

<i class="bi bi-check-circle-fill"></i>

<span>

<?php
echo htmlspecialchars($item);
?>

</span>

</div>

<?php

}

?>

</div>

<?php } else { ?>


<div class="learn-list">


<div class="learn-item">

<i class="bi bi-check-circle-fill"></i>

<span>

Understand the core concepts covered
in this book.

</span>

</div>


<div class="learn-item">

<i class="bi bi-check-circle-fill"></i>

<span>

Apply the knowledge through practical
examples.

</span>

</div>


<div class="learn-item">

<i class="bi bi-check-circle-fill"></i>

<span>

Build stronger professional skills
in this subject.

</span>

</div>


</div>

<?php } ?>

</section>


<!--=========================================================
                    BOOK INFORMATION
=========================================================-->

<section class="book-information">

<div class="section-title">

<span class="section-label">

📚 Book Information

</span>


<h2>

Specifications

</h2>

</div>


<div class="book-specifications">


<div class="spec-row">

<span class="spec-label">

<i class="bi bi-person"></i>

Author

</span>


<strong>

<?php

echo htmlspecialchars(
    $book['author']
    ?? 'Not Available'
);

?>

</strong>

</div>


<div class="spec-row">

<span class="spec-label">

<i class="bi bi-building"></i>

Publisher

</span>


<strong>

<?php

echo htmlspecialchars(
    $book['publisher']
    ?? 'Not Available'
);

?>

</strong>

</div>


<div class="spec-row">

<span class="spec-label">

<i class="bi bi-upc-scan"></i>

ISBN

</span>


<strong>

<?php

echo htmlspecialchars(
    $book['isbn']
    ?? 'Not Available'
);

?>

</strong>

</div>


<div class="spec-row">

<span class="spec-label">

<i class="bi bi-file-earmark-text"></i>

Pages

</span>


<strong>

<?php

echo !empty($book['pages'])

    ? number_format(
        (int)$book['pages']
    )

    : 'Not Available';

?>

</strong>

</div>


<div class="spec-row">

<span class="spec-label">

<i class="bi bi-translate"></i>

Language

</span>


<strong>

<?php

echo htmlspecialchars(

    !empty($book['language'])

        ? $book['language']

        : 'English'

);

?>

</strong>

</div>


<div class="spec-row">

<span class="spec-label">

<i class="bi bi-folder"></i>

Category

</span>


<strong>

<?php echo $bookCategory; ?>

</strong>

</div>


<div class="spec-row">

<span class="spec-label">

<i class="bi bi-star"></i>

Rating

</span>


<strong class="spec-rating">

★★★★★

<?php echo $bookRating; ?>/5

</strong>

</div>


<div class="spec-row">

<span class="spec-label">

<i class="bi bi-box-seam"></i>

Availability

</span>


<strong>

<?php

if ($bookStock > 0) {

    echo "✔ In Stock";

} else {

    echo "Out of Stock";

}

?>

</strong>

</div>


</div>

</section>


<!--=========================================================
                    CUSTOMER REVIEWS
=========================================================-->

<section class="customer-reviews">

<div class="section-title">

<span class="section-label">

⭐ Reviews & Ratings

</span>


<h2>

What Readers Say

</h2>

</div>


<div class="review-summary">


<div class="review-score">

<strong>

<?php echo $bookRating; ?>

</strong>


<div class="summary-stars">

★★★★★

</div>


<span>

Reader Rating

</span>

</div>


<div class="review-summary-text">

<p>

See what other readers think about
this book and share your own experience.

</p>


<a
    href="reviews.php?book_id=<?php echo $bookId; ?>"
    class="write-review-btn"
>

<i class="bi bi-pencil-square"></i>

Write a Review

</a>

</div>

</div>


<div class="reviews-list">


<article class="review-item">

<div class="review-header">

<div>

<h3>

Excellent Resource

</h3>


<span class="review-author">

EduVerse Reader

</span>

</div>


<span class="review-stars">

★★★★★

</span>

</div>


<p>

A very useful resource for anyone who
wants to strengthen their understanding
of the subject and apply the concepts
practically.

</p>

</article>


<article class="review-item">

<div class="review-header">

<div>

<h3>

Very Practical

</h3>


<span class="review-author">

Verified Reader

</span>

</div>


<span class="review-stars">

★★★★★

</span>

</div>


<p>

The explanations are clear and the
practical approach makes the material
much easier to understand.

</p>

</article>


<article class="review-item">

<div class="review-header">

<div>

<h3>

Worth Reading

</h3>


<span class="review-author">

EduVerse Reader

</span>

</div>


<span class="review-stars">

★★★★☆

</span>

</div>


<p>

A solid addition to a learner's library.
It provides useful knowledge that can
be applied beyond the classroom.

</p>

</article>


</div>

</section>


<!--=========================================================
                    RELATED BOOKS
=========================================================-->

<section class="related-books">

<div class="section-title">

<span class="section-label">

📚 You May Also Like

</span>


<h2>

More From <?php echo $bookCategory; ?>

</h2>

</div>


<div class="related-books-grid">


<?php

if (mysqli_num_rows($relatedBooks) > 0) {

    while (
        $related =
        mysqli_fetch_assoc($relatedBooks)
    ) {

        $relatedImage =
            getBookImage($related);

?>

<article class="related-book-card">


<a
    href="book-details.php?id=<?php echo (int)$related['id']; ?>"
    class="related-book-image"
>

<img
    src="<?php echo htmlspecialchars($relatedImage); ?>"
    alt="<?php echo htmlspecialchars($related['title']); ?>"
>

</a>


<div class="related-book-content">


<span class="related-category">

<?php
echo htmlspecialchars(
    $bookCategory
);
?>

</span>


<h3>

<?php
echo htmlspecialchars(
    $related['title']
);
?>

</h3>


<p>

<?php
echo htmlspecialchars(
    $related['author']
);
?>

</p>


<div class="related-book-bottom">

<strong>

Rs.

<?php

echo number_format(
    (float)$related['price']
);

?>

</strong>


<a
    href="book-details.php?id=<?php echo (int)$related['id']; ?>"
    class="related-details-btn"
>

View Book

<i class="bi bi-arrow-right"></i>

</a>

</div>

</div>

</article>


<?php

    }

} else {

?>

<p class="no-related-books">

No related books available yet.

</p>

<?php

}

?>

</div>

</section>


<!--=========================================================
                RECOMMENDED COURSE
=========================================================-->

<section class="recommended-course">

<div class="course-content">


<div class="course-text">

<span class="course-badge">

🚀 Continue Learning

</span>


<h2>

Take Your Learning Further

</h2>


<p>

Reading is only the beginning. Build
practical skills through EduVerse courses
designed to help you apply what you learn
and move toward real-world projects.

</p>


<a
    href="../courses/courses.php"
    class="course-btn"
>

Explore Courses

<i class="bi bi-arrow-right"></i>

</a>

</div>


<div class="course-icon">

<i class="bi bi-mortarboard-fill"></i>

</div>


</div>

</section>


</div>

</div>


<?php include("../../includes/footer.php"); ?>


</body>

</html>