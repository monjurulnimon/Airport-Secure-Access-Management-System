<?php
require_once "db_connection.php";

class ZoneRuleModel {

    public function createRule($ruleText) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $sql = "INSERT INTO zone_rules (rule_text) VALUES ('$ruleText')";
        $result = $conn->query($sql);

        $db->closeConnection($conn);
        return $result;
    }

    public function getAllRules() {
        $db = new db_connection();
        $conn = $db->openConnection();

        $sql = "SELECT * FROM zone_rules ORDER BY id DESC";
        $result = $conn->query($sql);

        return $result;
    }

    public function deleteRule($id) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $sql = "DELETE FROM zone_rules WHERE id=$id";
        $result = $conn->query($sql);

        $db->closeConnection($conn);
        return $result;
    }

    public function ruleExists($ruleText) {
        $db = new db_connection();
        $conn = $db->openConnection();

        $sql = "SELECT id FROM zone_rules WHERE rule_text='$ruleText'";
        $result = $conn->query($sql);

        $exists = ($result && $result->num_rows > 0);
        $db->closeConnection($conn);

        return $exists;
    }
}
?>
