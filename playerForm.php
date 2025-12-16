<?php
include 'dbConnect.php';
// Fetch agents to populate the dropdown
$agentsQuery = mysqli_query($conDB, "SELECT agentID, fullName FROM agents");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Player</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-div">
    <h2>Register Player</h2>

    <form action="savePlayer.php" method="post">
        <label>Full Name:</label>
        <input type="text" name="fullName" required>

        <label>Nationality:</label>
        <input type="text" name="nationality" required>

        <label>Position:</label>
        <input type="text" name="position" required>

        <label>Agent:</label>
        <select name="agentID">
            <option value="">-- Select Agent (Optional) --</option>
            <?php while($agent = mysqli_fetch_assoc($agentsQuery)): ?>
                <option value="<?php echo $agent['agentID']; ?>"><?php echo htmlspecialchars($agent['fullName']); ?></option>
            <?php endwhile; ?>
        </select>

        <input type="submit" value="Save Player">
    </form>
</div>

</body>
</html>
<?php mysqli_close($conDB); ?>