<?php
session_start();

/* Destroy officer session */
session_unset();
session_destroy();

/* Redirect to employee login page */
header("Location: ../../employee/view/auth/login.php");
exit;
