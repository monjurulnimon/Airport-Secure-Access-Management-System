<?php
session_start();

$fullData = [
    'name' => $_SESSION['name'],
    'email' => $_SESSION['email'],
    'password' => $_SESSION['password'],
    'contact' => $_SESSION['contact'],
    'address' => $_SESSION['address'],
    'city' => $_SESSION['city'],
    'country' => $_SESSION['country'],
    'designation' => $_POST['designation'],
    'organization' => $_POST['organization'],
    'visitor_type' => $_POST['visitor_type']
];

// Insert into database here

session_destroy();

echo "Registration successful!";
