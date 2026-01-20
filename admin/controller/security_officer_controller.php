<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../model/security_officer_model.php";

$model = new SecurityOfficerModel();
/* CREATE OFFICER */
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["createOfficer"])) {

    $email = trim($_POST["email"]);
    $pass  = trim($_POST["pass"]);

    /* BASIC VALIDATION */
    if (empty($email) || empty($pass)) {
        header("Location: ../view/security-officers.php?error=empty");
        exit;
    }

    /* CHECK EMAIL EXISTS */
    if ($model->emailExists($email)) {
        header("Location: ../view/security-officers.php?error=exists");
        exit;
    }

    /* PROFILE IMAGE HANDLING */
    $profile = "default.png";

if (isset($_FILES["profile"]) && $_FILES["profile"]["error"] === 0) {

    $uploadDir = __DIR__ . "/../picture/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $ext = pathinfo($_FILES["profile"]["name"], PATHINFO_EXTENSION);
    $profile = "officer_" . uniqid() . "." . $ext;

    if (!move_uploaded_file($_FILES["profile"]["tmp_name"], $uploadDir . $profile)) {
        die("Profile image upload failed");
    }
}


    /* CREATE OFFICER */
    $model->createOfficer($email, $pass, $profile);

    header("Location: ../view/security-officers.php?success=created");
    exit;
}

/* DELETE OFFICER */
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["deleteOfficer"])) {

    $id = intval($_POST["officer_id"]);
    $model->deleteOfficer($id);

    header("Location: ../view/security-officers.php?success=deleted");
    exit;
}
