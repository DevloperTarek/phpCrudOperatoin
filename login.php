<?php 
    session_start();

    $max_faild_attempt = 5;
    $logout_duration_seconds = 60;

    $message = '';

    if($_SERVER['REQUEST_METHOD' === 'POST']){
        $username = $_POST['username'] ?? "";
        $password = $_POST['password'] ?? "";

        // Dami pass and user
        $corrUser = "admin";
        $corrPass = "password";

        // session checking
        if(!isset($_SESSION['failed_login_attempet'])){
            $_SESSION['failed_login_attempet'] = 0;
        }
        if(!isset($_SESSION['last_login_attemp_time'])){
            $_SESSION['last_login_attemp_time'] = 0;
        }

        //This time
        $current_time = time();

        if($_SESSION['failed_login_attempet'] >= $max_faild_attempt){
            $time_since_last_attempt = $current_time - $_SESSION['failed_login_attempet'];
            if($time_since_last_attempt < $logout_duration_seconds){
                $remaining_time = $logout_duration_seconds - $time_since_last_attempt;
                $message = "Again Wrong Trying! Please". $message ."seconds later try";
            }else{
                $_SESSION['failed_login_attempet'] = 0;
                $_SESSION['last_login_attemp_time'] = 0;
            }
        }

        //Login successs
        if(empty($message)){
            if($username === $corrUser && $password === $corrPass){
                $_SESSION['user-id'] = 1;
                $_SESSION['username'] = $username;
                $_SESSION['is_logged_in'] = true;

                // resate the option try to login
                $_SESSION['failed_login_attempet'] = 0;
                $_SESSION['last_login_attemp_time'] = 0;

                session_regenerate_id(true);

                header('location:dashboard.php');
                exit;
            }else{
                $_SESSION['failed_login_attempet']++;
                $_SESSION['last_loggined_time'] = $current_time;
                $message = "Your Useranme & Password are wrong";
            }
            if($_SESSION['failed_login_attempet'] >= $max_faild_attempt){
                $message = "Again Another Mistake" . "Please" . $logout_duration_seconds . "wait for this time";
            }
        }
    }
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ret limiting on Login Attempts</title>
    <!-- <link rel="stylesheet" href="./output.css" /> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .message {
            color: red;
            margin-bottom: 15px;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>লগইন করুন</h2>
        <?php if (!empty($message)): ?>
            <p class="message"><?php echo $message ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>