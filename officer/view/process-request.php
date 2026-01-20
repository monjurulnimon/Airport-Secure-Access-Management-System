<?php
include "db.php";

// 1️⃣ Safe POST variable handling
$id = isset($_POST['request_id']) ? (int)$_POST['request_id'] : 0;
$status = isset($_POST['action']) ? $_POST['action'] : '';
$remarks = isset($_POST['remarks']) ? $_POST['remarks'] : '';

// 2️⃣ Escape special characters for SQL
$status = mysqli_real_escape_string($conn, $status);
$remarks = mysqli_real_escape_string($conn, $remarks);

// 3️⃣ Execute update query with error check
$sql = "UPDATE zone_access_requests
        SET status='$status',
            remarks='$remarks'
        WHERE id=$id";

if (!mysqli_query($conn, $sql)) {
    die("Update failed: " . mysqli_error($conn));
}

// 4️⃣ Redirect back to review page
header("Location: review-requests.php");
exit();
?>
