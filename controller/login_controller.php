<?php
session_start();

$email    = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";

$errors = [];
$values = [];

/* --------------------
   VALIDATION
-------------------- */

if (empty($email)) {
    $errors["email"] = "Email field is required";
}

if (empty($password)) {
    $errors["password"] = "Password field is required";
}

/* --------------------
   ERROR HANDLING
-------------------- */

if (count($errors) > 0) {

    if (isset($errors["email"])) {
        $_SESSION["emailErr"] = $errors["email"];
    } else {
        unset($_SESSION["emailErr"]);
    }

    if (isset($errors["password"])) {
        $_SESSION["passwordErr"] = $errors["password"];
    } else {
        unset($_SESSION["passwordErr"]);
    }

    // Preserve previous values
    $values["email"] = $email;
    $_SESSION["previousValues"] = $values;

    header("Location: ../admin/dashboard.php");
    exit;
}
else {
    //header("Location: ../view/admin/dashboard.php");
        header("Location: ../view/employee/temporary-access-request.php");

}

/* --------------------
   TEMP AUTH CHECK
-------------------- 

$data = [
    "email"    => "test@test.com",
    "password" => "password"
];

if ($email === $data["email"] && $password === $data["password"]) {

    $_SESSION["email"] = $data["email"];
    $_SESSION["isLoggedIn"] = true;

    header("Location: ../View/dashboard.php");
    exit;

} else {

    $_SESSION["loginErr"] = "Email or password is incorrect";

    unset($_SESSION["emailErr"]);
    unset($_SESSION["passwordErr"]);

    header("Location: ../View/login.php");
    exit;
}
*/