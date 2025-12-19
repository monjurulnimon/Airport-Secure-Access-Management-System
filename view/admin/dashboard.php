<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<div class="sidebar">
    <h2>Master Admin</h2>

    <a href="dashboard.php">Dashboard</a>

    <!-- User Management -->
    <input type="checkbox" id="user-mgmt-toggle">
    <label for="user-mgmt-toggle" class="menu-label">User Management</label>
    <div class="submenu">
        <a href="security-officers.php">Security Officers</a>
        <a href="all-employees.php">All Employees</a>
    </div>

    <!-- Access Zone Management -->
    <input type="checkbox" id="zone-mgmt-toggle">
    <label for="zone-mgmt-toggle" class="menu-label">Access Zone Management</label>
    <div class="submenu">
        <a href="zones.php">Zones</a>
        <a href="zone-rules.php">Zone Rules</a>
    </div>

    <a href="system-monitoring.php">System Monitoring</a>
    <!-- <a href="audit.html">Audit & Incident Review</a> -->
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
