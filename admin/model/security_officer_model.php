<?php
require_once __DIR__ . "/db_connection.php";

class SecurityOfficerModel {

    // CREATE OFFICER
    public function createOfficer($username, $password) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $sql = "INSERT INTO security_officers (username, password)
                VALUES ('$username', '$password')";

        $result = $conn->query($sql);
        $db->closeConnection($conn);

        return $result;
    }


    // CHECK USERNAME EXISTS
    public function usernameExists($username) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $stmt = $conn->prepare(
            "SELECT id FROM security_officers WHERE username = ?"
        );
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        $exists = $stmt->num_rows > 0;

        $stmt->close();
        $db->closeConnection($conn);
        return $exists;
    }

    // FETCH ALL OFFICERS
    public function getAllOfficers() {
        $db = new db_connection();
        $conn = $db->openConnection();

        $sql = "SELECT id, username FROM security_officers";
        $result = $conn->query($sql);

        $db->closeConnection($conn);
        return $result;
    }

    // DELETE OFFICER
    public function deleteOfficer($id) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $stmt = $conn->prepare(
            "DELETE FROM security_officers WHERE id = ?"
        );
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();

        $stmt->close();
        $db->closeConnection($conn);
        return $result;
    }
}
?>
