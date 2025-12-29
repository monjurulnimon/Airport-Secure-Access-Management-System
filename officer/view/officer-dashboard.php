<!DOCTYPE html>
<html>
<head>
    <title>Officer Dashboard</title>
    <link rel="stylesheet" href="officer.css">
</head>
<body>

<!-- Top Navigation -->
<div class="top-nav">
    <a href="officer-dashboard.php">Dashboard</a>
    <a href="#">Logout</a>
</div>

<div class="main">

    <div class="section">
        <h2>Officer Dashboard</h2>

        <!-- TOTAL PENDING -->
        <div class="info-row">
            <div class="info-box">
                <strong>Total Pending Requests</strong>
                <div>12</div>
            </div>
        </div>

        <br>

        <!-- ACCEPTED REQUESTS TABLE -->
        <h3>Accepted Requests</h3>

        <table>
            <tr>
                <th>Visitor Name</th>
                <th>Requested Zone</th>
                <th>Reason</th>
                <th>Duration</th>
            </tr>

            <tr>
                <td>Ali Hasan</td>
                <td>Terminal A</td>
                <td>Maintenance Work</td>
                <td>2 Hours</td>
            </tr>

            <tr>
                <td>Rahim Uddin</td>
                <td>Control Room</td>
                <td>System Inspection</td>
                <td>1 Hour</td>
            </tr>

            <tr>
                <td>Karim Ahmed</td>
                <td>Cargo Area</td>
                <td>Logistics Check</td>
                <td>3 Hours</td>
            </tr>
        </table>

        <!-- BUTTON BELOW TABLE (RIGHT) -->
        <div class="right-action">
            <a href="review-requests.php">
                <button>View Pending Requests</button>
            </a>
        </div>

    </div>

</div>

</body>
</html>
