<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once("../../includes/config.php");


/*=========================================================
                    GET BOOK ID
=========================================================*/

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {

    die("Invalid book.");

}

$bookId = (int) $_GET['id'];


/*=========================================================
                    GET BOOK
=========================================================*/

$bookStmt = mysqli_prepare(

    $conn,

    "SELECT id, title, stock
     FROM books
     WHERE id=?
     AND status='Active'
     LIMIT 1"

);


if (!$bookStmt) {

    die("Book query failed: " . mysqli_error($conn));

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
                    CHECK STOCK
=========================================================*/

if ((int)$book['stock'] <= 0) {

    die("This book is currently out of stock.");

}


/*=========================================================
                    SESSION
=========================================================*/

$sessionId = session_id();


/*
    User login is not being used yet.

    Therefore we identify the cart
    using the current PHP session.
*/

$userId = null;


/*=========================================================
                CHECK EXISTING CART ITEM
=========================================================*/

$cartStmt = mysqli_prepare(

    $conn,

    "SELECT id, quantity
     FROM cart
     WHERE session_id=?
     AND book_id=?
     LIMIT 1"

);


if (!$cartStmt) {

    die("Cart query failed: " . mysqli_error($conn));

}


mysqli_stmt_bind_param(

    $cartStmt,

    "si",

    $sessionId,
    $bookId

);


mysqli_stmt_execute($cartStmt);


$cartResult =
mysqli_stmt_get_result($cartStmt);


$cartItem =
mysqli_fetch_assoc($cartResult);


/*=========================================================
                IF BOOK ALREADY EXISTS
=========================================================*/

if ($cartItem) {


    $currentQuantity =
        (int)$cartItem['quantity'];


    $newQuantity =
        $currentQuantity + 1;


    /*
        Never allow cart quantity
        to exceed available stock.
    */

    if ($newQuantity > (int)$book['stock']) {

        $newQuantity =
            (int)$book['stock'];

    }


    $updateStmt = mysqli_prepare(

        $conn,

        "UPDATE cart
         SET quantity=?
         WHERE id=?"

    );


    if (!$updateStmt) {

        die("Cart update failed: " . mysqli_error($conn));

    }


    mysqli_stmt_bind_param(

        $updateStmt,

        "ii",

        $newQuantity,
        $cartItem['id']

    );


    if (!mysqli_stmt_execute($updateStmt)) {

        die(
            "Cart update failed: "
            . mysqli_stmt_error($updateStmt)
        );

    }


}


/*=========================================================
                IF BOOK IS NOT IN CART
=========================================================*/

else {


    $quantity = 1;


    $insertStmt = mysqli_prepare(

        $conn,

        "INSERT INTO cart
        (
            user_id,
            session_id,
            book_id,
            quantity,
            created_at
        )

        VALUES
        (
            ?,
            ?,
            ?,
            ?,
            NOW()
        )"

    );


    if (!$insertStmt) {

        die("Cart insert failed: " . mysqli_error($conn));

    }


    mysqli_stmt_bind_param(

        $insertStmt,

        "isii",

        $userId,
        $sessionId,
        $bookId,
        $quantity

    );


    if (!mysqli_stmt_execute($insertStmt)) {

        die(
            "Cart insert failed: "
            . mysqli_stmt_error($insertStmt)
        );

    }

}


/*=========================================================
                    REDIRECT TO CART
=========================================================*/

header("Location: cart.php");

exit;

?>