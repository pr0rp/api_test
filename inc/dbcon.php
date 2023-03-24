<?php
    
    
    $host = "localhost";
    $db_name = "apitest";
    $username = "root";
    $password = "";
   
    $conn = mysqli_connect($host, $username, $password, $db_name);

    if(!$conn){
        die("connect failed " . mysqli_connect_error());
    }
    

?>
