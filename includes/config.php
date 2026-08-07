
<?php

/*=========================================================
                BASE URL
=========================================================*/

if (!defined('BASE_URL')) {

    $projectRoot  = str_replace('\\', '/', dirname(__DIR__));
    $documentRoot = str_replace('\\', '/', rtrim($_SERVER['DOCUMENT_ROOT'], '/'));

    define('BASE_URL', substr($projectRoot, strlen($documentRoot)) . '/');
}


/*=========================================================
                DATABASE CONNECTION
=========================================================*/

$host     = "localhost";
$username = "root";
$password = "";
$database = "eduverse";   // Replace with your actual database name

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {

    die("Database Connection Failed: " . mysqli_connect_error());

}