<?php
$serverName = "localhost";
$userName = "root";
$password = "";

// CONNECT TO MYSQL SERVER (without a database name initially)
$conDB = mysqli_connect($serverName, $userName, $password);
if (!$conDB) {
    die("Connection Error: " . mysqli_connect_error());
}

// 1. CREATE DATABASE football_agent_system
$dbForm = "CREATE DATABASE IF NOT EXISTS football_agent_system";
if (mysqli_query($conDB, $dbForm)) {
    echo "Database Created Successfully<br>";
} else {
    echo "Error Creating the Database: " . mysqli_error($conDB);
}

mysqli_close($conDB);

// 2. RECONNECT WITH DATABASE
$conDB = mysqli_connect($serverName, $userName, $password, "football_agent_system");

// 3. CREATE **ADMIN** TABLE
$adminTable = "
CREATE TABLE IF NOT EXISTS admin (
    adminID INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(50),
    email VARCHAR(50),
    -- NOTE: In a production app, use password_hash() and VARBINARY(255) for security.
    password VARCHAR(100) 
)";
mysqli_query($conDB, $adminTable);

// 4. CREATE **AGENT** TABLE
$agentTable = "
CREATE TABLE IF NOT EXISTS agents (
    agentID INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(50),
    email VARCHAR(50),
    phone VARCHAR(20)
)";
mysqli_query($conDB, $agentTable);

// 5. CREATE **PLAYER** TABLE
$playerTable = "
CREATE TABLE IF NOT EXISTS players (
    playerID INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(50),
    nationality VARCHAR(50),
    position VARCHAR(30),
    agentID INT NULL, 
    FOREIGN KEY (agentID) REFERENCES agents(agentID) ON DELETE SET NULL
)";
mysqli_query($conDB, $playerTable);

// 6. CREATE **CLUB MANAGER** TABLE
$clubManagerTable = "
CREATE TABLE IF NOT EXISTS club_manager (
    managerID INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(50),
    clubName VARCHAR(50),
    email VARCHAR(50)
)";
mysqli_query($conDB, $clubManagerTable);

// 7. INSERT SAMPLE DATA
// Insert Admin (Default Credentials: admin@fas.com / 12345)
mysqli_query($conDB, "INSERT IGNORE INTO admin(adminID, fullName, email, password) VALUES
(1, 'System Admin','admin@fas.com','12345')");

// Insert Agents
mysqli_query($conDB, "INSERT IGNORE INTO agents(agentID, fullName, email, phone) VALUES
(1,'James Cole','jcole@agent.com','+232888000'),
(2,'Mark Benson','mbenson@agent.com','+232773300')");

// Insert Players
mysqli_query($conDB, "INSERT IGNORE INTO players(playerID, fullName, nationality, position, agentID) VALUES
(1,'John Kamara','Sierra Leone','Midfielder',1),
(2,'Samuel Conteh','Sierra Leone','Striker',2)");

// Insert Club Managers
mysqli_query($conDB, "INSERT IGNORE INTO club_manager(managerID, fullName, clubName, email) VALUES
(1,'Peter Johnson','Leone Stars FC','peter@leonestars.com'),
(2,'Alex Bryan','Kallon FC','alex@kallonfc.com')");

echo "Tables & Sample Data Created Successfully.";
mysqli_close($conDB);
?>