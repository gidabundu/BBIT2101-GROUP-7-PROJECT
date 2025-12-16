<?php
session_start();
include 'dbConnect.php';

// Security check
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: login.php");
    exit();
}

$agentID = $_GET['id'] ?? die("<script>alert('Agent ID not specified.'); window.location.href='viewAgents.php';</script>");
$agentID = mysqli_real_escape_string($conDB, $agentID);

// Fetch current agent data
$sql = "SELECT * FROM agents WHERE agentID = $agentID";
$result = mysqli_query($conDB, $sql);
$agent = mysqli_fetch_assoc($result) ?? die("<script>alert('Agent not found.'); window.location.href='viewAgents.php';</script>");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Agent</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-div">
    <h2>Edit Agent: <?php echo htmlspecialchars($agent['fullName']); ?></h2>

    <form action="updateAgent.php" method="post">
        <input type="hidden" name="agentID" value="<?php echo $agent['agentID']; ?>">
        
        <label>Full Name:</label>
        <input type="text" name="fullName" value="<?php echo htmlspecialchars($agent['fullName']); ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($agent['email']); ?>" required>

        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($agent['phone']); ?>" required>

        <input type="submit" value="Update Agent">
    </form>
    <a href="viewAgents.php" class="back-link">← Cancel and Go Back</a>
</div>

</body>
</html>
<?php mysqli_close($conDB); ?>