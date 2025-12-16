<?php
session_start();
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        .dashboard-container {
            width: 80%;
            max-width: 1000px;
            margin: 50px auto;
            background: #fff;
            padding: 40px;
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }
        .dashboard-container h1 { color: #000814; text-align: center; margin-bottom: 30px; }
        .dashboard-links { display: flex; justify-content: space-around; flex-wrap: wrap; gap: 20px; }
        .dashboard-link a {
            display: block; background: #001d3d; color: white; padding: 20px;
            text-align: center; text-decoration: none; border-radius: 8px;
            font-size: 18px; font-weight: bold; transition: background 0.3s;
            min-width: 250px;
        }
        .dashboard-link a:hover { background: #003f80; }
        .logout { margin-top: 30px; text-align: center; }
        .logout a {
            color: #e63946; text-decoration: none; font-weight: bold; padding: 10px 20px;
            border: 2px solid #e63946; border-radius: 6px; transition: background 0.3s, color 0.3s;
        }
        .logout a:hover { background: #e63946; color: white; }
    </style>
</head>
<body>

<div class="dashboard-container">
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['fullName']); ?>!</h1>
    <p style="text-align: center; margin-bottom: 40px;">Use the links below to manage the Football Agent System data.</p>
    
    <div class="dashboard-links">
        <div class="dashboard-link"><a href="viewAgents.php">👤 Manage Agents</a></div>
        <div class="dashboard-link"><a href="viewPlayers.php">⚽ Manage Players</a></div>
        <div class="dashboard-link"><a href="viewManagers.php">🏟️ Manage Club Managers</a></div>
        <div class="dashboard-link"><a href="index.php">➕ Register New Entities</a></div>
    </div>

    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>
</div>

</body>
</html>