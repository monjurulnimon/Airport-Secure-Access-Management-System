<?php
session_start();

$_SESSION['name'] = $_POST['name'] ?? '';
$_SESSION['email'] = $_POST['email'] ?? '';
$_SESSION['password'] = $_POST['password'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Visitor Registration – Step 2</title>
    <link rel="stylesheet" href="/Airport-Secure-Access-Management-System/employee/view/auth/styles/registration2.css">
</head>
<body>

<div class="container">

    <h2>Visitor Registration – Contact</h2>

    <div id="customAlert">
        <span id="alertMessage"></span>
    </div>

    <form 
        action="registration3.php" 
        method="post"
        onsubmit="return validateStep2();" 
        novalidate
    >

        <label>Contact Number</label>
        <input type="tel" name="contact">

        <label>Address</label>
        <input type="text" name="address">

        <label>City</label>
        <input type="text" name="city">

        <label>Country</label>
        <input type="text" name="country">

        <div class="button-group">
            <button type="button" onclick="history.back()">Previous</button>
            <button type="submit">Next</button>
        </div>

    </form>
        <p>
        Already have an account?
        <a href="login.php">Login here</a>
    </p>

</div>

<script src="/Airport-Secure-Access-Management-System/employee/controller/auth/reg_controller2.js"></script>

</body>
</html>
