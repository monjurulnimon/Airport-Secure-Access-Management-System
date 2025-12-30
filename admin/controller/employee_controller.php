<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../model/employee_model.php";

$model = new EmployeeModel();

/* DELETE EMPLOYEE */
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["deleteEmployee"])) {

    if (!isset($_POST["employee_id"]) || empty($_POST["employee_id"])) {
        header("Location: ../view/all-employees.php?error=invalid");
        exit;
    }

    $id = intval($_POST["employee_id"]);

    $model->deleteEmployee($id);

    header("Location: ../view/all-employees.php?success=deleted");
    exit;
}
