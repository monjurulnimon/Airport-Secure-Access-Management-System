<?php
$servername = "localhost";
$username = "root";
$password = "";  // XAMPP default empty password
$dbname = "asams";  // <-- database name

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>




<?php
$conn = mysqli_connect("localhost", "root", "", "asams");

if (!$conn) {
    die("Database connection failed");
}
