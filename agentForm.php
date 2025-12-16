<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Agent</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-div">
    <h2>Register Agent</h2>
    <form action="saveAgent.php" method="post">
        <label>Full Name:</label>
        <input type="text" name="fullName" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Phone:</label>
        <input type="text" name="phone" required>

        <input type="submit" value="Register Agent">
    </form>
</div>

</body>
</html>