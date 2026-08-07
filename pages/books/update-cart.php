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
                    GET CART ID
=========================================================*/

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {

    die("Invalid cart item ID.");

}

$cartId = (int) $_GET['id'];


/*=========================================================
                    GET ACTION
=========================================================*/

if (!isset($_GET['action'])) {

    die("Invalid action.");

}

$action = $_GET['action'];


if ($action !== 'increase' && $action !== 'decrease') {

    die("Invalid quantity action.");

}


/*=========================================================
                    GET CART ITEM
=========================================================*/

$cartStmt = mysqli_prepare(

    $conn,

    "SELECT
        cart.quantity,
        cart.book_id,
        books.stock

     FROM cart

     INNER JOIN books
        ON cart.book_id = books.id

     WHERE cart.id=?
     AND cart.session_id=?

     LIMIT 1"

);


if (!$cartStmt) {

    die(
        "Cart query failed: "
        . mysqli_error($conn)
    );

}


mysqli_stmt_bind_param(

    $cartStmt,

    "is",

    $cartId,
    $sessionId

);


mysqli_stmt_execute($cartStmt);


$cartResult =
    mysqli_stmt_get_result($cartStmt);


$cartItem =
    mysqli_fetch_assoc($cartResult);


if (!$cartItem) {

    die("Cart item not found.");

}


/*=========================================================
                    CURRENT VALUES
=========================================================*/

$currentQuantity =
    (int) $cartItem['quantity'];

$stock =
    (int) $cartItem['stock'];


/*=========================================================
                    CALCULATE NEW QUANTITY
=========================================================*/

$newQuantity = $currentQuantity;


if ($action === 'increase') {

    if ($currentQuantity < $stock) {

        $newQuantity =
            $currentQuantity + 1;

    }

}


if ($action === 'decrease') {

    if ($currentQuantity > 1) {

        $newQuantity =
            $currentQuantity - 1;

    }

}


/*=========================================================
                    UPDATE CART
=========================================================*/

$updateStmt = mysqli_prepare(

    $conn,

    "UPDATE cart

     SET quantity=?

     WHERE id=?
     AND session_id=?"

);


if (!$updateStmt) {

    die(
        "Update query failed: "
        . mysqli_error($conn)
    );

}


mysqli_stmt_bind_param(

    $updateStmt,

    "iis",

    $newQuantity,
    $cartId,
    $sessionId

);


mysqli_stmt_execute($updateStmt);


/*=========================================================
                    RETURN TO CART
=========================================================*/

header("Location: cart.php");

exit;

?>
