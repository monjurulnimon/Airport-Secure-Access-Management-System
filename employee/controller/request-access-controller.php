<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once "../model/db_connection.php";


if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["role"] !== "employee") {
    header("Location: ../../../auth/login.php");
    exit;
}

/* Session data */
$name  = $_SESSION["name"];
$email = $_SESSION["email"];

/* Form data */
$zone      = $_POST["zone"] ?? "";
$purpose   = $_POST["purpose"] ?? "";
$visitDate = $_POST["visit_date"] ?? "";
$duration  = $_POST["duration"] ?? "";

/* Validation */
if (!$zone || !$purpose || !$visitDate || !$duration) {
    header("Location: ../view/request-access.php");
    exit;
}

/* DB insert */
$db = new db_connection();
$conn = $db->openConnection();

$stmt = $conn->prepare(
    "INSERT INTO zone_access_requests 
     (employee_name, employee_email, zone_name, visit_purpose, visit_date, duration_hours)
     VALUES (?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "sssssi",
    $name,
    $email,
    $zone,
    $purpose,
    $visitDate,
    $duration
);

$stmt->execute();

$stmt->close();
$db->closeConnection($conn);

/* Redirect */
header("Location: ../view/request-status.php");
exit;
