<?php
require_once "db_connection.php";

class ZoneModel {

    /* CREATE ZONE */
    public function createZone($zoneName) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $sql = "INSERT INTO zones (zone_name) VALUES ('$zoneName')";
        $result = $conn->query($sql);

        $db->closeConnection($conn);
        return $result;
    }

    /* FETCH ALL ZONES */
    public function getAllZones() {
        $db = new db_connection();
        $conn = $db->openConnection();

        // HARD DELETE SUPPORT — NO STATUS FILTER
        $sql = "SELECT * FROM zones ORDER BY id DESC";
        $result = $conn->query($sql);

        return $result;
    }

    /* HARD DELETE ZONE */
    public function deleteZone($id) {
        $db = new db_connection();
        $conn = $db->openConnection();

        // REAL DELETE FROM DATABASE
        $sql = "DELETE FROM zones WHERE id=$id";
        $result = $conn->query($sql);

        $db->closeConnection($conn);
        return $result;
    }

    /* CHECK ZONE EXISTS */
    public function zoneExists($zoneName) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $sql = "SELECT id FROM zones WHERE zone_name='$zoneName'";
        $result = $conn->query($sql);

        $exists = ($result && $result->num_rows > 0);

        $db->closeConnection($conn);
        return $exists;
    }
}
?>
