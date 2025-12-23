let currentStep = 1;
const totalSteps = 3;

function showStep(step) {
    // Update step displays
    for (let i = 1; i <= totalSteps; i++) {
        document.getElementById('step-' + i).classList.remove('active');
        document.getElementById('indicator-' + i).classList.remove('active');
    }

    document.getElementById('step-' + step).classList.add('active');
    document.getElementById('indicator-' + step).classList.add('active');

    // Update button visibility
    updateButtons(step);
}

function updateButtons(step) {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');

    console.log('Current step:', step); // Debug log
    console.log('Buttons found:', prevBtn, nextBtn, submitBtn); // Debug log

    // Step 1: Hide Previous, Show Next, Hide Submit
    if (step === 1) {
        document.getElementById("prevBtn").remove();
        if (prevBtn) prevBtn.style.display = 'none';
        if (nextBtn) nextBtn.style.display = 'inline-block';
        if (submitBtn) submitBtn.style.display = 'none';
    }
    // Step 2: Show Previous, Show Next, Hide Submit
    else if (step === 2) {
        if (prevBtn) prevBtn.style.display = 'inline-block';
        if (nextBtn) nextBtn.style.display = 'inline-block';
        if (submitBtn) submitBtn.style.display = 'none';
    }
    // Step 3: Show Previous, Hide Next, Show Submit
    else if (step === 3) {
        if (prevBtn) prevBtn.style.display = 'inline-block';
        if (nextBtn) nextBtn.style.display = 'none';
        if (submitBtn) submitBtn.style.display = 'inline-block';
    }
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

// Initialize on page load
window.addEventListener('DOMContentLoaded', function() {
    console.log('Page loaded, initializing...'); // Debug log
    showStep(1);
});