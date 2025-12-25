<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
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
    <h1>Dashboard</h1>

    <div class="dashboard-cards">

        <div class="dash-card">
            <h4>Total Users</h4>
            <span>50</span>
        </div>

        <div class="dash-card">
            <h4>Security Officers</h4>
            <span>15</span>
        </div>

        <div class="dash-card">
            <h4>Access Zones</h4>
            <span>20</span>
        </div>

        <div class="dash-card">
            <h4>Pending Requests</h4>
            <span>12</span>
        </div>

        <div class="dash-card">
            <h4>Approved Access</h4>
            <span>70</span>
        </div>

        <div class="dash-card">
            <h4>Rejected Access</h4>
            <span>8</span>
        </div>

    </div>
</div>

</body>
</html>
