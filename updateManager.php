<?php
session_start();
include 'dbConnect.php';

// Security check
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: login.php");
    exit();
}

$managerID = mysqli_real_escape_string($conDB, $_POST['managerID']);
$fullName = mysqli_real_escape_string($conDB, $_POST['fullName']);
$clubName = mysqli_real_escape_string($conDB, $_POST['clubName']);
$email = mysqli_real_escape_string($conDB, $_POST['email']);

$sqlUpdate = "UPDATE club_manager SET 
              fullName = '$fullName', 
              clubName = '$clubName', 
              email = '$email' 
              WHERE managerID = $managerID";

if (mysqli_query($conDB, $sqlUpdate)) {
    echo "<script>alert('Club Manager Updated Successfully!'); window.location.href='viewManagers.php';</script>";
} else {
    echo "Error Updating Manager: " . mysqli_error($conDB);
}

mysqli_close($conDB);
?>