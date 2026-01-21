<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../model/request_model.php";

$model = new RequestModel();

$pendingCount = $model->countPending();
$approvedRequests = $model->getApprovedRequests();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Officer Dashboard</title>
    <link rel="stylesheet" href="officer.css">
</head>
<body>

<div class="top-nav">
    <a href="officer-dashboard.php">Dashboard</a>
    <a href="../controller/logout_controller.php"
    class="logout-link"
    onclick="return confirm('Are you sure you want to logout?');">
    Logout
    </a>

</div>


<div class="main">

    <h2>Officer Dashboard</h2>

    
    <div class="info-box">
        <strong>Total Pending Requests</strong>
        <div><?= $pendingCount ?></div>
    </div>

    <br>

    
    <h3>Accepted Requests</h3>

    <table border="1" cellpadding="10">
        <tr>
            <th>Visitor Name</th>
            <th>Requested Zone</th>
            <th>Purpose</th>
            <th>Duration</th>
        </tr>

        <?php if ($approvedRequests && $approvedRequests->num_rows > 0): ?>
            <?php while ($row = $approvedRequests->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row["employee_name"]) ?></td>
                    <td><?= htmlspecialchars($row["zone_name"]) ?></td>
                    <td><?= htmlspecialchars($row["visit_purpose"]) ?></td>
                    <td><?= $row["duration_hours"] ?> Hours</td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No approved requests found</td>
            </tr>
        <?php endif; ?>
    </table>

    <br>

    
    <a href="review-requests.php">
        <button>View Pending Requests</button>
    </a>

</div>

</body>
</html>
