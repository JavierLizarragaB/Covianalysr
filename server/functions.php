<?php
    function emptyInputSignup($email, $passwrd, $passwrdRep){
        if (empty($email) or empty($passwrd) or empty($passwrdRep)){
            return true;
        }else{
            return false;
        }
    }

    function invalidEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }

    function pwdMatch($passwrd, $passwrdRep){
        if ($passwrd !== $passwrdRep){
            return true;
        }else{
            return false;
        }
    }

    function userExists($conn, $email){
        $sql = "SELECT * FROM usuarios WHERE Correo = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysql_stmt_prepare($stmt, $sql)){
            header("location: ../signin.phtml?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }else{
            return false;
        }

        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $email, $passwrd){
        $sql = "INSERT INTO usuarios (Correo, Password_Hashed, Rights) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysql_stmt_prepare($stmt, $sql)){
            header("location: ../signin.phtml?error=stmtfailed");
            exit();
        }

        $hashedPassword = password_hash($passwrd, PASSWORD_DEFAULT);

        $rights = "1"
        mysqli_stmt_bind_param($stmt, "sss", $email, $hashedPassword, $rights);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../Forms.phmtl");
        exit();
    }
?>