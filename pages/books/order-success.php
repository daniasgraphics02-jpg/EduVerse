<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


/*=========================================================
                    SESSION
=========================================================*/

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


/*=========================================================
                    DATABASE
=========================================================*/

require_once("../../includes/config.php");


/*=========================================================
                    GET ORDER NUMBER
=========================================================*/

$orderNumber =
    trim($_GET['order'] ?? '');


if ($orderNumber === '') {

    die("Invalid order.");

}


/*=========================================================
                    GET ORDER
=========================================================*/

$orderStmt = mysqli_prepare(

    $conn,

    "SELECT
        id,
        order_number,
        total_amount,
        payment_method,
        payment_status,
        order_status,
        created_at

     FROM orders

     WHERE order_number = ?

     LIMIT 1"

);


if (!$orderStmt) {

    die(
        "Order query failed: " .
        mysqli_error($conn)
    );

}


mysqli_stmt_bind_param(

    $orderStmt,

    "s",

    $orderNumber

);


mysqli_stmt_execute($orderStmt);


$orderResult =
    mysqli_stmt_get_result($orderStmt);


$order =
    mysqli_fetch_assoc($orderResult);


if (!$order) {

    die("Order not found.");

}


/*=========================================================
                    CUSTOMER INFORMATION
=========================================================*/

$customer =
    $_SESSION['last_order_customer']
    ?? [];


/*=========================================================
                    GET ORDER ITEMS
=========================================================*/

$itemStmt = mysqli_prepare(

    $conn,

    "SELECT
        order_items.book_id,
        order_items.price,
        order_items.quantity,
        order_items.subtotal,
        books.title,
        books.image,
        books.image_folder

     FROM order_items

     INNER JOIN books
        ON order_items.book_id = books.id

     WHERE order_items.order_id = ?

     ORDER BY order_items.id ASC"

);


if (!$itemStmt) {

    die(
        "Order items query failed: " .
        mysqli_error($conn)
    );

}


$orderId =
    (int)$order['id'];


mysqli_stmt_bind_param(

    $itemStmt,

    "i",

    $orderId

);


mysqli_stmt_execute($itemStmt);


$itemResult =
    mysqli_stmt_get_result($itemStmt);


$orderItems = [];


