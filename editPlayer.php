<?php
session_start();
include 'dbConnect.php';

// Security check
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: login.php");
    exit();
}

$playerID = $_GET['id'] ?? die("<script>alert('Player ID not specified.'); window.location.href='viewPlayers.php';</script>");
$playerID = mysqli_real_escape_string($conDB, $playerID);

// 1. Fetch current player data
$sqlPlayer = "SELECT * FROM players WHERE playerID = $playerID";
$resultPlayer = mysqli_query($conDB, $sqlPlayer);
$player = mysqli_fetch_assoc($resultPlayer) ?? die("<script>alert('Player not found.'); window.location.href='viewPlayers.php';</script>");

// 2. Fetch all agents for the dropdown
$agentsQuery = mysqli_query($conDB, "SELECT agentID, fullName FROM agents");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Player</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-div">
    <h2>Edit Player: <?php echo htmlspecialchars($player['fullName']); ?></h2>

    <form action="updatePlayer.php" method="post">
        <input type="hidden" name="playerID" value="<?php echo $player['playerID']; ?>">
        
        <label>Full Name:</label>
        <input type="text" name="fullName" value="<?php echo htmlspecialchars($player['fullName']); ?>" required>

        <label>Nationality:</label>
        <input type="text" name="nationality" value="<?php echo htmlspecialchars($player['nationality']); ?>" required>

        <label>Position:</label>
        <input type="text" name="position" value="<?php echo htmlspecialchars($player['position']); ?>" required>

        <label>Agent:</label>
        <select name="agentID">
            <option value="">-- Select Agent (Optional) --</option>
            <?php while($agent = mysqli_fetch_assoc($agentsQuery)): ?>
                <option value="<?php echo $agent['agentID']; ?>" 
                    <?php echo ($agent['agentID'] == $player['agentID']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($agent['fullName']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <input type="submit" value="Update Player">
    </form>
    <a href="viewPlayers.php" class="back-link">← Cancel and Go Back</a>
</div>

</body>
</html>
<?php mysqli_close($conDB); ?>