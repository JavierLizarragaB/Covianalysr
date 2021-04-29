<?php 
    if (isset($_POST['submit'])){
        include_once 'functions.php';
        logout();

        header("location: ../login.php");
        exit();
    }else{
        header("location: ../login.php");
        exit();
    }
?>