<?php 
   $host = "localhost";
   $username = "root";
   $password = "";
   $database = "testdb";

   $conn = new mysqli($host,$username,$password,$database);

   if($conn -> connect_errno){
       die("connection Failed" . $conn->connect_errno);
   }else{
        echo "Database Connection Successfully";
   }
?>