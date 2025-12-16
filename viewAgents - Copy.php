<?php
session_start();
include 'dbConnect.php';
// if (!isset($_SESSION['isLoggedIn'])) { header("Location: login.php"); exit(); } // Uncomment for security

$sql = "SELECT agentID, fullName, email, phone FROM agents ORDER BY agentID DESC";
$result = mysqli_query($conDB, $sql);
?>
<!DOCTYPE html>
<html>
<head><title>View Agents</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="view-container">
    <h2>Registered Agents</h2>
    <table border="1">
        <tr><th>ID</th><th>Full Name</th><th>Email</th><th>Phone</th><th>Action</th></tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['agentID']; ?></td>
            <td><?php echo htmlspecialchars($row['fullName']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['phone']); ?></td>
            <td>
                <a href="editAgent.php?id=<?php echo $row['agentID']; ?>">Edit</a> |
                <a href="deleteAgent.php?id=<?php echo $row['agentID']; ?>" onclick="return confirm('Are you sure you want to delete <?php echo addslashes($row['fullName']); ?>?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="dashboard.php" class="back-link">← Back to Dashboard</a>
</div>
</body>
</html>
<?php mysqli_close($conDB); ?>