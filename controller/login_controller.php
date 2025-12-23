<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once "../model/db_connection.php";

$email    = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$errors = [];
$values = [];

/* Validation */
if (!$email) {
    $errors["email"] = "Email field is required";
}

if (!$password) {
    $errors["password"] = "Password field is required";
}

if (count($errors) > 0) {

    if (isset($errors["email"])) {
        $_SESSION["emailErr"] = $errors["email"];
    }

    if (isset($errors["password"])) {
        $_SESSION["passwordErr"] = $errors["password"];
    }

    $_SESSION["previousValues"] = ["email" => $email];

    header("Location: ../view/auth/login.php");
    exit;
}

/* Database login */
$db = new db_connection();
$conn = $db->openConnection();

$result = $db->loginVisitor($conn, "employees", $email, $password);

if ($result && $result->num_rows === 1) {

    $data = $result->fetch_assoc();   // STANDARD KEPT
    $_SESSION["email"] = $data["email"];
    $_SESSION["isLoggedIn"] = true;

    $db->closeConnection($conn);

    header("Location: ../view/admin/dashboard.php");
    exit;

} else {

    $_SESSION["loginErr"] = "Email or password is incorrect";
    $_SESSION["previousValues"] = ["email" => $email];

    $db->closeConnection($conn);

    header("Location: ../view/auth/login.php");
    exit;
}
