<?php
session_start();

/* --------------------
   LOGIN GUARD
-------------------- */
$isLoggedIn = $_SESSION["isLoggedIn"] ?? false;
if ($isLoggedIn) {
    header("Location: dashboard.php");
    exit;
}

/* --------------------
   SESSION ERRORS
-------------------- */
$emailErr = $_SESSION["emailErr"] ?? '';
$passErr  = $_SESSION["passwordErr"] ?? '';
$loginErr = $_SESSION["loginErr"] ?? '';
$previousValues = $_SESSION["previousValues"] ?? [];

/* --------------------
   CLEANUP
-------------------- */
unset($_SESSION["previousValues"]);
unset($_SESSION["loginErr"]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

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

        .login-box {
            width: 320px;
        }

        h2 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
        }

        input {
            padding: 6px;
            margin-top: 4px;
        }

        .error {
            font-size: 14px;
        }

        button {
            margin-top: 15px;
            padding: 6px;
        }

        p {
            text-align: center;
            margin-top: 12px;
        }
    </style>
</head>

<body>

<div class="login-box">

    <h2>Login</h2>

    <?php if ($loginErr): ?>
        <p class="error"><?php echo $loginErr; ?></p>
    <?php endif; ?>

    <form method="post" action="../../controller/login_controller.php">

        <label>Email</label>
        <input
            type="email"
            name="email"
            value="<?php echo ($previousValues['email'] ?? ''); ?>"
        >
        <?php if ($emailErr): ?>
            <span class="error"><?php echo $emailErr; ?></span>
        <?php endif; ?>

        <label>Password</label>
        <input type="password" name="password">
        <?php if ($passErr): ?>
            <span class="error"><?php echo $passErr; ?></span>
        <?php endif; ?>

        <button type="submit" name="login">Login</button>
    </form>

    <p>
        Don’t have an account?
        <a href="registration.php">Register here</a>
    </p>

</div>

</body>
</html>
