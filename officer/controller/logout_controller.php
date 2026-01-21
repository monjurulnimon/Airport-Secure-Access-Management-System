<?php
session_start();


session_unset();
session_destroy();


header("Location: ../../employee/view/auth/login.php");
exit;
