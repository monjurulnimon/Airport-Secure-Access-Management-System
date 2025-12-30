
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
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tbody>

                <tr>
                    <td>John Doe</td>
                    <td>john.doe@airport.com</td>
                    <td>
                        <button>Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>Jane Smith</td>
                    <td>jane.smith@airport.com</td>
                    <td>
                        <button>Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>Holy Diver</td>
                    <td>holly.doe@airport.com</td>
                    <td>
                        <button>Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>Jimy</td>
                    <td>jimy.smith@airport.com</td>
                    <td>
                        <button>Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</div>

</body>
</html>
