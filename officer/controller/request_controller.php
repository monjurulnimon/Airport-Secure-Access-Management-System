<?php
session_start();
require_once "../model/request_model.php";

$model = new RequestModel();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../view/review-requests.php");
    exit;
}

$requestId = isset($_POST["request_id"]) ? (int)$_POST["request_id"] : 0;
$action    = $_POST["action"] ?? "";
$remarks   = trim($_POST["remarks"] ?? "");

$error = "";

if ($requestId <= 0) {
    $error = "Invalid request selected";
}

elseif (!in_array($action, ["approved", "rejected"])) {
    $error = "Invalid action";
}


elseif ($remarks === "") {
    $error = "Officer remarks cannot be empty";
}
elseif (strlen($remarks) < 5) {
    $error = "Remarks must be at least 5 characters";
}


if ($error !== "") {
    header("Location: ../view/review-requests.php?error=" . urlencode($error));
    exit;
}


$success = $model->updateRequest($requestId, $action, $remarks);

if (!$success) {
    header("Location: ../view/review-requests.php?error=Update failed");
    exit;
}


header("Location: ../view/review-requests.php?success=1");
exit;
