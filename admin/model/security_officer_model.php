<?php
require_once __DIR__ . "/db_connection.php";

class SecurityOfficerModel {

    public function createOfficer($email, $pass, $profile = "default.png") {
        $db = new db_connection();
        $conn = $db->openConnection();

        $stmt = $conn->prepare(
            "INSERT INTO security_officers (email, pass, profile)
             VALUES (?, ?, ?)"
        );

        $stmt->bind_param("sss", $email, $pass, $profile);
        $result = $stmt->execute();

        $stmt->close();
        $db->closeConnection($conn);

        return $result;
    }


    public function emailExists($email) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $stmt = $conn->prepare(
            "SELECT id FROM security_officers WHERE email = ?"
        );
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        $exists = $stmt->num_rows > 0;

        $stmt->close();
        $db->closeConnection($conn);

        return $exists;
    }


   public function getAllOfficers() {
    $db = new db_connection();
    $conn = $db->openConnection();

    $sql = "SELECT id, email, profile FROM security_officers";
    $result = $conn->query($sql);

    $db->closeConnection($conn);
    return $result;
}



    public function getOfficerByEmail($email) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $stmt = $conn->prepare(
            "SELECT id, email, pass, profile
             FROM security_officers
             WHERE email = ?"
        );

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        $stmt->close();
        $db->closeConnection($conn);

        return $data;
    }


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
