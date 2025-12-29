<!DOCTYPE html>
<html>
<head>
    <title>Request Access</title>
    <link rel="stylesheet" href="employee.css">
</head>
<body>

<!-- TOP NAV -->
<div class="top-nav">
    <a href="employee-dashboard.php">Dashboard</a>
    <a href="request-access.php">Request Access</a>
    <a href="request-status.php">Request Status</a>
    <a href="access-pass.php">Access Pass</a>
    <a href="request-history.php">Request History</a>
    <a href="#">Logout</a>
</div>

<div class="main">
    <div class="panel">
        <h3>Temporary Access Request</h3>
        <div class="panel-body">

            <label>Select Access Zone</label>
            <select>
                <option>Terminal A</option>
                <option>Control Room</option>
                <option>Cargo Area</option>
            </select>

            <label>Visit Purpose</label>
            <textarea rows="3"></textarea>

            <label>Date of Visit</label>
            <input type="date">

            <label>Duration (hours)</label>
            <input type="number">

            <div class="rules-section">

                <h4>Airport Access Rules</h4>

                <ul>
                    <li>Access is allowed only for the approved zone.</li>
                    <li>Pass must be shown at security checkpoints.</li>
                    <li>Access expires automatically after approved duration.</li>
                    <li>Violation of rules may result in permanent restriction.</li>
                </ul>

                <!-- ISOLATED CONTAINER -->
                <div class="agree-wrapper">
                    <div class="agree-box">
                        <input type="checkbox" id="agreeRules">
                        <label for="agreeRules">I agree to airport access rules</label>
                    </div>
                </div>

             </div>

            <button type="submit">Submit</button>

        </div>
    </div>
</div>

</body>
</html>
