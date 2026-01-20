<?php
require_once __DIR__ . "/db_connection.php";

class RequestHistoryModel {

    public function getHistoryByEmployeeEmail($email) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $stmt = $conn->prepare(
            "SELECT zone_name, visit_purpose, status, created_at
             FROM zone_access_requests
             WHERE employee_email = ?
               AND status != 'pending'
             ORDER BY created_at DESC"
        );

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $stmt->close();
        $db->closeConnection($conn);
        return $data;
    }

    /* AJAX SEARCH */
    public function searchHistory($email, $keyword) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $like = "%" . $keyword . "%";

        $stmt = $conn->prepare(
            "SELECT zone_name, visit_purpose, status, created_at
             FROM zone_access_requests
             WHERE employee_email = ?
               AND status != 'pending'
               AND (
                   zone_name LIKE ? OR
                   visit_purpose LIKE ? OR
                   status LIKE ?
               )
             ORDER BY created_at DESC"
        );

        $stmt->bind_param("ssss", $email, $like, $like, $like);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $stmt->close();
        $db->closeConnection($conn);
        return $data;
    }
}
