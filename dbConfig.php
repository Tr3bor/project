<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "ecom_user";
$dbPassword = "ecom_pass";
$dbName     = "db_ecom";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>