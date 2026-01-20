<?php
session_start();
require_once __DIR__ . "/../model/request-history-model.php";

/* Auth check */
if (
    !isset($_SESSION["isLoggedIn"]) ||
    $_SESSION["isLoggedIn"] !== true ||
    $_SESSION["role"] !== "employee"
) {
    header("Location: /Airport-Secure-Access-Management-System/employee/view/auth/login.php");
    exit;
}

$email = $_SESSION["email"];

$model = new RequestHistoryModel();
$history = $model->getHistoryByEmployeeEmail($email);
