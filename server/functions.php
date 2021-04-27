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
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signin.phtml?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)){
            return $row;
        }else{
            return false;
        }

        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $email, $passwrd){
        $sql = "INSERT INTO usuarios (Correo, Password_Hashed, Rights) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signin.phtml?error=stmtfailed");
            exit();
        }

        $hashedPassword = password_hash($passwrd, PASSWORD_DEFAULT);

        $rights = "1";
        mysqli_stmt_bind_param($stmt, "sss", $email, $hashedPassword, $rights);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../Forms.phmtl");
        exit();
    }

    function emptyInputLogin($email, $passwrd){
        if (empty($email) or empty($passwrd)){
            return true;
        }else{
            return false;
        }
    }

    function answered($conn, $id){
        $sql = "SELECT * FROM encuesta WHERE ID_Usuario = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../login.phtml?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_fetch_assoc($result)){
            return true;
        }else{
            return false;
        }

        mysqli_stmt_close($stmt);
    }

    function loginUser($conn, $email, $passwrd){
        $userExist = userExists($conn, $email);

        if ($userExist == False){
            header("location: ../login.phmtl?error=wronglogin");
            exit();
        }

        $hash = $userExist["Password_Hashed"];
        $checkHash = password_verify($passwrd, $hash);

        if ($checkHash == False){
            header("location: ../login.phmtl?error=wronglogin");
            exit();
        } else if ($checkHash == True){
            session_start();
            $_SESSION["ID_Usuario"] = $userExist["ID_Usuario"];

            if (answered($conn, $userExist["ID_Usuario"])){
                header("location: ../charts.phtml");
                exit();
            } else{
                header("location: ../Forms.phtml");
                exit();
            }
        }
    }
?>