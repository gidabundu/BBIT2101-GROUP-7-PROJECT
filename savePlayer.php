<?php
include 'dbConnect.php';

$fullName = mysqli_real_escape_string($conDB, $_POST['fullName']);
$nationality = mysqli_real_escape_string($conDB, $_POST['nationality']);
$position = mysqli_real_escape_string($conDB, $_POST['position']);
$agentID = mysqli_real_escape_string($conDB, $_POST['agentID'] ?? NULL); // Handle optional Agent ID

// If agentID is empty, set it to NULL for the database
if (empty($agentID)) {
    $agentID = 'NULL';
} else {
    $agentID = "'$agentID'";
}

$sql = "INSERT INTO players (fullName, nationality, position, agentID)
        VALUES ('$fullName', '$nationality', '$position', $agentID)";

if (mysqli_query($conDB, $sql)) {
    echo "<script>alert('Player Registered Successfully!'); window.location.href='viewPlayers.php';</script>";
} else {
    echo "Error: " . mysqli_error($conDB);
}
mysqli_close($conDB);
?>