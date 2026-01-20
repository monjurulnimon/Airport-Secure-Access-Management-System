<?php
require_once "../model/zone_rule_model.php";
$model = new ZoneRuleModel();
$rules = $model->getAllRules();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Zone Rules</title>
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

    <!-- CREATE RULE -->
    <div class="panel">
        <h3>Create Rule</h3>
        <div class="panel-body">

            <?php if (isset($_GET["error"]) && $_GET["error"] === "length") { ?>
                <p style="color:red;">Rule must be at least 5 characters.</p>
            <?php } ?>

            <?php if (isset($_GET["error"]) && $_GET["error"] === "exists") { ?>
                <p style="color:red;">Rule already exists.</p>
            <?php } ?>

            <form method="POST"
                  action="../controller/zone_rule_controller.php"
                  onsubmit="return validateRule();">

                <input type="text"
                       name="rule_text"
                       id="rule_text"
                       placeholder="Enter rule...">

                <button type="submit" name="createRule">Add Rule</button>

                <p id="ruleError" style="color:red; margin-top:5px;"></p>
            </form>

        </div>
    </div>

    <!-- EXISTING RULES -->
    <div class="panel">
        <h3>Existing Rules</h3>
        <div class="panel-body">

            <table>
                <tr>
                    <th>Rule</th>
                    <th>Action</th>
                </tr>

                <?php if ($rules && $rules->num_rows > 0) {
                    while ($row = $rules->fetch_assoc()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row["rule_text"]) ?></td>
                            <td>
                                <form method="POST"
                                      action="../controller/zone_rule_controller.php"
                                      onsubmit="return confirm('Delete this rule?');">
                                    <input type="hidden" name="rule_id" value="<?= htmlspecialchars($row["id"]) ?>">
                                    <button type="submit" name="deleteRule">Delete</button>
                                </form>
                            </td>
                        </tr>
                <?php }
                } else { ?>
                    <tr>
                        <td colspan="2">No rules found</td>
                    </tr>
                <?php } ?>

            </table>

        </div>
    </div>

</div>

<script src="../controller/zone_rule.js"></script>


</body>
</html>
