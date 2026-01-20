<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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

            <?php if (isset($_GET["error"])): ?>
                <p class="error-msg">Email and Password are required.</p>
            <?php endif; ?>

            <?php if (isset($_GET["success"]) && $_GET["success"] === "created"): ?>
                <p class="success-msg">Security officer created successfully.</p>
            <?php endif; ?>

            <form method="POST"
                  action="../controller/security_officer_controller.php"
                  enctype="multipart/form-data">

                <label>Email</label>
                <input type="email" name="email" required>

                <label>Password</label>
                <input type="password" name="pass" required>

                <label>Profile Picture</label>
                <input type="file" name="profile" accept="image/*">

                <button type="submit" name="createOfficer">Create Officer</button>
            </form>

        </div>
    </div>

    <div class="panel">
        <h3>Existing Security Officers</h3>
        <div class="panel-body">

            <table>
                <tr>
                    <th>Email</th>
                    <th>Profile</th>
                    <th>Action</th>
                </tr>

                <?php if ($officers && $officers->num_rows > 0): ?>
                    <?php while ($row = $officers->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row["email"]) ?></td>

                            <td>
                                <img src="/Airport-Secure-Access-Management-System/admin/picture/<?= htmlspecialchars($row["profile"] ?? "default.png") ?>"
                                     width="40" height="40"
                                     style="border-radius:50%;">
                            </td>

                            <td>
                                <form method="POST"
                                      action="../controller/security_officer_controller.php"
                                      onsubmit="return confirm('Are you sure you want to delete this officer?');">

                                    <input type="hidden"
                                           name="officer_id"
                                           value="<?= htmlspecialchars($row["id"]) ?>">

                                    <button type="submit" name="deleteOfficer">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">No security officers found</td>
                    </tr>
                <?php endif; ?>

            </table>

        </div>
    </div>

</div>

</body>
</html>
