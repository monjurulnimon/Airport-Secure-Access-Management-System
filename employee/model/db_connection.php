<?php 

class db_connection {

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

    // Visitor Registration (INSERT)
    function registerVisitor(
        $connection,
        $tableName,
        $name,
        $email,
        $password,
        $contact,
        $address,
        $city,
        $country,
        $designation,
        $visitor_type
    ) {

        $sql = "INSERT INTO " . $tableName . " 
        (name, email, password, contact, address, city, country, designation, visitor_type) 
        VALUES (
            '" . $name . "',
            '" . $email . "',
            '" . $password . "',
            '" . $contact . "',
            '" . $address . "',
            '" . $city . "',
            '" . $country . "',
            '" . $designation . "',
            '" . $visitor_type . "'
        )";

        $result = $connection->query($sql);
        return $result;
    }
           
    // Visitor Login
    function loginVisitor($connection, $tableName, $email, $password) {

        $sql = "SELECT * FROM " . $tableName . " 
                WHERE email='" . $email . "' 
                AND password='" . $password . "'";

        $result = $connection->query($sql);
        return $result;
    }

    function closeConnection($connection) {
        $connection->close();
    }
}
?>