while ($row = mysqli_fetch_assoc($itemResult)) {

    $orderItems[] = $row;

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
Order Successful | EduVerse
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


<!-- LAYOUT CSS -->

<link
rel="stylesheet"
href="../../Assets/css/sidebar.css">

<link
rel="stylesheet"
href="../../Assets/css/header.css">

<link
rel="stylesheet"
href="../../Assets/css/footer.css">


<!-- BOOTSTRAP ICONS -->

<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<style>

.order-success-page {

    max-width:1000px;

    margin:60px auto;

    padding:0 25px;

}


.success-card {

    background:#111827;

    border:1px solid rgba(255,255,255,.08);

    border-top:3px solid #22c55e;

    border-radius:16px;

    padding:45px;

}


.success-icon {

    width:75px;

    height:75px;

    margin:0 auto 25px;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:50%;

    background:rgba(34,197,94,.15);

    color:#22c55e;

    font-size:2.5rem;

}


.success-heading {

    text-align:center;

}


.success-heading h1 {

    margin:0 0 12px;

    color:#fff;

    font-size:2.3rem;

}


.success-heading p {

    margin:0 auto;

    max-width:600px;

    color:#9ca3af;

    line-height:1.7;

}


.order-number {

    margin:30px 0;

    padding:18px;

    text-align:center;

    background:#0f172a;

    border-radius:10px;

}


.order-number span {

    display:block;

    margin-bottom:6px;

    color:#9ca3af;

    font-size:.85rem;

}


.order-number strong {

    color:#60a5fa;

    font-size:1.2rem;

}


.success-grid {

    display:grid;

    grid-template-columns:1fr 1fr;

    gap:25px;

    margin-top:30px;

}


.success-box {

    padding:25px;

    background:#0f172a;

    border-radius:12px;

}


.success-box h2 {

    margin:0 0 18px;

    color:#fff;

    font-size:1.15rem;

}


.success-box p {

    margin:8px 0;

    color:#9ca3af;

    line-height:1.6;

}


.success-box strong {

    color:#fff;

}


.order-items {

    margin-top:25px;

}


.order-item {

    display:flex;

    align-items:center;

    gap:15px;

    padding:15px 0;

    border-bottom:1px solid rgba(255,255,255,.08);

}


.order-item:last-child {

    border-bottom:0;

}


.order-item-image {

    width:55px;

    height:75px;

    overflow:hidden;

    border-radius:7px;

    background:#1e293b;

    flex-shrink:0;

}


.order-item-image img {

    width:100%;

    height:100%;

    object-fit:cover;

}


.order-item-info {

    flex:1;

}


.order-item-info h3 {

    margin:0 0 5px;

    color:#fff;

    font-size:1rem;

}


.order-item-info p {

    margin:0;

    color:#9ca3af;

    font-size:.85rem;

}


.order-item-total {

    color:#38bdf8;

    font-weight:700;

}


.final-total {

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-top:25px;

    padding-top:20px;

    border-top:1px solid rgba(255,255,255,.1);

}


.final-total span {

    color:#9ca3af;

}


.final-total strong {

    color:#38bdf8;

    font-size:1.5rem;

}


.success-actions {

    display:flex;

    justify-content:center;

    gap:15px;

    margin-top:35px;

}


.success-btn {

    display:inline-flex;

    align-items:center;

    justify-content:center;

    gap:8px;

    padding:13px 22px;

    border-radius:10px;

    text-decoration:none;

    font-weight:600;

}


.success-btn.primary {

    background:#2563eb;

    color:#fff;

}


.success-btn.secondary {

    background:#1e293b;

    color:#fff;

}


@media(max-width:700px) {

    .success-card {

        padding:25px;

    }

    .success-grid {

        grid-template-columns:1fr;

    }

    .success-actions {

        flex-direction:column;

    }

    .success-btn {

        width:100%;

    }

}

</style>

</head>


<body>


<?php include("../../includes/sidebar.php"); ?>

<?php include("../../includes/header.php"); ?>


<div class="main-content">

<div class="page-container">


<div class="order-success-page">

<div class="success-card">


<!-- SUCCESS ICON -->

<div class="success-icon">

<i class="bi bi-check-lg"></i>

</div>


<!-- HEADING -->

<div class="success-heading">

<h1>

Order Placed Successfully!

</h1>

<p>

Thank you for your order. Your order has been received and is currently being processed.

</p>

</div>


<!-- ORDER NUMBER -->

<div class="order-number">

<span>

Order Number

</span>

<strong>

<?php
echo htmlspecialchars($order['order_number']);
?>

</strong>

</div>


<!-- CUSTOMER + ORDER INFO -->

<div class="success-grid">


<div class="success-box">

<h2>

<i class="bi bi-person"></i>

Customer Information

</h2>


<p>

<strong>Name:</strong>

<?php
echo htmlspecialchars(
    $customer['name'] ?? 'Customer'
);
?>

</p>


<p>

<strong>Email:</strong>

<?php
echo htmlspecialchars(
    $customer['email'] ?? '-'
);
?>

</p>


<p>

<strong>Phone:</strong>

<?php
echo htmlspecialchars(
    $customer['phone'] ?? '-'
);
?>

</p>


<p>

<strong>Address:</strong>

<?php
echo htmlspecialchars(
    $customer['address'] ?? '-'
);
?>

</p>


<p>

<strong>City:</strong>

<?php
echo htmlspecialchars(
    $customer['city'] ?? '-'
);
?>

</p>

</div>



<div class="success-box">

<h2>

<i class="bi bi-receipt"></i>

Order Information

</h2>


<p>

<strong>Payment:</strong>

<?php
echo htmlspecialchars(
    $order['payment_method']
);
?>

</p>


<p>

<strong>Payment Status:</strong>

<?php
echo htmlspecialchars(
    $order['payment_status']
);
?>

</p>


<p>

<strong>Order Status:</strong>

<?php
echo htmlspecialchars(
    $order['order_status']
);
?>

</p>


<p>

<strong>Date:</strong>

<?php
echo date(
    'd M Y, h:i A',
    strtotime($order['created_at'])
);
?>

</p>

</div>

</div>



<!-- ORDER ITEMS -->

<div class="success-box order-items">

<h2>

<i class="bi bi-book"></i>

Ordered Books

</h2>


<?php foreach ($orderItems as $item) { ?>


<div class="order-item">


<div class="order-item-image">

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


<div class="order-item-info">

<h3>

<?php
echo htmlspecialchars($item['title']);
?>

</h3>


<p>

Quantity:

<?php
echo (int)$item['quantity'];
?>

×

Rs.

<?php
echo number_format($item['price']);
?>

</p>

</div>


<div class="order-item-total">

Rs.

<?php
echo number_format($item['subtotal']);
?>

</div>


</div>


<?php } ?>


<div class="final-total">

<span>

Total Amount

</span>

<strong>

Rs.

<?php
echo number_format($order['total_amount']);
?>

</strong>

</div>

</div>



<!-- ACTIONS -->

<div class="success-actions">

<a
href="books.php"
class="success-btn primary">

<i class="bi bi-book"></i>

Continue Shopping

</a>


<a
href="cart.php"
class="success-btn secondary">

<i class="bi bi-cart"></i>

View Cart

</a>

</div>


</div>

</div>


</div>

</div>


<?php include("../../includes/footer.php"); ?>


</body>

</html>