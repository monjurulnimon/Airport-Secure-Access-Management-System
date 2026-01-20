<?php
require_once "../model/system_monitoring_model.php";

$model = new SystemMonitoringModel();
$logs = $model->getAllAccessLogs();
?>

<!DOCTYPE html>
<html>
<head>
    <title>System Monitoring</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<div class="sidebar">
    <h2>Admin</h2>

    <a href="dashboard.php" class="menu">Dashboard</a>

    <div class="menu">User Management</div>
    <a href="security-officers.php" class="submenu">Security Officers</a>
    <a href="all-employees.php" class="submenu">All Employees</a>

    <div class="menu">Access Zone Management</div>
    <a href="zones.php" class="submenu">Zones</a>
    <a href="zone-rules.php" class="submenu">Zone Rules</a>

    <a href="system-monitoring.php" class="menu">System Monitoring</a>
</div>

<div class="main">
    <div class="panel">
        <h3>Access Request Logs</h3>

        <div class="panel-body">
            <table>
                <tr>
                    <th>Employee</th>
                    <th>Email</th>
                    <th>Zone</th>
                    <th>Purpose</th>
                    <th>Visit Date</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Requested At</th>
                </tr>

                <?php if ($logs && $logs->num_rows > 0) { ?>
                    <?php while ($row = $logs->fetch_assoc()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row["employee_name"]) ?></td>
                            <td><?= htmlspecialchars($row["employee_email"]) ?></td>
                            <td><?= htmlspecialchars($row["zone_name"]) ?></td>
                            <td><?= htmlspecialchars($row["visit_purpose"]) ?></td>
                            <td><?= $row["visit_date"] ?></td>
                            <td><?= $row["duration_hours"] ?> hrs</td>
                            <td><?= htmlspecialchars(ucfirst($row["status"])) ?></td>
                            <td><?= $row["remarks"] ?? "-" ?></td>
                            <td><?= $row["created_at"] ?></td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="9">No access requests found</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

</body>
</html>
