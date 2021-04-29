<?php
    if (isset($_POST['submit'])){
        include_once 'dbm.php';
        include_once 'functions.php';
        
        aboutus($conn);
    }else{
        header("location: ../login.php");
        exit();
    }
?>