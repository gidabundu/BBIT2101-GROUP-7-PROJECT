<!DOCTYPE html>
<html>
<head>
    <title>Register Club Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-div">
    <h2>Register Club Manager</h2>

    <form action="saveManager.php" method="post">
        <label>Full Name:</label>
        <input type="text" name="fullName" required>

        <label>Club Name:</label>
        <input type="text" name="clubName" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <input type="submit" value="Save Manager">
    </form>
</div>

</body>
</html>