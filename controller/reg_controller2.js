console.log("reg_controller2.js loaded");

function showAlert(message) {
    const alertBox = document.getElementById("customAlert");
    const alertMsg = document.getElementById("alertMessage");

    alertMsg.innerText = message;
    alertBox.style.display = "block";
}

function hideAlert() {
    const alertBox = document.getElementById("customAlert");
    if (alertBox) {
        alertBox.style.display = "none";
    }
}

function validateStep2() {
    hideAlert();

    const contact = document.querySelector('[name="contact"]').value.trim();
    const address = document.querySelector('[name="address"]').value.trim();
    const city = document.querySelector('[name="city"]').value.trim();
    const country = document.querySelector('[name="country"]').value.trim();

    if (!contact) {
        showAlert("Contact number is required.");
        return false;
    }
    else if (!address) {
        showAlert("Address is required.");
        return false;
    }

    else if (!city) {
        showAlert("City is required.");
        return false;
    }

    else if (!country) {
        showAlert("Country is required.");
        return false;
    }

    // Store data for later use (optional but correct)
    sessionStorage.setItem("contact", contact);
    sessionStorage.setItem("address", address);
    sessionStorage.setItem("city", city);
    sessionStorage.setItem("country", country);

    return true;
}
