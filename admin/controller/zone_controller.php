<?php
require_once "../model/zone_model.php";

$model = new ZoneModel();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["createZone"])) {

    $zoneName = trim($_POST["zone_name"]);

    if (strlen($zoneName) < 3) {
        header("Location: ../view/zones.php?error=length");
        exit;
    }

    if ($model->zoneExists($zoneName)) {
        header("Location: ../view/zones.php?error=exists");
        exit;
    }

    $model->createZone($zoneName);
    header("Location: ../view/zones.php?success=created");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["deleteZone"])) {

    $id = intval($_POST["zone_id"]);
    $model->deleteZone($id);

    header("Location: ../view/zones.php?success=deleted");
    exit;
}
?>
