<?php
    $serverName = 'localhost';
    $dbName = 'covianalyst';
    $dbUser = 'root';
    $dbPswrd = '';

    $conn = mysqli_connect($serverName, $dbUser, $dbPswrd, $dbName);

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
?>