<!DOCTYPE html>
<html>
<head>
    <title>Visitor Registration</title>

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-box {
            width: 380px;
        }

        h2 {
            text-align: center;
        }

        .steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .step-indicator {
            flex: 1;
            text-align: center;
        }

        .step-indicator.active {
            font-weight: bold;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        label {
            margin-bottom: 4px;
        }

        input, select {
            padding: 6px;
            margin-bottom: 12px;
            width: 100%;
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        button {
            padding: 6px 12px;
        }

        p {
            text-align: center;
            margin-top: 12px;
        }
    </style>
</head>

<body>

<div class="register-box">

    <h2>Visitor Registration</h2>

    <!-- STEP INDICATOR -->
    <div class="steps">
        <div class="step-indicator active" id="indicator-1">Basic</div>
        <div class="step-indicator" id="indicator-2">Contact</div>
        <div class="step-indicator" id="indicator-3">Professional</div>
    </div>
    <div id="customAlert" style="display:none; margin-bottom:12px;">
    <span id="alertMessage"></span>
</div>

    <form method="post" action="login.php" onsubmit="return validateCurrentStep(3);">

        <!-- STEP 1 -->
        <div class="step active" id="step-1">
            <label>Full Name</label>
            <input type="text" name="name">

            <label>Email</label>
            <input type="email" name="email">

            <label>Password</label>
            <input type="password" name="password">

            <label>Confirm Password</label>
            <input type="password" name="confirm_password">
        </div>

        <!-- STEP 2 -->
        <div class="step" id="step-2">
            <label>Contact Number</label>
            <input type="tel" name="contact">

            <label>Address</label>
            <input type="text" name="address">

            <label>City</label>
            <input type="text" name="city">

            <label>Country</label>
            <input type="text" name="country">
        </div>

        <!-- STEP 3 -->
        <div class="step" id="step-3">
            <label>Designation</label>
            <input type="text" name="designation">

            <label>Organization</label>
            <input type="text" name="organization">

            <label>Visitor Type</label>
            <select name="visitor_type">
                <option value="">Select</option>
                <option value="contractor">Contractor</option>
                <option value="vendor">Vendor</option>
                <option value="guest">Guest</option>
            </select>
        </div>

        <!-- NAVIGATION -->
        <div class="navigation">
            <button type="button" onclick="prevStep()">Previous</button>

            <button type="button" id="nextBtn" onclick="nextStep()">Next</button>

            <button type="submit" id="submitBtn" style="display:none;">Register</button>

        </div>

    </form>

    <p>
        Already have an account?
        <a href="login.php">Login</a>
    </p>

</div>



<!-- LOAD EXTERNAL JS -->
<script src="/ASAMS/controller/registration_controller.js"></script>

</body>
</html>
