<?php 

class db_connection {

    /* ================= DATABASE CONNECTION ================= */

    function openConnection() {
        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "asams";

        $connection = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if ($connection->connect_error) {
            die("Failed to connect database " . $connection->connect_error);
        }

        return $connection;
    }

    /* ================= VISITOR REGISTRATION ================= */

    public function registerVisitor(
        $conn,
        $table,
        $name,
        $email,
        $password,
        $contact,
        $address,
        $city,
        $country,
        $designation,
        $visitor_type,
        $profile_image
    ) {
        $sql = "INSERT INTO $table
        (name, email, password, contact, address, city, country, designation, visitor_type, profile_image)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }


        $stmt->bind_param(
            "ssssssssss",
            $name,
            $email,
            $password,
            $contact,
            $address,
            $city,
            $country,
            $designation,
            $visitor_type,
            $profile_image
        );

        return $stmt->execute();
    }
    public function loginSecurityOfficer($conn, $email, $pass) {

    $stmt = $conn->prepare(
        "SELECT id, email, profile
         FROM security_officers
         WHERE email = ? AND pass = ?"
    );

    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();

    return $stmt->get_result();
}


    /* ================= VISITOR LOGIN ================= */

    function loginVisitor($connection, $tableName, $email, $password) {

        $sql = "SELECT * FROM " . $tableName . " 
                WHERE email='" . $email . "' 
                AND password='" . $password . "'";

        $result = $connection->query($sql);
        return $result;
    }

    /* ================= CLOSE CONNECTION ================= */

    function closeConnection($connection) {
        $connection->close();
    }
}
?>
