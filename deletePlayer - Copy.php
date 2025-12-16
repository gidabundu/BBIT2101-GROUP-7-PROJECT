<?php
session_start();
include 'dbConnect.php';

// Security check
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: login.php");
    exit();
}

$playerID = $_GET['id'] ?? die("<script>alert('Player ID not specified.'); window.location.href='viewPlayers.php';</script>");
$playerID = mysqli_real_escape_string($conDB, $playerID);

$sqlDelete = "DELETE FROM players WHERE playerID = $playerID";

if (mysqli_query($conDB, $sqlDelete)) {
    echo "<script>alert('Player Deleted Successfully!'); window.location.href='viewPlayers.php';</script>";
} else {
    echo "Error Deleting Player: " . mysqli_error($conDB);
}

mysqli_close($conDB);
?>