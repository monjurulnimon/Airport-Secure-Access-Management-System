<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once "../../model/db_connection.php";


$uploadDir = "/XAMPP/htdocs/Airport-Secure-Access-Management-System/employee/profile_pictures/";

$file = $_FILES['profile_image'];

if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
    die("No image uploaded.");
}

$fileName = $file['name'];
$fileTmp  = $file['tmp_name'];
$fileSize = $file['size'];

$ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
$allowedExt = ['jpg', 'jpeg', 'png'];

if (!in_array($ext, $allowedExt)) {
    die("Invalid image format.");
}

if ($fileSize > 2 * 1024 * 1024) {
    die("Image size exceeds limit.");
}

$newFileName = uniqid("profile_", true) . "." . $ext;
$targetPath = $uploadDir . $newFileName;

if (!move_uploaded_file($fileTmp, $targetPath)) {
    die("Profile image upload failed.");
}

/* ================= DATABASE ================= */

$db = new db_connection();
$conn = $db->openConnection();

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
    $_POST['visitor_type'],
    $newFileName
);

$db->closeConnection($conn);

if ($result) {
    session_destroy();
header("Location: /Airport-Secure-Access-Management-System/employee/view/auth/login.php");

    exit;
} else {
    echo "<h2>Registration failed</h2>";
}
