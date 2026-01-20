<?php
session_start();

if (
    !isset($_SESSION["isLoggedIn"]) ||
    $_SESSION["role"] !== "employee" ||
    !isset($_SESSION["employee_id"])
) {
    header("Location: /Airport-Secure-Access-Management-System/employee/view/auth/login.php");
    exit;
}


if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["role"] !== "employee") {
    header("Location: /Airport-Secure-Access-Management-System/employee/view/auth/login.php");
    exit;
}

require_once __DIR__ . "/../model/employee-dashboard-model.php";

/* Use PRIMARY KEY from session */
$userId = $_SESSION["employee_id"];

/* Model */
$model = new EmployeeDashboardModel();

/* Fetch profile using ID (CORRECT) */
$profile = $model->getEmployeeProfileById($userId);

$name = $profile['name'] ?? '';
$email = $profile['email'] ?? '';
$profileImage = $profile['profile_image'] ?? 'default.png';

/* Image URL */
$profileImagePath =
    "/Airport-Secure-Access-Management-System/employee/profile_pictures/" . $profileImage;

/* Fetch request counts */
$counts = $model->getRequestCountsByEmail($email);

/* Assign counts */
$total    = (int)($counts['total'] ?? 0);
$pending  = (int)($counts['pending'] ?? 0);
$approved = (int)($counts['approved'] ?? 0);
$rejected = (int)($counts['rejected'] ?? 0);
