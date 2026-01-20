<?php
require_once __DIR__ . "/db.php";

class RequestModel {

    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    /* =========================
       DASHBOARD METHODS
       ========================= */

    public function countPending() {
        $sql = "SELECT COUNT(*) AS total 
                FROM zone_access_requests 
                WHERE status = 'pending'";

        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);

        return $row['total'] ?? 0;
    }

    public function getApprovedRequests() {
        $sql = "SELECT employee_name, zone_name, visit_purpose, duration_hours
                FROM zone_access_requests
                WHERE status = 'approved'";

        return mysqli_query($this->conn, $sql);
    }

    public function getPendingRequests() {
        $sql = "SELECT *
                FROM zone_access_requests
                WHERE status = 'pending'";

        return mysqli_query($this->conn, $sql);
    }

    /* =========================
       UPDATE REQUEST
       ========================= */

    public function updateRequest($id, $status, $remarks) {
        $stmt = mysqli_prepare(
            $this->conn,
            "UPDATE zone_access_requests
             SET status = ?, remarks = ?
             WHERE id = ?"
        );

        mysqli_stmt_bind_param($stmt, "ssi", $status, $remarks, $id);
        return mysqli_stmt_execute($stmt);
    }

    /* =========================
       AJAX SEARCH (PENDING)
       ========================= */

    public function searchPendingByVisitor($keyword) {
        $keyword = "%" . $keyword . "%";

        $stmt = mysqli_prepare(
            $this->conn,
            "SELECT *
             FROM zone_access_requests
             WHERE status = 'pending'
               AND employee_name LIKE ?"
        );

        mysqli_stmt_bind_param($stmt, "s", $keyword);
        mysqli_stmt_execute($stmt);

        return mysqli_stmt_get_result($stmt);
    }
}
