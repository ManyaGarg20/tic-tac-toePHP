<?php
	// Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password ,"tictactoe");
    
    if(!$conn){
        die("sorry connection failed");
    }

 
?>