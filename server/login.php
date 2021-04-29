<?php
    if (isset($_POST['submit'])){
        $email = $_POST["Correo"];
        $passwrd = $_POST["Contraseña"];
        if (isset($_POST["Recordar"])){
            $rememberme = true;
        }else{
            $rememberme = false;
        }

        include_once 'dbm.php';
        include_once 'functions.php';

        if (emptyInputLogin($email, $passwrd, $passwrdRep) != false){
            header("location: ../login.php?error=emptyinput");
            exit();
        }
        if (isset($_SESSION['ID_Usuario'])){
            logout();
        }
        loginUser($conn, $email, $passwrd, $rememberme);
    }else{
        header("location: ../login.php");
        exit();
    }
?>