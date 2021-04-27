<?php

    if (isset($_POST['submit'])){
        $email = $_POST["Correo"];
        $passwrd = $_POST["Contraseña"];
        $passwrdRep = $_POST["Confirmar-Contraseña"];

        include_once 'dbm.php';
        include_once 'functions.php';

        if (emptyInputSignup($email, $passwrd, $passwrdRep) != false){
            header("location: ../signin.phtml?error=emptyinput");
            exit();
        }

        if (invalidEmail($email) != false){
            header("location: ../signin.phtml?error=invalidemail");
            exit();
        }

        if (pwdMatch($passwrd, $passwrdRep) != false){
            header("location: ../signin.phtml?error=passwordsdontmatch");
            exit();
        }

        if (userExists($conn, $email) != false){
            header("location: ../signin.phtml?error=userexists");
            exit();
        }

        createUser($conn, $email, $passwrd);

    }else{
        header("location: ../signin.phtml")
        exit();
    }
?>