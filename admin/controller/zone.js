function validateZone() {
    const zone = document.getElementById("zone_name").value.trim();
    const error = document.getElementById("zoneError");

    if (zone === "") {
        error.innerText = "Zone name cannot be empty";
        return false;
    }

    if (zone.length < 3) {
        error.innerText = "Zone name must be at least 3 characters";
        return false;
    }

    error.innerText = "";
    return true;
}