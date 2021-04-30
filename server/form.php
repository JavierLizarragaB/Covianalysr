<?php
    if (isset($_POST['submit'])){

        include_once 'dbm.php';
        include_once 'functions.php';
        session_start();
        if(!isset($_SESSION["ID_Usuario"])){
            header("location: ../login.php");
            exit();
        }else if(isset($_SESSION['LAST_ACTIVITY'])){
            if((time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
                logout();
    
                header("location: ../login.php?error=tiempofuera");
                exit();
            }else{
                $_SESSION['LAST_ACTIVITY'] = time();
            }
        }
        $id=$_SESSION["ID_Usuario"];

        $genero = $_POST["pregunta1"];
        $edad = $_POST["pregunta2"];
        $est_civil = $_POST["pregunta3"];
        $estudios = $_POST["pregunta4"];
        $ocupacion = $_POST["pregunta5"];
        $ingreso = $_POST["pregunta6"];
        $localidad = $_POST["pregunta7"];
        personalFormResponse($conn, $id, $edad, $ingreso, $estudios, $localidad, $est_civil, $genero, $ocupacion);
    
        $pregunta2_1 = $_POST["2-pregunta1"];
        formResponse($conn, $pregunta2_1, "2-1", $id);
        foreach( $_POST["2-pregunta2"] as $pregunta2_2){
            formResponse($conn, $pregunta2_2, "2-2", $id);
        }
        foreach( $_POST["2-pregunta3"] as $pregunta2_3){
            formResponse($conn, $pregunta2_3, "2-3", $id);
        }
        foreach( $_POST["2-pregunta4"] as $pregunta2_4){
            formResponse($conn, $pregunta2_4, "2-4", $id);
        }
        $pregunta2_5 = $_POST["2-pregunta5"];
        formResponse($conn, $pregunta2_5, "2-5", $id);
    
        $pregunta3_1 = $_POST["3-pregunta1"];
        formResponse($conn, $pregunta3_1, "3-1", $id);
        foreach( $_POST["3-pregunta2"] as $pregunta3_2){
            formResponse($conn, $pregunta3_2, "3-2", $id);
        }
        foreach( $_POST["3-pregunta3"] as $pregunta3_3){
            formResponse($conn, $pregunta3_3, "3-3", $id);
        }
        foreach( $_POST["3-pregunta4"] as $pregunta3_4){
            formResponse($conn, $pregunta3_4, "3-4", $id);
        }
        $pregunta3_5 = $_POST["3-pregunta5"];
        formResponse($conn, $pregunta3_5, "3-5", $id);
        $pregunta3_6 = $_POST["3-pregunta6"];
        formResponse($conn, $pregunta3_6, "3-6", $id);
        $pregunta3_7 = $_POST["3-pregunta7"];
        formResponse($conn, $pregunta3_7, "3-7", $id);
    
        $pregunta4_1 = $_POST["4-pregunta1"];
        formResponse($conn, $pregunta4_1, "4-1", $id);
        foreach( $_POST["4-pregunta2"] as $pregunta4_2){
            formResponse($conn, $pregunta4_2, "4-2", $id);
        }
        foreach( $_POST["4-pregunta3"] as $pregunta4_3){
            formResponse($conn, $pregunta4_3, "4-3", $id);
        }
        $pregunta4_4 = $_POST["4-pregunta4"];
        formResponse($conn, $pregunta4_4, "4-4", $id);

        endForm();

    }else{
        header("location: ../login.php");
        exit();
    }
?>