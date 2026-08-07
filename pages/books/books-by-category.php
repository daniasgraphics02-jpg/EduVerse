<!-- books-by-category.php -->

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../../includes/config.php");


/*=========================================================
                    GET CATEGORY ID
=========================================================*/

$categoryId = isset($_GET['category'])
    ? (int) $_GET['category']
    : 1;


if ($categoryId <= 0) {
    die("Invalid category ID.");
}


/*=========================================================
                BOOK IMAGE FUNCTION
=========================================================*/
/*
    IMPORTANT:

    Physical folder:

    pages/
        books/
            uploads/
                bookcovers/
                    technology/
                        html-css.jpg

    This file is located at:

    pages/books/books-by-category.php

    Therefore __DIR__ points to:

    pages/books/

    We use __DIR__ for the physical file check
    and a URL path separately for the browser.
*/

function getBookImage($book)
{
    $folder = trim($book['image_folder'] ?? '');
    $image  = trim($book['image'] ?? '');

    /*
        If database values are empty,
        return placeholder.
    */

    if ($folder === '' || $image === '') {

        return "uploads/bookcovers/placeholders/no-book.png";
    }


    /*
        Remove accidental slashes from database values.
        This prevents paths such as:

        technology/
        /html-css.jpg
    */

    $folder = trim($folder, "/\\");
    $image  = trim($image, "/\\");


    /*
        PHYSICAL FILE PATH

        Example:

        C:/xampp/htdocs/
        Aptech-Vision-EduFind-Project/
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
        Check whether the actual file exists.
    */

    if (file_exists($physicalPath)) {

        /*
            Browser URL.

            rawurlencode() safely handles:
            spaces
            special characters
            etc.
        */

        return "uploads/bookcovers/"
            . rawurlencode($folder)
            . "/"
            . rawurlencode($image);
    }

    return "uploads/bookcovers/placeholders/no-book.png";
}


/*=========================================================
                GET CATEGORY DETAILS
=========================================================*/

$categoryStmt = mysqli_prepare(
    $conn,
    "SELECT *
     FROM book_categories
     WHERE id = ?"
);


if (!$categoryStmt) {
    die(
        "Category query preparation failed: "
        . mysqli_error($conn)
    );
}


mysqli_stmt_bind_param(
    $categoryStmt,
    "i",
    $categoryId
);


mysqli_stmt_execute($categoryStmt);


$categoryResult =
    mysqli_stmt_get_result($categoryStmt);


$category =
    mysqli_fetch_assoc($categoryResult);


if (!$category) {
    die("Category not found.");
}


$categoryName =
    $category['category_name'];


/*=========================================================
                    COUNT BOOKS
=========================================================*/

$countStmt = mysqli_prepare(
    $conn,
    "SELECT COUNT(*) AS total
     FROM books
     WHERE category_id = ?
     AND status = 'Active'"
);


if (!$countStmt) {
    die(
        "Count query preparation failed: "
        . mysqli_error($conn)
    );
}


mysqli_stmt_bind_param(
    $countStmt,
    "i",
    $categoryId
);


mysqli_stmt_execute($countStmt);


$countResult =
    mysqli_stmt_get_result($countStmt);


$count =
    mysqli_fetch_assoc($countResult);


/*=========================================================
                    FEATURED BOOK
=========================================================*/

$featuredStmt = mysqli_prepare(
    $conn,
    "SELECT *
     FROM books
     WHERE category_id = ?
     AND featured = 'Yes'
     AND status = 'Active'
     LIMIT 1"
);


if (!$featuredStmt) {
    die(
        "Featured book query failed: "
        . mysqli_error($conn)
    );
}


mysqli_stmt_bind_param(
    $featuredStmt,
    "i",
    $categoryId
);


mysqli_stmt_execute($featuredStmt);


$featuredResult =
    mysqli_stmt_get_result($featuredStmt);


$featuredBook =
    mysqli_fetch_assoc($featuredResult);


/*=========================================================
                    ALL BOOKS
=========================================================*/

$booksStmt = mysqli_prepare(
       $conn,
       "SELECT *
        FROM books
        WHERE category_id = ?
        AND status = 'Active'
        ORDER BY (featured = 'Yes') DESC,
                 rating DESC,
                 title ASC"
   );

if (!$booksStmt) {
    die(
        "Books query preparation failed: "
        . mysqli_error($conn)
    );
}


mysqli_stmt_bind_param(
    $booksStmt,
    "i",
    $categoryId
);


mysqli_stmt_execute($booksStmt);


$booksQuery =
    mysqli_stmt_get_result($booksStmt);

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

<?php echo htmlspecialchars($categoryName); ?>

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


<!-- PAGE CSS -->

<link
    rel="stylesheet"
    href="assets/css/books-by-category.css"
>


<!-- BOOTSTRAP ICONS -->

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>

</head>


<body>


<?php include("../../includes/sidebar.php"); ?>


<?php include("../../includes/header.php"); ?>


<div class="main-content">

<div class="page-container">


<!--=========================================================
                    CATEGORY HERO
=========================================================-->

<section class="category-banner">

<div class="banner-overlay"></div>


<div class="banner-left">

<span class="section-badge">

📚 Book Library

</span>


<h1>

<?php echo htmlspecialchars($categoryName); ?>

