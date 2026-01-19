<?php
session_start();

if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["role"] !== "employee") {
    header("Location: ../../auth/login.php");
    exit;
}

require_once __DIR__ . "/../model/employee-dashboard-model.php";

/* Session data */
$name  = $_SESSION["name"];
$email = $_SESSION["email"];

/* Model call */
$model = new EmployeeDashboardModel();
$counts = $model->getRequestCountsByEmail($email);

/* Assign values */
$total    = (int)($counts['total'] ?? 0);
$pending  = (int)($counts['pending'] ?? 0);
$approved = (int)($counts['approved'] ?? 0);
$rejected = (int)($counts['rejected'] ?? 0);
