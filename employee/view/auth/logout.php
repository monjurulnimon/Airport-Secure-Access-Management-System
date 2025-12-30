<?php
session_start();

/* Clear session */
$_SESSION = [];
session_destroy();

/* Prevent cache */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

/* Redirect to login (same auth folder) */
header("Location: login.php");
exit;
