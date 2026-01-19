<?php
require_once "db_connection.php";

class RequestStatusModel {

    public function getByEmployeeEmail($email) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $stmt = $conn->prepare(
            "SELECT id, zone_name, status, remarks
             FROM zone_access_requests
             WHERE employee_email = ?
             ORDER BY id DESC"
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

    public function deletePendingRequest($requestId, $email) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $stmt = $conn->prepare(
            "DELETE FROM zone_access_requests
             WHERE id = ?
               AND employee_email = ?
               AND status = 'pending'"
        );

        $stmt->bind_param("is", $requestId, $email);
        $stmt->execute();

        $stmt->close();
        $db->closeConnection($conn);
    }

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
}
