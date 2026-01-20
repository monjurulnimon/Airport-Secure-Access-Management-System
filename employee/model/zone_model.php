<?php
require_once __DIR__ . "/db_connection.php";

class ZoneModel {

    public function getActiveZones() {
        $db = new db_connection();
        $conn = $db->openConnection();

        $stmt = $conn->prepare(
            "SELECT zone_name FROM zones WHERE status = 'active'"
        );
        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();
        $db->closeConnection($conn);

        return $result;
    }

    public function getAllRules() {
        $db = new db_connection();
        $conn = $db->openConnection();

        $stmt = $conn->prepare(
            "SELECT rule_text FROM zone_rules"
        );
        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();
        $db->closeConnection($conn);

        return $result;
    }
}
