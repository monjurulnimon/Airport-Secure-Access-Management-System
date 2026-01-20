function validateRule() {
    const rule = document.getElementById("rule_text").value.trim();
    const error = document.getElementById("ruleError");

    if (rule === "") {
        error.innerText = "Rule cannot be empty";
        return false;
    }

    if (rule.length < 8) {
        error.innerText = "Rule must be at least 5 characters";
        return false;
    }

    error.innerText = "";
    return true;
}
