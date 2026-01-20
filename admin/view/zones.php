<?php
require_once "../model/zone_model.php";
$model = new ZoneModel();
$zones = $model->getAllZones();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Zones</title>
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

    <!-- CREATE ZONE -->
    <div class="panel">
        <h3>Create Zone</h3>
        <div class="panel-body">

            <form method="POST"
                  action="../controller/zone_controller.php"
                  onsubmit="return validateZone();">

                <label>Zone Name</label>
                <input type="text" name="zone_name" id="zone_name">
                <button type="submit" name="createZone">Create Zone</button>

                <p id="zoneError" style="color:red; margin-top:5px;"></p>
            </form>

        </div>
    </div>

    <!-- EXISTING ZONES -->
    <div class="panel">
        <h3>Existing Zones</h3>
        <div class="panel-body">

            <table>
                <tr>
                    <th>Zone Name</th>
                    <th>Action</th>
                </tr>

                <?php if ($zones && $zones->num_rows > 0) {
                    while ($row = $zones->fetch_assoc()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row["zone_name"]) ?></td>
                            <td>
                                <form method="POST"
                                      action="../controller/zone_controller.php"
                                      onsubmit="return confirm('Delete this zone permanently?');">
                                    <input type="hidden" name="zone_id" value="<?= $row["id"] ?>">
                                    <button type="submit" name="deleteZone">Delete</button>
                                </form>
                            </td>
                        </tr>
                <?php }
                } else { ?>
                    <tr>
                        <td colspan="2">No zones found</td>
                    </tr>
                <?php } ?>

            </table>

        </div>
    </div>

</div>

<script src="../controller/zone.js"></script>


</body>
</html>
