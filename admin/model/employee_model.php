<?php
require_once "db_connection.php";

class EmployeeModel {

    public function getAllEmployees() {
        $db = new db_connection();
        $conn = $db->openConnection();

        $sql = "SELECT id, name, email FROM employees";
        return $conn->query($sql);
    }

    public function searchEmployees($keyword) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $sql = "SELECT id, name, email FROM employees 
                WHERE name LIKE ? OR email LIKE ?";
        $stmt = $conn->prepare($sql);

        $search = "%" . $keyword . "%";
        $stmt->bind_param("ss", $search, $search);
        $stmt->execute();

        return $stmt->get_result();
    }

    public function deleteEmployee($id) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $sql = "DELETE FROM employees WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
