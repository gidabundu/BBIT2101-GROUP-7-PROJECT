<?php
session_start();
include 'dbConnect.php';

// Security check
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: login.php");
    exit();
}

// Join agents table to display agent name instead of just ID
$sql = "SELECT p.playerID, p.fullName, p.nationality, p.position, a.fullName AS agentName 
        FROM players p
        LEFT JOIN agents a ON p.agentID = a.agentID
        ORDER BY p.playerID DESC";
$result = mysqli_query($conDB, $sql);
?>
<!DOCTYPE html>
<html>
<head><title>View Players</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="view-container">
    <h2>Managed Players</h2>
    <table border="1">
        <tr><th>ID</th><th>Full Name</th><th>Nationality</th><th>Position</th><th>Agent</th><th>Action</th></tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['playerID']; ?></td>
            <td><?php echo htmlspecialchars($row['fullName']); ?></td>
            <td><?php echo htmlspecialchars($row['nationality']); ?></td>
            <td><?php echo htmlspecialchars($row['position']); ?></td>
            <td><?php echo htmlspecialchars($row['agentName'] ?? 'N/A'); ?></td>
            <td>
                <a href="editPlayer.php?id=<?php echo $row['playerID']; ?>">Edit</a> |
                <a href="deletePlayer.php?id=<?php echo $row['playerID']; ?>" onclick="return confirm('Confirm deletion of <?php echo addslashes($row['fullName']); ?>?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="dashboard.php" class="back-link">← Back to Dashboard</a>
</div>
</body>
</html>
<?php mysqli_close($conDB); ?>