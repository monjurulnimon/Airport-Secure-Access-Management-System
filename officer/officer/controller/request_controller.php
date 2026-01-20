<?php
session_start();
require_once "../model/request_model.php";

$model = new RequestModel();

/* Only POST allowed */
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../view/review-requests.php");
    exit;
}

/* Collect inputs safely */
$requestId = isset($_POST["request_id"]) ? (int)$_POST["request_id"] : 0;
$action    = $_POST["action"] ?? "";
$remarks   = trim($_POST["remarks"] ?? "");

/* PHP VALIDATION */
$error = "";

/* Validate request id */
if ($requestId <= 0) {
    $error = "Invalid request selected";
}

/* Validate action */
elseif (!in_array($action, ["approved", "rejected"])) {
    $error = "Invalid action";
}

/* Validate remarks */
elseif ($remarks === "") {
    $error = "Officer remarks cannot be empty";
}
elseif (strlen($remarks) < 5) {
    $error = "Remarks must be at least 5 characters";
}

/* If validation fails → back to view */
if ($error !== "") {
    header("Location: ../view/review-requests.php?error=" . urlencode($error));
    exit;
}

/* Update via model */
$success = $model->updateRequest($requestId, $action, $remarks);

if (!$success) {
    header("Location: ../view/review-requests.php?error=Update failed");
    exit;
}

/* Success */
header("Location: ../view/review-requests.php?success=1");
exit;
