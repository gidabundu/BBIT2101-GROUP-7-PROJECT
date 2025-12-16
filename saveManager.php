<?php
include 'dbConnect.php';

$fullName = mysqli_real_escape_string($conDB, $_POST['fullName']);
$clubName = mysqli_real_escape_string($conDB, $_POST['clubName']);
$email = mysqli_real_escape_string($conDB, $_POST['email']);

$sql = "INSERT INTO club_manager (fullName, clubName, email)
        VALUES ('$fullName', '$clubName', '$email')";

if (mysqli_query($conDB, $sql)) {
    echo "<script>alert('Club Manager Registered Successfully!'); window.location.href='viewManagers.php';</script>";
} else {
    echo "Error: " . mysqli_error($conDB);
}
mysqli_close($conDB);
?>