Books

</h1>


<div class="book-count">

<?php echo (int)$count['total']; ?>

Books Available

</div>


<p>

Master

<strong>

<?php echo htmlspecialchars($categoryName); ?>

</strong>

through carefully selected books,
industry experts and premium resources.

</p>

</div>


<?php if ($featuredBook) { ?>

<div class="featured-book">

<div class="featured-image">

<?php

$featuredImage =
    getBookImage($featuredBook);

?>

<img
    src="<?php echo htmlspecialchars($featuredImage); ?>"
    alt="<?php echo htmlspecialchars($featuredBook['title']); ?>"
>

</div>


<div class="featured-content">

<span class="featured-label">

⭐ Featured Book

</span>


<h2>

<?php
echo htmlspecialchars(
    $featuredBook['title']
);
?>

</h2>


<p class="author">

<?php
echo htmlspecialchars(
    $featuredBook['author']
);
?>

</p>


<div class="rating">

★★★★★

<span>

<?php
echo number_format(
    (float)$featuredBook['rating'],
    1
);
?>

</span>

</div>


<p class="description">

<?php
echo htmlspecialchars(
    $featuredBook['description']
);
?>

</p>


<div class="price">

Rs.

<?php
echo number_format(
    (float)$featuredBook['price']
);
?>

</div>


<div class="stock">

<?php

if ((int)$featuredBook['stock'] > 0) {

    echo "✔ In Stock";

} else {

    echo "Out of Stock";

}

?>

</div>


<div class="featured-buttons">

<a
    href="book-details.php?id=<?php echo (int)$featuredBook['id']; ?>"
    class="details-btn"
>

View Details

</a>


<a
    href="add-to-cart.php?id=<?php echo (int)$featuredBook['id']; ?>"
    class="buy-btn"
>

Buy Now

</a>

</div>

</div>

</div>

<?php } ?>


</section>

<!--=========================================================
                    BOOKS GRID
=========================================================-->

<section class="books-grid">

<?php

if (mysqli_num_rows($booksQuery) > 0) {

    while ($row = mysqli_fetch_assoc($booksQuery)) {

        $bookImage =
            getBookImage($row);

?>

<div class="book-card">


<?php if ($row['featured'] === "Yes") { ?>

<div class="book-badge">

⭐ Featured

</div>

<?php } ?>


<!-- BOOK IMAGE -->

<div class="book-image">

<img
    src="<?php echo htmlspecialchars(getBookImage($row)); ?>"
    alt="<?php echo htmlspecialchars($row['title']); ?>"
    onerror="this.onerror=null; this.src='uploads/bookcovers/placeholders/no-book.png';">

</div>


<!-- BOOK CONTENT -->

<div class="book-content">


<span class="book-category">

<?php
echo htmlspecialchars($categoryName);
?>

</span>


<h3>

<?php
echo htmlspecialchars($row['title']);
?>

</h3>


<p class="book-author">

<?php
echo htmlspecialchars($row['author']);
?>

</p>


<div class="book-rating">

★★★★★

<span>

<?php
echo number_format(
    (float)$row['rating'],
    1
);
?>

</span>

</div>


<div class="book-price">

Rs.

<?php
echo number_format(
    (float)$row['price']
);
?>

</div>


<div class="book-stock">

<?php

if ((int)$row['stock'] > 0) {

?>

<span class="in-stock">

✔ In Stock

</span>

<?php

} else {

?>

<span class="out-stock">

Out of Stock

</span>

<?php

}

?>

</div>


<!-- BUTTONS -->

<div class="book-buttons">

<a
    href="book-details.php?id=<?php echo (int)$row['id']; ?>"
    class="details-btn"
>

View Details

</a>


<a
    href="add-to-cart.php?id=<?php echo (int)$row['id']; ?>"
    class="buy-btn"
>

Buy Now

</a>

</div>


</div>

</div>


<?php

    }

} else {

?>

<div class="no-books">

<i class="bi bi-journal-x"></i>

<h2>

No Books Found

</h2>

<p>

There are currently no books available
in this category.

</p>

</div>

<?php

}

?>

</section>


<!--=========================================================
                RELATED CATEGORIES
=========================================================-->

<section class="related-categories">

<h2>

Explore More Categories

</h2>


<div class="related-grid">

<?php

$relatedStmt = mysqli_prepare(
    $conn,
    "SELECT id, category_name
     FROM book_categories
     WHERE id != ?
     ORDER BY RAND()
     LIMIT 6"
);


if ($relatedStmt) {

    mysqli_stmt_bind_param(
        $relatedStmt,
        "i",
        $categoryId
    );


    mysqli_stmt_execute(
        $relatedStmt
    );


    $relatedResult =
        mysqli_stmt_get_result(
            $relatedStmt
        );


    while (
        $cat =
        mysqli_fetch_assoc($relatedResult)
    ) {

?>

<a
    href="books-by-category.php?category=<?php echo (int)$cat['id']; ?>"
    class="related-card"
>

<i class="bi bi-book-half"></i>

<span>

<?php
echo htmlspecialchars(
    $cat['category_name']
);
?>

</span>

</a>

<?php

    }

}

?>

</div>

</section>


</div>

</div>


<?php include("../../includes/footer.php"); ?>


</body>

</html>