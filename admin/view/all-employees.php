<!DOCTYPE html>
<html>
<head>
    <title>All Employees</title>
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
        <h3>All Employees</h3>

        <div class="panel-body">

            
            <input type="text"
                   id="employeeSearch"
                   placeholder="Search employee by name or email..."
                   style="width:300px; padding:6px; margin-bottom:10px;">

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody id="employeeTableBody">
                    <tr>
                        <td colspan="3">Type to search employees...</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>


<script src="../controller/employee_search.js"></script>

</body>
</html>
