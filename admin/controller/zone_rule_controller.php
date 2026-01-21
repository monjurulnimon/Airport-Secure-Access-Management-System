<?php
require_once "../model/zone_rule_model.php";

$model = new ZoneRuleModel();


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["createRule"])) {

    $ruleText = trim($_POST["rule_text"]);

    if (strlen($ruleText) < 5) {
        header("Location: ../view/zone-rules.php?error=length");
        exit;
    }

    if ($model->ruleExists($ruleText)) {
        header("Location: ../view/zone-rules.php?error=exists");
        exit;
    }

    $model->createRule($ruleText);
    header("Location: ../view/zone-rules.php?success=created");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["deleteRule"])) {

    $id = intval($_POST["rule_id"]);
    $model->deleteRule($id);

    header("Location: ../view/zone-rules.php?success=deleted");
    exit;
}
?>
