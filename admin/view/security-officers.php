<!DOCTYPE html>
<html>
<head>
    <title>Security Officers</title>
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
        <h3>Create Security Officer</h3>
        <div class="panel-body">
            <label>Username</label>
            <input type="text">

            <label>Password</label>
            <input type="password">

            <button>Create Officer</button>
        </div>
    </div>

    <div class="panel">
        <h3>Existing Security Officers</h3>
        <div class="panel-body">
            <table>
                <tr>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>officer01</td>
                    <td><button>Delete</button></td>
                </tr>
            </table>
        </div>
    </div>
</div>

</body>
</html>
