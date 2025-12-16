<?php
session_start();
include 'dbConnect.php';

// Security check
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: login.php");
    exit();
}

$agentID = $_GET['id'] ?? die("<script>alert('Agent ID not specified.'); window.location.href='viewAgents.php';</script>");
$agentID = mysqli_real_escape_string($conDB, $agentID);

// Delete query
$sqlDelete = "DELETE FROM agents WHERE agentID = $agentID";

if (mysqli_query($conDB, $sqlDelete)) {
    echo "<script>alert('Agent Deleted Successfully! Associated players were unassigned.'); window.location.href='viewAgents.php';</script>";
} else {
    echo "Error Deleting Agent: " . mysqli_error($conDB);
}

mysqli_close($conDB);
?>