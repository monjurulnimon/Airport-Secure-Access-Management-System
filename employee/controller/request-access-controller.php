<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once "../model/db_connection.php";
require_once "../model/zone_model.php";

$zoneModel = new ZoneModel();
$zones = $zoneModel->getActiveZones();
$rules = $zoneModel->getAllRules();



if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["role"] !== "employee") {
    header("Location: ../../../auth/login.php");
    exit;
}


$name  = $_SESSION["name"];
$email = $_SESSION["email"];


$zone      = $_POST["zone"] ?? "";
$purpose   = $_POST["purpose"] ?? "";
$visitDate = $_POST["visit_date"] ?? "";
$duration  = $_POST["duration"] ?? "";


if (!$zone || !$purpose || !$visitDate || !$duration) {
    header("Location: ../view/request-access.php");
    exit;
}


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


header("Location: ../view/request-status.php");
exit;
