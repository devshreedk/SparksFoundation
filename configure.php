<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bank";

    $conn = mysqli_connect($servername, $username, $password, $database);


    if(!$conn){
        die("Unable to connect to the database" .mysqli_connect_error());
    }
    
?>