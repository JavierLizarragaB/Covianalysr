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
            header("location: ../signin.php?error=stmtfailed");
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
            header("location: ../signin.php?error=stmtfailed");
            exit();
        }

        $hashedPassword = password_hash($passwrd, PASSWORD_DEFAULT);

        $rights = "1";
        mysqli_stmt_bind_param($stmt, "sss", $email, $hashedPassword, $rights);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $userExist = userExists($conn, $email);
        session_start();
        $_SESSION["ID_Usuario"] = $userExist["ID_Usuario"];
        header("location: ../Forms.php");
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
            header("location: ../login.php?error=stmtfailed");
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
            header("location: ../login.php?error=wronglogin");
            exit();
        }

        $hash = $userExist["Password_Hashed"];
        $checkHash = password_verify($passwrd, $hash);

        if ($checkHash == False){
            header("location: ../login.php?error=wronglogin");
            exit();
        } else if ($checkHash == True){
            session_start();
            $_SESSION["ID_Usuario"] = $userExist["ID_Usuario"];

            if (answered($conn, $userExist["ID_Usuario"])){
                header("location: ../charts.php");
                exit();
            } else{
                header("location: ../Forms.php");
                exit();
            }
        }
    }

    function personalFormResponse($conn, $id, $edad, $ingreso, $estudios, $localidad, $est_civil, $genero, $ocupacion){
        $sql = "INSERT INTO datos_personales (ID_Usuario, Edad, Ingresos, Estudios, Localidad, Estado_Civil, Genero, Ocupacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../form.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssssssss", $id, $edad, $ingreso, $estudios, $localidad, $est_civil, $genero, $ocupacion);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    function formResponse($conn, $pregunta, $preguntaId, $id){
        $sql = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../form.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sss", $id, $preguntaId, $pregunta);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    function endForm(){
        header("location: ../charts.php");
        exit();
    }

    function logout(){
        session_start();
        session_unset();
        session_destroy();
    }

    function aboutus($conn){
        session_start();
        if(!isset($_SESSION["ID_Usuario"])){
            header("location: ../index.php");
            exit();
        } else if (answered($conn, $_SESSION["ID_Usuario"])){
            header("location: ../charts.php");
            exit();
        } else {
            header("location: ../Forms.php");
            exit();
        }
    }
?>