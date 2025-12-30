<?php
require_once __DIR__ . "/../controller/request-history-controller.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Request History</title>
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
        <h3>Request History</h3>

        <div class="panel-body">
            <table>
                <tr>
                    <th>Zone</th>
                    <th>Purpose</th>
                    <th>Status</th>
                    <th>Request Date</th>
                </tr>

                <?php if (!empty($history)): ?>
                    <?php foreach ($history as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row["zone_name"]) ?></td>
                            <td><?= htmlspecialchars($row["visit_purpose"]) ?></td>
                            <td><?= htmlspecialchars(ucfirst($row["status"])) ?></td>
                            <td><?= htmlspecialchars(date("d M Y", strtotime($row["requested_at"]))) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No request history found.</td>
                    </tr>
                <?php endif; ?>

            </table>
        </div>
    </div>
</div>

</body>
</html>
