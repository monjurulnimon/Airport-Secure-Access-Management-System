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
    const profileImage = document.querySelector('[name="profile_image"]').files[0];

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

    if (!profileImage) {
        showAlert("Profile picture is required.");
        return false;
    }

    const allowedTypes = ["image/jpeg", "image/png", "image/jpg"];
    if (!allowedTypes.includes(profileImage.type)) {
        showAlert("Only JPG and PNG images are allowed.");
        return false;
    }

    if (profileImage.size > 2 * 1024 * 1024) {
        showAlert("Profile picture must be less than 2MB.");
        return false;
    }

    return true;
}
