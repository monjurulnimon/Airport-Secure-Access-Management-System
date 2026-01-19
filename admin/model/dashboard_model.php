<?php
require_once "db_connection.php";

class DashboardModel {

    /* COUNT EMPLOYEES */
    public function countEmployees() {
        $db = new db_connection();
        $conn = $db->openConnection();

        $sql = "SELECT COUNT(*) AS total FROM employees";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $db->closeConnection($conn);
        return $row["total"];
    }

    /* COUNT SECURITY OFFICERS */
    public function countSecurityOfficers() {
        $db = new db_connection();
        $conn = $db->openConnection();

        $sql = "SELECT COUNT(*) AS total FROM security_officers";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $db->closeConnection($conn);
        return $row["total"];
    }

    /* COUNT ZONES */
    public function countZones() {
        $db = new db_connection();
        $conn = $db->openConnection();

        $sql = "SELECT COUNT(*) AS total FROM zones";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $db->closeConnection($conn);
        return $row["total"];
    }

    /* COUNT REQUESTS BY STATUS */
    public function countRequestsByStatus($status) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $sql = "SELECT COUNT(*) AS total 
                FROM zone_access_requests 
                WHERE status = '$status'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $db->closeConnection($conn);
        return $row["total"];
    }
}
