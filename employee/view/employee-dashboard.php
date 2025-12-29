<?php
session_start();

if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["role"] !== "employee") {
    header("Location: ../../auth/login.php");
    exit;
}

$id = $_SESSION["id"];
$name  = $_SESSION["name"];
$email = $_SESSION["email"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="employee.css">
</head>
<body>

<div class="top-nav">
    <a href="employee-dashboard.php">Dashboard</a>
    <a href="request-access.php">Request Access</a>
    <a href="request-status.php">Request Status</a>
    <a href="access-pass.php">Access Pass</a>
    <a href="request-history.php">Request History</a>
    <a href="logout.php">Logout</a>
</div>

<div class="main">
    <div class="panel">
        <h3>Employee Dashboard</h3>
        <div class="panel-body">
            <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>

            <p><strong>Total Requests:</strong> 6</p>
            <p><strong>Pending:</strong> 2</p>
            <p><strong>Approved:</strong> 3</p>
            <p><strong>Rejected:</strong> 1</p>
        </div>
    </div>
</div>

</body>
</html>
