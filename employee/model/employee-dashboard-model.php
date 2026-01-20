<?php
require_once __DIR__ . "/db_connection.php";

class EmployeeDashboardModel {

    /* ================= PROFILE DATA ================= */

    public function getEmployeeProfileByEmail($email) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $stmt = $conn->prepare(
            "SELECT name, email, profile_image 
             FROM employees 
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

    /* ================= REQUEST COUNTS ================= */

    public function getRequestCountsByEmail($email) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $stmt = $conn->prepare(
            "SELECT 
                COUNT(*) AS total,
                SUM(status = 'pending') AS pending,
                SUM(status = 'approved') AS approved,
                SUM(status = 'rejected') AS rejected
             FROM zone_access_requests
             WHERE employee_email = ?"
        );

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        $stmt->close();
        $db->closeConnection($conn);

        return $data ?: [
            'total' => 0,
            'pending' => 0,
            'approved' => 0,
            'rejected' => 0
        ];
    }
    public function getEmployeeProfileById($id) {
    $db = new db_connection();
    $conn = $db->openConnection();

    $stmt = $conn->prepare(
        "SELECT name, email, profile_image
         FROM employees
         WHERE id = ?"
    );

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    $stmt->close();
    $db->closeConnection($conn);

    return $data;
}

}
