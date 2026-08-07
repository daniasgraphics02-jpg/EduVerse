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
                    GET CART ITEM ID
=========================================================*/

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {

    header("Location: cart.php");
    exit;

}

$cartId = (int) $_GET['id'];


/*=========================================================
                    REMOVE CART ITEM
=========================================================*/

$removeStmt = mysqli_prepare(

    $conn,

    "DELETE FROM cart
     WHERE id=?
     AND session_id=?"

);


if (!$removeStmt) {

    die("Remove query failed: " . mysqli_error($conn));

}


mysqli_stmt_bind_param(

    $removeStmt,

    "is",

    $cartId,
    $sessionId

);


mysqli_stmt_execute($removeStmt);


/*=========================================================
                    REDIRECT
=========================================================*/

header("Location: cart.php");

exit;

?>