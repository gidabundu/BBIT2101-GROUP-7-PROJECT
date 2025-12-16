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

// Fetch current manager data
$sqlManager = "SELECT * FROM club_manager WHERE managerID = $managerID";
$resultManager = mysqli_query($conDB, $sqlManager);
$manager = mysqli_fetch_assoc($resultManager) ?? die("<script>alert('Manager not found.'); window.location.href='viewManagers.php';</script>");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Club Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-div">
    <h2>Edit Club Manager: <?php echo htmlspecialchars($manager['fullName']); ?></h2>

    <form action="updateManager.php" method="post">
        <input type="hidden" name="managerID" value="<?php echo $manager['managerID']; ?>">
        
        <label>Full Name:</label>
        <input type="text" name="fullName" value="<?php echo htmlspecialchars($manager['fullName']); ?>" required>

        <label>Club Name:</label>
        <input type="text" name="clubName" value="<?php echo htmlspecialchars($manager['clubName']); ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($manager['email']); ?>" required>

        <input type="submit" value="Update Manager">
    </form>
    <a href="viewManagers.php" class="back-link">← Cancel and Go Back</a>
</div>

</body>
</html>
<?php mysqli_close($conDB); ?>