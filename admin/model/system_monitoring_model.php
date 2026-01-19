<?php
require_once "db_connection.php";

class SystemMonitoringModel {

    public function getAllAccessLogs() {
        $db = new db_connection();
        $conn = $db->openConnection();

        $sql = "
            SELECT 
                employee_name,
                employee_email,
                zone_name,
                visit_purpose,
                visit_date,
                duration_hours,
                status,
                remarks,
                created_at
            FROM zone_access_requests
            ORDER BY created_at DESC
        ";

        $result = $conn->query($sql);
        return $result;
    }
}
?>
