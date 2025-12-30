<?php
require_once "../model/security_officer_model.php";

$model = new SecurityOfficerModel();

/* CREATE OFFICER */
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["createOfficer"])) {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        header("Location: ../view/security-officers.php?error=empty");
        exit;
    }

    if ($model->usernameExists($username)) {
        header("Location: ../view/security-officers.php?error=exists");
        exit;
    }

    $model->createOfficer($username, $password);

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
