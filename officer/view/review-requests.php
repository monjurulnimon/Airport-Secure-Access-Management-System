
<?php
require_once "../model/request_model.php";
$model = new RequestModel();
$requests = $model->getPendingRequests();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pending Access Requests</title>
    <link rel="stylesheet" href="officer.css">
</head>
<body>

<div class="top-nav">
    <a href="officer-dashboard.php">Dashboard</a>
</div>

<div class="main">
    <h2>Pending Access Requests</h2>

    <input type="text"
           placeholder="Search by visitor name..."
           onkeyup="searchRequests(this.value)"
           class="search-box">

    <?php if (isset($_GET["error"])): ?>
        <div class="error-msg">
            <?= htmlspecialchars($_GET["error"]) ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET["success"])): ?>
        <div class="success-msg">
            Request updated successfully
        </div>
    <?php endif; ?>

    <div id="searchResults"></div>




    <?php if ($requests->num_rows === 0): ?>
        <p>No pending requests</p>
    <?php endif; ?>

    <?php while ($row = $requests->fetch_assoc()): ?>

    <div class="request-block">

        <table>
            <tr>
                <th>Visitor</th>
                <th>Zone</th>
                <th>Purpose</th>
                <th>Duration</th>
            </tr>
            <tr>
                <td><?= htmlspecialchars($row["employee_name"]) ?></td>
                <td><?= htmlspecialchars($row["zone_name"]) ?></td>
                <td><?= htmlspecialchars($row["visit_purpose"]) ?></td>
                <td><?= $row["duration_hours"] ?> Hour</td>
            </tr>
        </table>

        <form method="POST"
              action="../controller/request_controller.php"
              onsubmit="return validateOfficerAction(this);">

            <input type="hidden" name="request_id" value="<?= $row["id"] ?>">

            <strong>Officer Remarks</strong><br>
            <textarea name="remarks" required></textarea><br><br>

            <button type="submit" name="action" value="approved">Approve</button>
            <button type="submit" name="action" value="rejected">Reject</button>
        </form>

    </div>

    <?php endwhile; ?>
</div>


<script src="../controller/officer_validation.js"></script>
<script src="../controller/officer_search.js"></script>

</body>
</html>
