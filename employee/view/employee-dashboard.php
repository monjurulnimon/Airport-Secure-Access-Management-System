<?php
require_once __DIR__ . "/../controller/employee-dashboard-controller.php";
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
    <a href="auth/logout.php">Logout</a>
</div>

<div class="main">
    <div class="panel">
        <h3>Employee Dashboard</h3>
        <div class="panel-body">
            <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>

            <p><strong>Total Requests:</strong> <?= $total ?></p>
            <p><strong>Pending:</strong> <?= $pending ?></p>
            <p><strong>Approved:</strong> <?= $approved ?></p>
            <p><strong>Rejected:</strong> <?= $rejected ?></p>
        </div>
    </div>
</div>

</body>
</html>
