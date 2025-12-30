<?php
include 'db.php';  // path adjust korbe according to folder

$sql = "SELECT employee_name, zone_name, visit_purpose, duration_hours FROM zone_access_requests";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>







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


<?php
// Check if $pending exists, otherwise initialize as empty array
if (!isset($pending)) {
    $pending = []; // empty array default
}
?>



               <div><?php echo $pending['total'] ?? 0; ?></div>


            </div>
        </div>

        <br>

        <!-- ACCEPTED REQUESTS TABLE -->
        <h3>Accepted Requests</h3>




          
    <table border="1" cellpadding="10">
    <tr>
        <th>Visitor Name</th>
        <th>Requested Zone</th>
        <th>Purpose</th> <!-- visit_purpose -->
        <th>Duration</th>
    </tr>

    <?php
    include 'db.php'; // path adjust koro

    $sql = "SELECT employee_name, zone_name, visit_purpose, duration_hours FROM zone_access_requests";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['employee_name']."</td>";
            echo "<td>".$row['zone_name']."</td>";
            echo "<td>".$row['visit_purpose']."</td>"; // Purpose column
            echo "<td>".$row['duration_hours']." Hours</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No data found</td></tr>";
    }
    ?>

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
