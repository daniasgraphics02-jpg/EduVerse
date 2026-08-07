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
                    SESSION ID
=========================================================*/

$sessionId = session_id();


/*=========================================================
                    ONLY POST REQUEST
=========================================================*/

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    header("Location: checkout.php");
    exit;

}


/*=========================================================
                    CUSTOMER INFORMATION
=========================================================*/

$fullName = trim($_POST['customer_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$address = trim($_POST['address'] ?? '');
$city = trim($_POST['city'] ?? '');
$paymentMethod = trim($_POST['payment_method'] ?? '');


/*=========================================================
                    VALIDATION
=========================================================*/

if (
    $fullName === '' ||
    $email === '' ||
    $phone === '' ||
    $address === '' ||
    $city === '' ||
    $paymentMethod === ''
) {

    die("Please complete all required fields.");

}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    die("Invalid email address.");

}


/*=========================================================
                    GET CART
=========================================================*/

$cartStmt = mysqli_prepare(

    $conn,

    "SELECT
        cart.id AS cart_id,
        cart.book_id,
        cart.quantity,
        books.title,
        books.price,
        books.stock

     FROM cart

     INNER JOIN books
        ON cart.book_id = books.id

     WHERE cart.session_id = ?
     AND books.status = 'Active'"

);


if (!$cartStmt) {

    die(
        "Cart query failed: " .
        mysqli_error($conn)
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

    die("Your cart is empty.");

}


/*=========================================================
                    PREPARE CART ITEMS
=========================================================*/

$cartItems = [];

$grandTotal = 0;


while ($row = mysqli_fetch_assoc($cartResult)) {

    $quantity = (int)$row['quantity'];

    $price = (float)$row['price'];

    $stock = (int)$row['stock'];


    /*-----------------------------------------------
                    QUANTITY CHECK
    -----------------------------------------------*/

    if ($quantity <= 0) {

        die(
            "Invalid quantity for " .
            htmlspecialchars($row['title'])
        );

    }


    /*-----------------------------------------------
                    STOCK CHECK
    -----------------------------------------------*/

    if ($quantity > $stock) {

        die(
            "Not enough stock available for " .
            htmlspecialchars($row['title'])
        );

    }


    /*-----------------------------------------------
                    SUBTOTAL
    -----------------------------------------------*/

    $subtotal =
        $price * $quantity;


    $grandTotal += $subtotal;


    $cartItems[] = [

        'book_id' =>
            (int)$row['book_id'],

        'price' =>
            $price,

        'quantity' =>
            $quantity,

        'subtotal' =>
            $subtotal

    ];

}


/*=========================================================
                    GENERATE ORDER NUMBER
=========================================================*/

$orderNumber =
    'EV-' .
    date('Ymd') .
    '-' .
    strtoupper(substr(uniqid(), -6));


/*=========================================================
                    TRANSACTION
=========================================================*/

mysqli_begin_transaction($conn);


try {


    /*=====================================================
                    ORDER VARIABLES
    =====================================================*/

    /*
        Login system is not connected yet.
        Therefore user_id remains NULL.
    */

    $userId = null;

    $paymentStatus = 'Pending';

    $orderStatus = 'Pending';


    /*=====================================================
                    INSERT ORDER
    =====================================================*/

    $orderStmt = mysqli_prepare(

        $conn,

        "INSERT INTO orders
        (
            user_id,
            order_number,
            total_amount,
            payment_method,
            payment_status,
            order_status,
            created_at
        )

        VALUES
        (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            NOW()
        )"

    );


    if (!$orderStmt) {

        throw new Exception(

            "Order statement failed: " .
            mysqli_error($conn)

        );

    }


    mysqli_stmt_bind_param(

        $orderStmt,

        "isdsss",

        $userId,
        $orderNumber,
        $grandTotal,
        $paymentMethod,
        $paymentStatus,
        $orderStatus

    );


    if (!mysqli_stmt_execute($orderStmt)) {

        throw new Exception(

            "Order creation failed: " .
            mysqli_stmt_error($orderStmt)

        );

    }


    /*=====================================================
                    GET ORDER ID
    =====================================================*/

    $orderId =
        mysqli_insert_id($conn);


    if (!$orderId) {

        throw new Exception(
            "Unable to get the new order ID."
        );

    }


    /*=====================================================
                    INSERT ORDER ITEMS
    =====================================================*/

    $itemStmt = mysqli_prepare(

        $conn,

        "INSERT INTO order_items
        (
            order_id,
            book_id,
            price,
            quantity,
            subtotal
        )

        VALUES
        (
            ?,
            ?,
            ?,
            ?,
            ?
        )"

    );


    if (!$itemStmt) {

        throw new Exception(

            "Order item statement failed: " .
            mysqli_error($conn)

        );

    }


    /*=====================================================
                    PROCESS EACH ITEM
    =====================================================*/

    foreach ($cartItems as $item) {


        /*-----------------------------------------------
                    INSERT ORDER ITEM
        -----------------------------------------------*/

        mysqli_stmt_bind_param(

            $itemStmt,

            "iidid",

            $orderId,
            $item['book_id'],
            $item['price'],
            $item['quantity'],
            $item['subtotal']

        );


        if (!mysqli_stmt_execute($itemStmt)) {

            throw new Exception(

                "Order item creation failed: " .
                mysqli_stmt_error($itemStmt)

            );

        }


        /*-----------------------------------------------
                    REDUCE STOCK
        -----------------------------------------------*/

        $stockStmt = mysqli_prepare(

            $conn,

            "UPDATE books

             SET stock = stock - ?

             WHERE id = ?

             AND stock >= ?"

        );


        if (!$stockStmt) {

            throw new Exception(

                "Stock statement failed: " .
                mysqli_error($conn)

            );

        }


        mysqli_stmt_bind_param(

            $stockStmt,

            "iii",

            $item['quantity'],
            $item['book_id'],
            $item['quantity']

        );


        if (!mysqli_stmt_execute($stockStmt)) {

            throw new Exception(

                "Stock update failed: " .
                mysqli_stmt_error($stockStmt)

            );

        }


        if (
            mysqli_stmt_affected_rows($stockStmt) === 0
        ) {

            throw new Exception(

                "Stock changed while processing the order."

            );

        }


        mysqli_stmt_close($stockStmt);

    }


    /*=====================================================
                    CLEAR CART
    =====================================================*/

    $clearCartStmt = mysqli_prepare(

        $conn,

        "DELETE FROM cart
         WHERE session_id = ?"

    );


    if (!$clearCartStmt) {

        throw new Exception(

            "Cart clearing failed: " .
            mysqli_error($conn)

        );

    }


    mysqli_stmt_bind_param(

        $clearCartStmt,

        "s",

        $sessionId

    );


    if (!mysqli_stmt_execute($clearCartStmt)) {

        throw new Exception(

            "Unable to clear cart."

        );

    }


    /*=====================================================
                    COMMIT
    =====================================================*/

    mysqli_commit($conn);


    /*=====================================================
                    SAVE ORDER IN SESSION
    =====================================================*/

    $_SESSION['last_order_id'] =
        $orderId;

    $_SESSION['last_order_number'] =
        $orderNumber;

    /*
        Save customer information temporarily
        so the success page can display it.

        We are NOT putting these values
        into the orders table because those
        columns don't exist there yet.
    */

    $_SESSION['last_order_customer'] = [

        'name' =>
            $fullName,

        'email' =>
            $email,

        'phone' =>
            $phone,

        'address' =>
            $address,

        'city' =>
            $city,

        'payment_method' =>
            $paymentMethod

    ];


    /*=====================================================
                    REDIRECT
    =====================================================*/

    header(

        "Location: order-success.php?order=" .
        urlencode($orderNumber)

    );

    exit;

}


/*=========================================================
                    ERROR / ROLLBACK
=========================================================*/

catch (Exception $e) {

    mysqli_rollback($conn);

    die(

        "Order could not be placed.<br><br>" .
        htmlspecialchars($e->getMessage())

    );

}

?>