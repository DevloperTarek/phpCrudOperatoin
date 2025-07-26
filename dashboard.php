
<?php
    session_start();
    // Checking the Login Issue
    if(!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in' !== true]){
        header('location: login.php');
        exit;
    }

    $username = $_SESSION['username'] ?? "this is username";
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 100vh; background-color: #f4f4f4; }
        .container { background-color: #fff; padding: 30px; width: 1000px; height: 370px; display: flex; align-items: center; justify-content: center; flex-direction: column; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center; }
        h2 { color: #333; }
        p { color: #555; }
        .logout-btn { background-color: #dc3545; color: white; padding: 7px 15px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; margin-top: 20px; }
        .logout-btn:hover { background-color: #c82333; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Dashboard</h2>
        <p>Congratulatoin, **!</p>
        <!-- <p>Congratulatoin, **<?php echo htmlspecialchars($username); ?>**!</p> -->
        <p>This Is Your Dashboard Here</p>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>