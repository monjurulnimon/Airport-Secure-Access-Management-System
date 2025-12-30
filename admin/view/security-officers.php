<?php
require_once "../model/security_officer_model.php";

$model = new SecurityOfficerModel();
$officers = $model->getAllOfficers();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Security Officers</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<!-- ===== SIDEBAR ===== -->
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

<!-- ===== MAIN CONTENT ===== -->
<div class="main">

    <!-- CREATE SECURITY OFFICER -->
    <div class="panel">
        <h3>Create Security Officer</h3>
        <div class="panel-body">

            <?php if (isset($_GET["error"])) { ?>
                <p style="color:red;">Username and Password are required.</p>
            <?php } ?>

            <?php if (isset($_GET["success"]) && $_GET["success"] === "created") { ?>
                <p style="color:green;">Security officer created successfully.</p>
            <?php } ?>

            <form method="POST" action="../controller/security_officer_controller.php">
                <label>Username</label>
                <input type="text" name="username" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <button type="submit" name="createOfficer">Create Officer</button>
            </form>

        </div>
    </div>

    <!-- EXISTING SECURITY OFFICERS -->
    <div class="panel">
        <h3>Existing Security Officers</h3>
        <div class="panel-body">

            <table>
                <tr>
                    <th>Username</th>
                    <th>Action</th>
                </tr>

                <?php if ($officers && $officers->num_rows > 0) { ?>
                    <?php while ($row = $officers->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row["username"]); ?></td>
                            <td>
                                <form method="POST"
                                      action="../controller/security_officer_controller.php"
                                      onsubmit="return confirm('Are you sure you want to delete this officer?');"
                                      style="display:inline;">

                                    <input type="hidden" name="officer_id"
                                           value="<?php echo $row['id']; ?>">

                                    <button type="submit" name="deleteOfficer">
                                        Delete
                                    </button>

                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="2">No security officers found</td>
                    </tr>
                <?php } ?>

            </table>

        </div>
    </div>

</div>

</body>
</html>
