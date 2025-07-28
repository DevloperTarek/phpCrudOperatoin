<?php 
   $host = "localhost";
   $username = "root";
   $password = "";
   $database = "testdb";

   $conn = new mysqli($host,$username,$password,$database);

   if($conn->connect_errno){
        die("Connection Failed" . $conn->connect_errno);
   }else{
        echo "Db Connection Successfully";
   }


   $sql = "INSERT INTO testdb (name, email) VALUES ('Tarek','devlopertarek433@gmail.com')";
   if($conn->query($sql) === true){
        echo "New Record inserted Successfully";
   }else{
        echo "Error: ".$conn->error;
   }
?>