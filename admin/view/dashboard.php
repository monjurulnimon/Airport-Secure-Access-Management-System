<?php
require_once "../model/dashboard_model.php";

$model = new DashboardModel();

/* COUNTS */
$totalEmployees = $model->countEmployees();
$totalOfficers  = $model->countSecurityOfficers();
$totalUsers     = $totalEmployees + $totalOfficers;
$totalZones     = $model->countZones();

$pending   = $model->countRequestsByStatus("pending");
$approved  = $model->countRequestsByStatus("approved");
$rejected  = $model->countRequestsByStatus("rejected");
?>

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

    <div class="dash-card">
        <h4>Total Users</h4>
        <span><?php echo $totalUsers; ?></span>
    </div>

    <div class="dash-card">
        <h4>Security Officers</h4>
        <span><?php echo $totalOfficers; ?></span>
    </div>

    <div class="dash-card">
        <h4>Access Zones</h4>
        <span><?php echo $totalZones; ?></span>
    </div>

    <div class="dash-card">
        <h4>Pending Requests</h4>
        <span><?php echo $pending; ?></span>
    </div>

    <div class="dash-card">
        <h4>Approved Access</h4>
        <span><?php echo $approved; ?></span>
    </div>

    <div class="dash-card">
        <h4>Rejected Access</h4>
        <span><?php echo $rejected; ?></span>
    </div>
</div>

</body>
</html>
