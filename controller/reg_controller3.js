console.log("reg_controller3.js loaded");

function showAlert(message) {
    const alertBox = document.getElementById("customAlert");
    const alertMsg = document.getElementById("alertMessage");

    alertMsg.innerText = message;
    alertBox.style.display = "block";
}

function hideAlert() {
    const alertBox = document.getElementById("customAlert");
    if (alertBox) alertBox.style.display = "none";
}

function validateStep3() {
    hideAlert();

    const designation = document.querySelector('[name="designation"]').value.trim();
    const organization = document.querySelector('[name="organization"]').value.trim();
    const visitorType = document.querySelector('[name="visitor_type"]').value;

    if (!designation) {
        showAlert("Designation is required.");
        return false;
    }

    if (!organization) {
        showAlert("Organization is required.");
        return false;
    }

    if (!visitorType) {
        showAlert("Visitor type is required.");
        return false;
    }

    // Optional debug (safe to remove later)
    console.log("Step 3 validated successfully");

    return true; // allow form submission
}
