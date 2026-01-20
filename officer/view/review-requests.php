<?php
include "db.php";

$query = "SELECT * FROM zone_access_requests WHERE status = 'pending'";
$result = mysqli_query($conn, $query);
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
    <a href="#">Logout</a>
</div>

<div class="main">
    <div class="section">
        <h2>Pending Access Requests</h2>

        <?php if (mysqli_num_rows($result) == 0) { ?>
            <p>No pending requests</p>
        <?php } ?>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <div class="request-block">

            <table>
                <tr>
                    <th>Visitor Name</th>
                    <th>Requested Zone</th>
                    <th>Reason</th>
                    <th>Duration</th>
                </tr>
                <tr>
                    <td><?= $row['employee_name'] ?></td>
                    <td><?= $row['zone_name'] ?></td>
                    <td><?= $row['visit_purpose'] ?></td>
                    <td><?= $row['duration_hours'] ?> Hour</td>
                </tr>
            </table>

            <form method="POST" action="process-request.php">
               <input type="hidden" name="request_id" value="<?php echo $row['id']; ?>">
                       value="<?= $row['request_id'] ?>">

                <strong>Officer Remarks:</strong><br>
                <textarea name="remarks" required></textarea><br><br>

                <button type="submit" name="action"
                        value="approved" class="approve">
                    Approve
                </button>

                <button type="submit" name="action"
                        value="rejected" class="reject">
                    Reject
                </button>
            </form>

        </div>

        <?php } ?>

    </div>
</div>

</body>
</html>
