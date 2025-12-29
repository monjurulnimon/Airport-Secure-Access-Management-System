<?php
session_start();

if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["role"] !== "employee") {
    header("Location: ../../auth/login.php");
    exit;
}
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
    <a href="logout.php">Logout</a>
</div>

<div class="main">
    <div class="panel">
        <h3>Temporary Access Request</h3>

        <!-- ✅ FORM START -->
        <form method="POST" action="../controller/request-access-controller.php">
            <div class="panel-body">

                <label>Select Access Zone</label>
                <select name="zone" required>
                    <option value="">-- Select Zone --</option>
                    <option value="Terminal A">Terminal A</option>
                    <option value="Control Room">Control Room</option>
                    <option value="Cargo Area">Cargo Area</option>
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
                        <li>Access is allowed only for the approved zone.</li>
                        <li>Pass must be shown at security checkpoints.</li>
                        <li>Access expires automatically after approved duration.</li>
                        <li>Violation of rules may result in permanent restriction.</li>
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
        <!-- ✅ FORM END -->

    </div>
</div>

</body>
</html>
