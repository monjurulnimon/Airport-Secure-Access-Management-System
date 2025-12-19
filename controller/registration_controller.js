let currentStep = 1;
const totalSteps = 3;

function showStep(step) {
    for (let i = 1; i <= totalSteps; i++) {
        document.getElementById('step-' + i).classList.remove('active');
        document.getElementById('indicator-' + i).classList.remove('active');
    }

    document.getElementById('step-' + step).classList.add('active');
    document.getElementById('indicator-' + step).classList.add('active');

    document.getElementById('submitBtn').style.display =
        step === totalSteps ? 'inline-block' : 'none';
}

function showAlert(message) {
    const alertBox = document.getElementById("customAlert");
    const alertMsg = document.getElementById("alertMessage");

    alertMsg.innerText = message;
    alertBox.style.display = "block";
}

function hideAlert() {
    document.getElementById("customAlert").style.display = "none";
}


function validateCurrentStep(step) {

    // ALWAYS hide old alert first
    hideAlert();

    if (step === 1) {
        const name = document.querySelector('[name="name"]').value.trim();
        const email = document.querySelector('[name="email"]').value.trim();
        const password = document.querySelector('[name="password"]').value;
        const confirm = document.querySelector('[name="confirm_password"]').value;

        if (!name || !email || !password || !confirm) {
            showAlert("All fields in Step 1 are required.");
            return false;
        }

        if (!email.includes("@")) {
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
    }

    if (step === 2) {
        const contact = document.querySelector('[name="contact"]').value.trim();
        const address = document.querySelector('[name="address"]').value.trim();

        if (!contact || !address) {
            showAlert("All fields in Step 2 are required.");
            return false;
        }
    }

    if (step === 3) {
        const designation = document.querySelector('[name="designation"]').value.trim();
        const visitorType = document.querySelector('[name="visitor_type"]').value;

        if (!designation || !visitorType) {
            showAlert("All fields in Step 3 are required.");
            return false;
        }
    }

    // ✅ THIS LINE FIXES YOUR PROBLEM
    hideAlert();
    return true;
}


function nextStep() {
    if (!validateCurrentStep(currentStep)) return;

    if (currentStep < totalSteps) {
        currentStep++;
        showStep(currentStep);
    }
}

function prevStep() {
    if (currentStep > 1) {
        currentStep--;
        showStep(currentStep);
    }
}
