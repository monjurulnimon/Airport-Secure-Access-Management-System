<?php
session_start();

$_SESSION['contact'] = $_POST['contact'] ?? '';
$_SESSION['address'] = $_POST['address'] ?? '';
$_SESSION['city'] = $_POST['city'] ?? '';
$_SESSION['country'] = $_POST['country'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Visitor Registration – Step 3</title>
    <link rel="stylesheet" href="/Airport-Secure-Access-Management-System/employee/view/auth/styles/registration2.css">
</head>
<body>

<div class="container">

    <h2>Visitor Registration – Professional</h2>

    <div id="customAlert">
        <span id="alertMessage"></span>
    </div>

    <form 
        method="post" action="register_handler.php" onsubmit="return validateStep3();"
    >

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

        <div class="button-group">
            <button type="button" onclick="history.back()">Previous</button>
            <button type="submit">Register</button>
        </div>

    </form>
        <p>
        Already have an account?
        <a href="login.php">Login here</a>
    </p>

</div>

<script src="/Airport-Secure-Access-Management-System/employee/controller/auth/reg_controller3.js"></script>


</body>
</html>
