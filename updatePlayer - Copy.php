<?php
session_start();
include 'dbConnect.php';

// Security check
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: login.php");
    exit();
}

$playerID = mysqli_real_escape_string($conDB, $_POST['playerID']);
$fullName = mysqli_real_escape_string($conDB, $_POST['fullName']);
$nationality = mysqli_real_escape_string($conDB, $_POST['nationality']);
$position = mysqli_real_escape_string($conDB, $_POST['position']);
$agentID = mysqli_real_escape_string($conDB, $_POST['agentID'] ?? NULL); 

// Handle optional Agent ID for the database
if (empty($agentID)) {
    $agentID_value = 'NULL';
} else {
    $agentID_value = "'$agentID'";
}

$sqlUpdate = "UPDATE players SET 
              fullName = '$fullName', 
              nationality = '$nationality', 
              position = '$position',
              agentID = $agentID_value
              WHERE playerID = $playerID";

if (mysqli_query($conDB, $sqlUpdate)) {
    echo "<script>alert('Player Updated Successfully!'); window.location.href='viewPlayers.php';</script>";
} else {
    echo "Error Updating Player: " . mysqli_error($conDB);
}

mysqli_close($conDB);
?>