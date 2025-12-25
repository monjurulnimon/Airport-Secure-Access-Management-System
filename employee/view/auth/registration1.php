<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Visitor Registration – Step 1</title>
    <link rel="stylesheet" href="/Airport-Secure-Access-Management-System/employee/view/auth/styles/registration1.css">
</head>
<body>

<div class="container">

    <h2>Visitor Registration – Basic</h2>

    <div id="customAlert">
        <span id="alertMessage"></span>
    </div>

    <form action="registration2.php" method="post" onsubmit="return validateStep1();" >

        <label>Full Name</label>
        <input type="text" name="name">

        <label>Email</label>
        <input type="text" name="email">

        <label>Password</label>
        <input type="password" name="password">

        <label>Confirm Password</label>
        <input type="password" name="confirm_password">

        <button type="submit">Next</button>

    </form>
    <p>
        Already have an account?
        <a href="login.php">Login here</a>
    </p>
</div>

<script src="/Airport-Secure-Access-Management-System/employee/controller/auth/reg_controller1.js"></script>

</body>
</html>
