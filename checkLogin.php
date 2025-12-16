<?php
session_start();
include 'dbConnect.php';

$email = mysqli_real_escape_string($conDB, $_POST['email'] ?? '');
$password = mysqli_real_escape_string($conDB, $_POST['password'] ?? '');

// **WARNING**: Using mysqli_real_escape_string offers minimal protection. 
// For real security, use prepared statements and password hashing (e.g., password_verify).

$sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conDB, $sql);

if (mysqli_num_rows($result) == 1) {
    // Login successful
    $admin = mysqli_fetch_assoc($result);
    $_SESSION['adminID'] = $admin['adminID'];
    $_SESSION['fullName'] = $admin['fullName'];
    $_SESSION['isLoggedIn'] = true;
    
    header("Location: dashboard.php");
    exit();
} else {
    // Login failed
    echo "<script>alert('Login Failed. Invalid Email or Password.'); window.location.href='login.php';</script>";
}

mysqli_close($conDB);
?>