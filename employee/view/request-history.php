<?php
require_once __DIR__ . "/../controller/request-history-controller.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Request History</title>
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
        <h3>Request History</h3>

        <!-- SEARCH BOX -->
        <input type="text" id="search"
               placeholder="Search by zone, purpose or status"
               style="width:100%; padding:8px; margin-bottom:10px;">

        <div class="panel-body">
            <table>
                <thead>
                    <tr>
                        <th>Zone</th>
                        <th>Purpose</th>
                        <th>Status</th>
                        <th>Request Date</th>
                    </tr>
                </thead>
                <tbody id="history-body">
                <?php if (!empty($history)): ?>
                    <?php foreach ($history as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row["zone_name"]) ?></td>
                            <td><?= htmlspecialchars($row["visit_purpose"]) ?></td>
                            <td><?= ucfirst(htmlspecialchars($row["status"])) ?></td>
                            <td><?= date("d M Y", strtotime($row["created_at"])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4">No request history found.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.getElementById("search").addEventListener("keyup", function () {
    const query = this.value;
    const xhr = new XMLHttpRequest();

    xhr.open(
        "GET",
        "../controller/request-history-ajax.php?q=" + encodeURIComponent(query),
        true
    );

    xhr.onload = function () {
        if (this.status === 200) {
            document.getElementById("history-body").innerHTML = this.responseText;
        }
    };

    xhr.send();
});
</script>

</body>
</html>
