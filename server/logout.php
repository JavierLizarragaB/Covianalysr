<?php 
    if (isset($_POST['submit'])){
        include_once 'functions.php';
        logout();

        header("location: ../index.php");
        exit();
    }else{
        header("location: ../login.php");
        exit();
    }
?>