<?php
require_once "db_connection.php";

class AccessPassModel {

    public function getApprovedPassesByEmail($email) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $stmt = $conn->prepare(
            "SELECT employee_name, zone_name, visit_date, duration_hours
             FROM zone_access_requests
             WHERE employee_email = ?
               AND status = 'approved'
             ORDER BY visit_date DESC"
        );

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        $passes = [];
        while ($row = $result->fetch_assoc()) {
            $passes[] = $row;
        }

        $stmt->close();
        $db->closeConnection($conn);

        return $passes;
    }
}
