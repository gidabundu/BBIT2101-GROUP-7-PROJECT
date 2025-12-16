<?php
// Database credentials
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "football_agent_system";

// Connect to the database
$conDB = mysqli_connect($serverName, $userName, $password, $dbName);

// Check connection
if (!$conDB) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>