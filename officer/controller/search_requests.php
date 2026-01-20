<?php
require_once "../model/request_model.php";

$model = new RequestModel();

$keyword = trim($_GET["q"] ?? "");

$data = [];

if ($keyword !== "") {
    $result = $model->searchPendingByVisitor($keyword);

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

header("Content-Type: application/json");
echo json_encode($data);
exit;
