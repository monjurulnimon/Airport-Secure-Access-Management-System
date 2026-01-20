<?php
session_start();
require_once __DIR__ . "/../model/request-history-model.php";

if (
    !isset($_SESSION["isLoggedIn"]) ||
    $_SESSION["role"] !== "employee"
) {
    exit;
}

$email = $_SESSION["email"];
$keyword = $_GET["q"] ?? "";

$model = new RequestHistoryModel();
$results = $model->searchHistory($email, $keyword);

/* Return HTML rows */
if (!empty($results)) {
    foreach ($results as $row) {
        echo "<tr>
                <td>" . htmlspecialchars($row['zone_name']) . "</td>
                <td>" . htmlspecialchars($row['visit_purpose']) . "</td>
                <td>" . ucfirst(htmlspecialchars($row['status'])) . "</td>
                <td>" . date('d M Y', strtotime($row['created_at'])) . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No matching records found.</td></tr>";
}
