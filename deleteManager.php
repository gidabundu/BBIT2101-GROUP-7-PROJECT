<?php
session_start();
include 'dbConnect.php';

// Security check
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: login.php");
    exit();
}

$managerID = $_GET['id'] ?? die("<script>alert('Manager ID not specified.'); window.location.href='viewManagers.php';</script>");
$managerID = mysqli_real_escape_string($conDB, $managerID);

$sqlDelete = "DELETE FROM club_manager WHERE managerID = $managerID";

if (mysqli_query($conDB, $sqlDelete)) {
    echo "<script>alert('Club Manager Deleted Successfully!'); window.location.href='viewManagers.php';</script>";
} else {
    echo "Error Deleting Club Manager: " . mysqli_error($conDB);
}

mysqli_close($conDB);
?>