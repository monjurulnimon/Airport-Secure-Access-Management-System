<?php
session_start();

$isLoggedIn = $_SESSION["isLoggedIn"] ?? false;
if ($isLoggedIn) {
    header("Location: dashboard.php");
    exit;
}

$emailErr = $_SESSION["emailErr"] ?? '';
$passErr  = $_SESSION["passwordErr"] ?? '';
$loginErr = $_SESSION["loginErr"] ?? '';
$previousValues = $_SESSION["previousValues"] ?? [];

unset($_SESSION["emailErr"]);
unset($_SESSION["passwordErr"]);
unset($_SESSION["loginErr"]);
unset($_SESSION["previousValues"]);

function showError($error) {
    if (!empty($error)) {
        echo "<span class='error'>$error</span>";
    }
}
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
            color: red;
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

    <?php showError($loginErr); ?>

    <form method="post" action="../../controller/login_controller.php">

        <label>Email</label>
        <input type="email" name="email"
               value="<?php echo htmlspecialchars($previousValues['email'] ?? ''); ?>">
        <?php showError($emailErr); ?>

        <label>Password</label>
        <input type="password" name="password">
        <?php showError($passErr); ?>

        <button type="submit" name="login">Login</button>
    </form>

    <p>
        Don’t have an account?
        <a href="registration1.php">Register here</a>
    </p>

</div>

</body>
</html>
