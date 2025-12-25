console.log("reg_controller1.js loaded");

function showAlert(message) {
    const alertBox = document.getElementById("customAlert");
    const alertMsg = document.getElementById("alertMessage");

    alertMsg.innerText = message;
    alertBox.style.display = "block";
}

function hideAlert() {
    document.getElementById("customAlert").style.display = "none";
}

function validateStep1() {
    hideAlert();

    const name = document.querySelector('[name="name"]').value.trim();
    const email = document.querySelector('[name="email"]').value.trim();
    const password = document.querySelector('[name="password"]').value;
    const confirm = document.querySelector('[name="confirm_password"]').value;

    if (!name || !email || !password || !confirm) {
        showAlert("All fields are required.");
        return false;
    }

    if (!email.includes("@")) {
            hideAlert();
        showAlert("Invalid email address.");
        return false;
    }

    if (password.length < 6) {
        showAlert("Password must be at least 6 characters.");
        return false;
    }

    if (password !== confirm) {
        showAlert("Passwords do not match.");
        return false;
    }

    return true;
}
