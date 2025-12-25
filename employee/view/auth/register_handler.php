<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once "../../model/db_connection.php";

/* Create DB object */
$db = new db_connection();
$conn = $db->openConnection();

/* Insert visitor */
$result = $db->registerVisitor(
    $conn,
    "employees",
    $_SESSION['name'],
    $_SESSION['email'],
    $_SESSION['password'],
    $_SESSION['contact'],
    $_SESSION['address'],
    $_SESSION['city'],
    $_SESSION['country'],
    $_POST['designation'],
    $_POST['visitor_type']
);

$db->closeConnection($conn);

/* Result handling */
if ($result) {
    session_destroy();
    header("location: login.php");
//    echo "<h2>Registration completed successfully</h2>";
} else {
    echo "<h2>Registration failed</h2>";
}
