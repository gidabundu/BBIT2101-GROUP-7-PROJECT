<?php
session_start();
include 'dbConnect.php';

// Security check
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: login.php");
    exit();
}

$agentID = mysqli_real_escape_string($conDB, $_POST['agentID']);
$fullName = mysqli_real_escape_string($conDB, $_POST['fullName']);
$email = mysqli_real_escape_string($conDB, $_POST['email']);
$phone = mysqli_real_escape_string($conDB, $_POST['phone']);

$sqlUpdate = "UPDATE agents SET 
              fullName = '$fullName', 
              email = '$email', 
              phone = '$phone' 
              WHERE agentID = $agentID";

if (mysqli_query($conDB, $sqlUpdate)) {
    echo "<script>alert('Agent Updated Successfully!'); window.location.href='viewAgents.php';</script>";
} else {
    echo "Error Updating Agent: " . mysqli_error($conDB);
}

mysqli_close($conDB);
?>