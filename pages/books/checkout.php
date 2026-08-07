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

    die(
        "Cart query failed: "
        . mysqli_error($conn)
    );

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
                    CHECK EMPTY CART
=========================================================*/

if (mysqli_num_rows($cartResult) === 0) {

    header("Location: cart.php");

    exit;

}


/*=========================================================
                    CALCULATE TOTAL
=========================================================*/

$grandTotal = 0;

$cartItems = [];


while ($row = mysqli_fetch_assoc($cartResult)) {

    $itemTotal =
        (float)$row['price'] *
        (int)$row['quantity'];

    $row['item_total'] = $itemTotal;

    $grandTotal += $itemTotal;

    $cartItems[] = $row;

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0">

<title>

Checkout | EduVerse

</title>


<!--=====================================================
                    CORE CSS
======================================================-->

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


<!--=====================================================
                    LAYOUT CSS
======================================================-->

<link
rel="stylesheet"
href="../../Assets/css/sidebar.css">

<link
rel="stylesheet"
href="../../Assets/css/header.css">

<link
rel="stylesheet"
href="../../Assets/css/footer.css">


<!--=====================================================
                    CHECKOUT CSS
======================================================-->

<link
rel="stylesheet"
href="assets/css/checkout.css">


<!--=====================================================
                    BOOTSTRAP ICONS
======================================================-->

<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>


<body>


<?php include("../../includes/sidebar.php"); ?>

<?php include("../../includes/header.php"); ?>


<div class="main-content">

<div class="page-container">


<!--=====================================================
                    CHECKOUT HEADER
======================================================-->

<section class="checkout-header">

<span class="section-badge">

💳 Secure Checkout

</span>


<h1>

Complete Your Order

</h1>


<p>

Enter your details and review your order before placing it.

</p>

</section>



<!--=====================================================
                    CHECKOUT LAYOUT
======================================================-->

<section class="checkout-section">


<div class="checkout-layout">


<!--=====================================================
                    CUSTOMER INFORMATION
======================================================-->

<div class="checkout-form">


<div class="checkout-section-title">

<i class="bi bi-person"></i>

<div>

<h2>

Customer Information

</h2>

<p>

Where should we send your order?

</p>

</div>

</div>


<form
action="place-order.php"
method="POST">


<!-- NAME -->

<div class="form-group">

<label for="customer_name">

Full Name

</label>

<input
type="text"
id="customer_name"
name="customer_name"
placeholder="Enter your full name"
required>

</div>


<!-- EMAIL -->

<div class="form-group">

<label for="email">

Email Address

</label>

<input
type="email"
id="email"
name="email"
placeholder="Enter your email address"
required>

</div>


<!-- PHONE -->

<div class="form-group">

<label for="phone">

Phone Number

</label>

<input
type="tel"
id="phone"
name="phone"
placeholder="03XX-XXXXXXX"
required>

</div>


<!-- ADDRESS -->

<div class="form-group">

<label for="address">

Delivery Address

</label>

<textarea
id="address"
name="address"
rows="4"
placeholder="Enter your complete delivery address"
required></textarea>

</div>


<!-- CITY -->

<div class="form-group">

<label for="city">

City

</label>

<input
type="text"
id="city"
name="city"
placeholder="Enter your city"
required>

</div>


<!-- PAYMENT -->

<div class="checkout-payment">

<h3>

Payment Method

</h3>


<label class="payment-option">

<input
type="radio"
name="payment_method"
value="Cash on Delivery"
checked>

<span>

<i class="bi bi-cash-stack"></i>

Cash on Delivery

</span>

</label>


<label class="payment-option">

<input
type="radio"
name="payment_method"
value="Bank Transfer">

<span>

<i class="bi bi-bank"></i>

Bank Transfer

</span>

</label>

</div>


<button type="submit" class="place-order-btn">
    <i class="bi bi-check-circle"></i>
    Place Order
</button>

</form>

</div>



<!--=====================================================
                    ORDER SUMMARY
======================================================-->

<aside class="checkout-summary">


<h2>

Order Summary

</h2>


<div class="checkout-items">


<?php foreach ($cartItems as $item) { ?>


<div class="checkout-item">


<div class="checkout-item-image">

<img

src="uploads/bookcovers/<?php
echo htmlspecialchars($item['image_folder']);
?>/<?php
echo htmlspecialchars($item['image']);
?>"

alt="<?php
echo htmlspecialchars($item['title']);
?>">

</div>


<div class="checkout-item-info">

<h3>

<?php
echo htmlspecialchars($item['title']);
?>

</h3>


<p>

<?php
echo (int)$item['quantity'];
?>

× Rs.

<?php
echo number_format($item['price']);
?>

</p>

</div>


<strong>

Rs.

<?php
echo number_format($item['item_total']);
?>

</strong>


</div>


<?php } ?>

</div>


<div class="checkout-divider"></div>


<div class="checkout-total">

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
href="cart.php"
class="back-to-cart">

<i class="bi bi-arrow-left"></i>

Back to Cart

</a>


</aside>


</div>


</section>


</div>

</div>


<?php include("../../includes/footer.php"); ?>


</body>

</html>