<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Select</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            background: #ffffff;
            padding: 40px;
            width: 380px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            text-align: center;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 14px;
            margin: 15px 0;
            border: none;
            border-radius: 10px;
            background: #00509e;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: 500;
        }
        .btn:hover { background: #003f80; }
        a { text-decoration: none; }
    </style>
</head>
<body>

<div class="container">
    <h2>Select Registration Type</h2>

    <a href="agentForm.php">
        <button class="btn">Register Agent</button>
    </a>

    <a href="playerForm.php">
        <button class="btn">Register Player</button>
    </a>

    <a href="managerForm.php">
        <button class="btn">Register Club Manager</button>
    </a>
    <a href="dashboard.php" style="color: #555; font-size: 14px;">Go to Dashboard</a>
</div>

</body>
</html>