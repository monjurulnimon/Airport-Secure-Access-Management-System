<!DOCTYPE html>
<html>
<head>
    <title>Zone Rules</title>
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
    <div class="panel">
        <h3>Create Rule</h3>
        <div class="panel-body">
            <input type="text">
            <button>Add Rule</button>
        </div>
    </div>

    <div class="panel">
        <h3>Existing Rules</h3>
        <div class="panel-body">
            <table>
                <tr>
                    <td>Only Officers Allowed</td>
                    <td><button>Delete</button></td>
                </tr>
            </table>
        </div>
    </div>
</div>

</body>
</html>
