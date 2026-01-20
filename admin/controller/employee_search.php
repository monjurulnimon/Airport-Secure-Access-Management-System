<?php
require_once "../model/employee_model.php";

$model = new EmployeeModel();

$keyword = isset($_GET["q"]) ? trim($_GET["q"]) : "";

$result = $model->searchEmployees($keyword);

$employees = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
}

header("Content-Type: application/json");
echo json_encode($employees);
