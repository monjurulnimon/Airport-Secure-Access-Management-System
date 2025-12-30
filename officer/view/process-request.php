<?php
include "db.php";

if (
    isset($_POST['request_id']) &&
    isset($_POST['action']) &&
    isset($_POST['remarks'])
) {
    $id = $_POST['request_id'];
    $status = $_POST['action'];   // approved / rejected
    $remarks = $_POST['remarks'];

    $sql = "UPDATE zone_access_requests
            SET status='$status',
                officer_remarks='$remarks'
            WHERE request_id=$id";

    mysqli_query($conn, $sql);

    header("Location: review-requests.php");
    exit();
}
