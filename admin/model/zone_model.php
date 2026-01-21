<?php
require_once "db_connection.php";

class ZoneModel {

    public function createZone($zoneName) {
    $db = new db_connection();
    $conn = $db->openConnection();

    $sql = "INSERT INTO zones (zone_name) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $zoneName);
    $result = $stmt->execute();

    $db->closeConnection($conn);
    return $result;
}

    public function getAllZones() {
        $db = new db_connection();
        $conn = $db->openConnection();

        // HARD DELETE SUPPORT — NO STATUS FILTER
        $sql = "SELECT * FROM zones ORDER BY id DESC";
        $result = $conn->query($sql);

        return $result;
    }

    public function deleteZone($id) {
        $db = new db_connection();
        $conn = $db->openConnection();

        // REAL DELETE FROM DATABASE
        $sql = "DELETE FROM zones WHERE id=$id";
        $result = $conn->query($sql);

        $db->closeConnection($conn);
        return $result;
    }

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
