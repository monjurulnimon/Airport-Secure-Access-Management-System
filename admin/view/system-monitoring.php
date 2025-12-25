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
        <h3>Access Decisions</h3>
        <div class="panel-body">
            <table>
                <tr>
                    <th>User</th>
                    <th>Officer</th>
                    <th>Decision</th>
                    <th>Duration</th>
                </tr>
                <tr>
                    <td>Employee A</td>
                    <td>Officer01</td>
                    <td>Approved</td>
                    <td>2 Hours</td>
                </tr>
            </table>
        </div>
    </div>
</div>

</body>
</html>
