<?php
require_once __DIR__ . "/../controller/employee-dashboard-controller.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="employee.css">
    <style>
        .profile-box {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .profile-box img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ccc;
        }
    </style>
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

            
            <div class="profile-box">
                <img src="<?= htmlspecialchars($profileImagePath) ?>" alt="Profile Picture">
                <div>
                    <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
                </div>
            </div>

            <hr>

            
            <p><strong>Total Requests:</strong> <?= $total ?></p>
            <p><strong>Pending:</strong> <?= $pending ?></p>
            <p><strong>Approved:</strong> <?= $approved ?></p>
            <p><strong>Rejected:</strong> <?= $rejected ?></p>

        </div>
    </div>
</div>

</body>
</html>
