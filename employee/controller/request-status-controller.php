<?php
session_start();
require_once __DIR__ . "/../model/request-status-model.php";

if (
    !isset($_SESSION["isLoggedIn"]) ||
    $_SESSION["isLoggedIn"] !== true ||
    $_SESSION["role"] !== "employee"
) {
    header("Location: /Airport-Secure-Access-Management-System/employee/auth/login.php");
    exit;
}

$model = new RequestStatusModel();
$email = $_SESSION["email"];



if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["request_id"])) {

    $requestId = (int) $_POST["request_id"];
    $model->deletePendingRequest($requestId, $email);

    
    header("Location: /Airport-Secure-Access-Management-System/employee/view/employee-dashboard.php");
    exit;
}


$requests = $model->getByEmployeeEmail($email);
