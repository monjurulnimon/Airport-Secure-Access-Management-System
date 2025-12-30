<?php
session_start();
require_once __DIR__ . "/../model/request-status-model.php";

/* AUTH CHECK */
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

/* ACTION HANDLING */

/* 1️⃣ CANCEL REQUEST (POST) */
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["request_id"])) {

    $requestId = (int) $_POST["request_id"];
    $model->deletePendingRequest($requestId, $email);

    // Redirect to dashboard after cancel
    header("Location: /Airport-Secure-Access-Management-System/employee/view/employee-dashboard.php");
    exit;
}

/* 2️⃣ SHOW REQUEST STATUS (GET) */
$requests = $model->getByEmployeeEmail($email);
