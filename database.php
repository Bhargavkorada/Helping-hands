<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "miniproject";

// Create a new MySQLi instance
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
