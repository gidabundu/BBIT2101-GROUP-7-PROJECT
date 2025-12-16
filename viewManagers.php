<?php
session_start();
include 'dbConnect.php';

// Security check
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT managerID, fullName, clubName, email FROM club_manager ORDER BY managerID DESC";
$result = mysqli_query($conDB, $sql);
?>
<!DOCTYPE html>
<html>
<head><title>View Club Managers</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="view-container">
    <h2>Registered Club Managers</h2>
    <table border="1">
        <tr><th>ID</th><th>Full Name</th><th>Club Name</th><th>Email</th><th>Action</th></tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['managerID']; ?></td>
            <td><?php echo htmlspecialchars($row['fullName']); ?></td>
            <td><?php echo htmlspecialchars($row['clubName']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td>
                <a href="editManager.php?id=<?php echo $row['managerID']; ?>">Edit</a> |
                <a href="deleteManager.php?id=<?php echo $row['managerID']; ?>" onclick="return confirm('Confirm deletion of <?php echo addslashes($row['fullName']); ?>?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="dashboard.php" class="back-link">← Back to Dashboard</a>
</div>
</body>
</html>
<?php mysqli_close($conDB); ?>