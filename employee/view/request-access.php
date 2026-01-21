<?php
session_start();

if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["role"] !== "employee") {
    header("Location: ../../auth/login.php");
    exit;
}


require_once "../model/zone_model.php";

$zoneModel = new ZoneModel();


$zones = $zoneModel->getActiveZones();
$rules = $zoneModel->getAllRules();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Request Access</title>
    <link rel="stylesheet" href="employee.css">
</head>
<body>

<div class="top-nav">
    <a href="employee-dashboard.php">Dashboard</a>
    <a href="request-access.php">Request Access</a>
    <a href="request-status.php">Request Status</a>
    <a href="access-pass.php">Access Pass</a>
    <a href="request-history.php">Request History</a>
    <a href="auth/logout.php">Logout</a>
</div>

<div class="main">
    <div class="panel">
        <h3>Temporary Access Request</h3>

        <!-- ===== FORM START ===== -->
        <form method="POST" action="../controller/request-access-controller.php">
            <div class="panel-body">

                <!-- ZONE DROPDOWN -->
                <label>Select Access Zone</label>
                <select name="zone" required>
                    <option value="">-- Select Zone --</option>
                    <?php if ($zones && $zones->num_rows > 0) { ?>
                        <?php while ($zone = $zones->fetch_assoc()) { ?>
                            <option value="<?= htmlspecialchars($zone['zone_name']) ?>">
                                <?= htmlspecialchars($zone['zone_name']) ?>
                            </option>
                        <?php } ?>
                    <?php } ?>
                </select>

                
                <label>Visit Purpose</label>
                <textarea name="purpose" rows="3" required></textarea>

                
                <label>Date of Visit</label>
                <input type="date" name="visit_date" required>

                
                <label>Duration (hours)</label>
                <input type="number" name="duration" min="1" required>

                
                <div class="rules-section">
                    <h4>Airport Access Rules</h4>
                    <ul>
                        <?php if ($rules && $rules->num_rows > 0) { ?>
                            <?php while ($rule = $rules->fetch_assoc()) { ?>
                                <li><?= htmlspecialchars($rule['rule_text']) ?></li>
                            <?php } ?>
                        <?php } else { ?>
                            <li>No rules defined.</li>
                        <?php } ?>
                    </ul>

                    <div class="agree-wrapper">
                        <div class="agree-box">
                            <input type="checkbox" name="agree" required>
                            <label>I agree to airport access rules</label>
                        </div>
                    </div>
                </div>

                
                <button type="submit">Submit</button>

            </div>
        </form>
        

    </div>
</div>

</body>
</html>
