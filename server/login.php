<?php
    if (isset($_POST['submit'])){
        $email = $_POST["Correo"];
        $passwrd = $_POST["Contraseña"];

        include_once 'dbm.php';
        include_once 'functions.php';

        if (emptyInputLogin($email, $passwrd, $passwrdRep) != false){
            header("location: ../login.php?error=emptyinput");
            exit();
        }

        loginUser($conn, $email, $passwrd);
    }else{
        header("location: ../login.php");
        exit();
    }
?>