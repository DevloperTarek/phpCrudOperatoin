<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="./output.css" />
</head>
<body>
    <div class="container">
        <h4 class="reg-here">Register Here</h4>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="enter name.." />
                <span class="error"></span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="enter Email.." />
                <span class="error"></span>
            </div>
            <div class="form-group">
                <label for="password">Email</label>
                <input type="password" name="password" id="password" placeholder="enter Paaword.." />
                <span class="error"></span>
            </div>
            <input type="submit" name="submit" value="Register Now" />
        </form>
        <!-- From validation Code -->
        <?php 
           $server_name = "localhost";
           $server_user = "root";
           $password_db = "";
           $my_db = "my_database";

           $conn = new mysqli($server_name,$server_user,$password_db,$my_db);

        //    checking server connect or not
        if($conn->connect_error){
            die("<div class='message error'> Connection Faild:". $conn->connect_error . "</div>");
        }

        // Show for message
        $message = "";

        // if this form are submitted
        if(isset($_POST['submit'])){
            $username = $conn->real_escape_string($_POST['username']);
            $email = $conn->real_escape_string($_POST['email']);
            $password = $_POST['password'];
            // Validation Checking
            if(empty($username) || empty($email) || empty($password)){
                $message = "<div class='message error'>All Field Are Required!</div>";
            }elseif(!filter_var($email.FILTER_VALIDATE_EMAIL)){
                $messege = "<div class='messege error'>Invalid Email Fromate</div>";
            }elseif(strlen($password) < 6 || strlen($password) >=9){
                $message = "<div class='message error'>Password Should Be equal to 8 or getter then 6</div>";
            }
        }
        ?>
    </div>
</body>
</html>


<?php 
   
?>