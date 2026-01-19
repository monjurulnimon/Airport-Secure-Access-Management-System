<?php
require_once __DIR__ . "/../controller/request-status-controller.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Request Status</title>
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
        <h3>Request Status</h3>

        <div class="panel-body">
            <table>
                <tr>
                    <th>Zone</th>
                    <th>Status</th>
                    <th>Officer Remarks</th>
                    <th>Action</th>
                </tr>

                <?php if (!empty($requests)): ?>
                    <?php foreach ($requests as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row["zone_name"]) ?></td>
                            <td><?= htmlspecialchars($row["status"]) ?></td>
                            <td><?= htmlspecialchars($row["remarks"] ?? "—") ?></td>
                            <td>
                                <?php if (strtolower($row["status"]) === "pending"): ?>
                                    <form method="post" style="margin:0;"
                                          onsubmit="return confirm('Cancel this request?');">
                                        <input type="hidden" name="request_id"
                                               value="<?= (int)$row["id"] ?>">
                                        <button type="submit">Cancel</button>
                                    </form>
                                <?php else: ?>
                                    —
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No access requests found.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>

</body>
</html>
