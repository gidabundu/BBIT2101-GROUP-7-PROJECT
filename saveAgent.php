<?php
include 'dbConnect.php';

$fullName = mysqli_real_escape_string($conDB, $_POST['fullName']);
$email = mysqli_real_escape_string($conDB, $_POST['email']);
$phone = mysqli_real_escape_string($conDB, $_POST['phone']);

$sqlInsert = "INSERT INTO agents(fullName,email,phone)
             VALUES('$fullName','$email','$phone')";

if (mysqli_query($conDB, $sqlInsert)) {
    echo "<script>alert('Agent Registered Successfully!'); window.location.href='viewAgents.php';</script>";
} else {
    echo "Error Adding Agent: " . mysqli_error($conDB);
}
mysqli_close($conDB);
?>