<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once("../../includes/config.php");


/*=========================================================
                    SESSION
=========================================================*/

$sessionId = session_id();


/*=========================================================
                    GET CART ITEMS
=========================================================*/

$cartStmt = mysqli_prepare(

    $conn,

    "SELECT
        cart.id AS cart_id,
        cart.book_id,
        cart.quantity,
        books.title,
        books.author,
        books.price,
        books.image,
        books.image_folder,
        books.stock

     FROM cart

     INNER JOIN books
        ON cart.book_id = books.id

     WHERE cart.session_id=?

     ORDER BY cart.created_at DESC"

);


if (!$cartStmt) {

    die("Cart query failed: " . mysqli_error($conn));

}


mysqli_stmt_bind_param(

    $cartStmt,

    "s",

    $sessionId

);


mysqli_stmt_execute($cartStmt);


$cartResult =
mysqli_stmt_get_result($cartStmt);


/*=========================================================
                    TOTAL
=========================================================*/

$grandTotal = 0;

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0">

<title>

Shopping Cart | EduVerse

</title>


<!-- CORE CSS -->

<link
rel="stylesheet"
href="../../Assets/css/core/style.css">

<link
rel="stylesheet"
href="../../Assets/css/core/components.css">

<link
rel="stylesheet"
href="../../Assets/css/core/animations.css">

<link
rel="stylesheet"
href="../../Assets/css/core/utilities.css">


<!-- LAYOUT -->

<link
rel="stylesheet"
href="../../Assets/css/sidebar.css">

<link
rel="stylesheet"
href="../../Assets/css/header.css">

<link
rel="stylesheet"
href="../../Assets/css/footer.css">


<!-- CART CSS -->

<link
rel="stylesheet"
href="assets/css/cart.css">


<!-- BOOTSTRAP ICONS -->

<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>


<body>


<?php include("../../includes/sidebar.php"); ?>

<?php include("../../includes/header.php"); ?>


<div class="main-content">

<div class="page-container">


<!--=========================================================
                    CART HEADER
==========================================================-->

<section class="cart-header">

<div>

<span class="section-badge">

🛒 Shopping Cart

</span>

<h1>

Your Cart

</h1>

<p>

Review the books you want to purchase before checkout.

</p>

</div>

</section>



<!--=========================================================
                    CART CONTENT
==========================================================-->

<section class="cart-section">


<?php if(mysqli_num_rows($cartResult) > 0){ ?>


<div class="cart-layout">


<!--=====================================================
                    CART ITEMS
======================================================-->

<div class="cart-items">


<?php while($row=mysqli_fetch_assoc($cartResult)){ ?>


<?php

$itemTotal =
(float)$row['price'] *
(int)$row['quantity'];

$grandTotal += $itemTotal;

?>


<article class="cart-item">


<!-- BOOK IMAGE -->

<div class="cart-book-image">

<img

src="uploads/bookcovers/<?php
echo htmlspecialchars($row['image_folder']);
?>/<?php
echo htmlspecialchars($row['image']);
?>"

alt="<?php
echo htmlspecialchars($row['title']);
?>">

</div>



<!-- BOOK DETAILS -->

<div class="cart-book-details">


<h2>

<?php
echo htmlspecialchars($row['title']);
?>

</h2>


<p class="cart-author">

<?php
echo htmlspecialchars($row['author']);
?>

</p>


<p class="cart-price">

Rs.

<?php
echo number_format($row['price']);
?>

</p>



<!-- QUANTITY -->
<div class="cart-quantity">

<span>Quantity:</span>

<div class="quantity-controls">

<a
href="update-cart.php?action=decrease&id=<?php echo $row['cart_id']; ?>"
class="quantity-btn">

−

</a>

<strong>

<?php echo (int)$row['quantity']; ?>

</strong>

<a
href="update-cart.php?action=increase&id=<?php echo $row['cart_id']; ?>"
class="quantity-btn">

+

</a>

</div>

</div>


<!-- ITEM TOTAL -->

<div class="cart-item-total">

<span>

Item Total

</span>


<strong>

Rs.

<?php
echo number_format($itemTotal);
?>

</strong>


<a

href="remove-from-cart.php?id=<?php
echo $row['cart_id'];
?>"

class="remove-cart-item">

<i class="bi bi-trash"></i>

Remove

</a>

</div>


</article>


<?php } ?>


</div>



<!--=====================================================
                    CART SUMMARY
======================================================-->

<aside class="cart-summary">


<h2>

Order Summary

</h2>


<div class="summary-row">

<span>

Subtotal

</span>

<strong>

Rs.

<?php
echo number_format($grandTotal);
?>

</strong>

</div>


<div class="summary-divider"></div>


<div class="summary-row total-row">

<span>

Total

</span>

<strong>

Rs.

<?php
echo number_format($grandTotal);
?>

</strong>

</div>


<a

href="checkout.php"

class="checkout-btn">

<i class="bi bi-credit-card"></i>

Proceed to Checkout

</a>


<a

href="books.php"

class="continue-shopping">

<i class="bi bi-arrow-left"></i>

Continue Shopping

</a>


</aside>


</div>


<?php }else{ ?>


<!--=====================================================
                    EMPTY CART
======================================================-->

<div class="empty-cart">


<i class="bi bi-cart-x"></i>


<h2>

Your Cart Is Empty

</h2>


<p>

You haven't added any books to your cart yet.

</p>


<a

href="books.php"

class="continue-shopping">

<i class="bi bi-book"></i>

Browse Books

</a>


</div>


<?php } ?>


</section>


</div>

</div>


<?php include("../../includes/footer.php"); ?>


</body>

</html>