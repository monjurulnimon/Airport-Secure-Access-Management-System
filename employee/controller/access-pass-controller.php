<?php
session_start();
require_once __DIR__ . "/../model/access-pass-model.php";

/* Security check */
if (
    !isset($_SESSION["isLoggedIn"]) ||
    $_SESSION["isLoggedIn"] !== true ||
    $_SESSION["role"] !== "employee"
) {
    header("Location: /Airport-Secure-Access-Management-System/employee/view/auth/login.php");
    exit;
}
//
$email = $_SESSION["email"];

$model = new AccessPassModel();
$passes = $model->getApprovedPassesByEmail($email);
