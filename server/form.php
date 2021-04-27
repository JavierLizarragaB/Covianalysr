<?php
    include_once 'dbm.php';

    $id = $_SESSION["ID_Usuario"];

    $pregunta1 = htmlspecialchars($_GET["pregunta1"]);
    $pregunta2 = htmlspecialchars($_GET["pregunta2"]);
    $pregunta3 = htmlspecialchars($_GET["pregunta3"]);
    $pregunta4 = htmlspecialchars($_GET["pregunta4"]);
    $pregunta5 = htmlspecialchars($_GET["pregunta5"]);
    $pregunta6 = htmlspecialchars($_GET["pregunta6"]);
    $pregunta7 = htmlspecialchars($_GET["pregunta7"]);

    $pregunta2_1 = htmlspecialchars($_GET["2-pregunta1"]);
    //$pregunta2_2 = htmlspecialchars($_GET["2-pregunta2"]);
    //$pregunta2_3 = htmlspecialchars($_GET["2-pregunta3"]);
    //$pregunta2_4 = htmlspecialchars($_GET["2-pregunta4"]);
    $pregunta2_5 = htmlspecialchars($_GET["2-pregunta5"]);

    $pregunta3_1 = htmlspecialchars($_GET["3-pregunta1"]);
    //$pregunta3_2 = htmlspecialchars($_GET["3-pregunta2"]);
    //$pregunta3_3 = htmlspecialchars($_GET["3-pregunta3"]);
    //$pregunta3_4 = htmlspecialchars($_GET["3-pregunta4"]);
    $pregunta3_5 = htmlspecialchars($_GET["3-pregunta5"]);
    $pregunta3_6 = htmlspecialchars($_GET["3-pregunta6"]);
    $pregunta3_7 = htmlspecialchars($_GET["3-pregunta7"]);

    $pregunta4_1 = htmlspecialchars($_GET["4-pregunta1"]);
   //$pregunta4_2 = htmlspecialchars($_GET["4-pregunta2"]);
    //$pregunta4_3 = htmlspecialchars($_GET["4-pregunta3"]);
    $pregunta4_4 = htmlspecialchars($_GET["4-pregunta4"]);

    try{
        $sqlDP = "INSERT INTO datos_personales (ID_Usuario, Edad, Ingresos, Estudios, Localidad, Estado_Civil, Genero, Ocupacion) VALUES ('$id', '$pregunta2', '$pregunta6', '$pregunta4', '$pregunta7', '$pregunta3', '$pregunta1', '$pregunta5')";
        $sv = $pdo->prepare($sqlDP);
        $sv->execute();

        $sqlP21 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '2-1', '$pregunta2_1')";
        $sv = $pdo->prepare($sqlP21);
        $sv->execute();
        foreach( $_GET["2-pregunta2"] as $pregunta2_2){
            $sqlP22 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '2-2', '$pregunta2_2')";
            $sv = $pdo->prepare($sqlP22);
            $sv->execute();
        }
        foreach( $_GET["2-pregunta3"] as $pregunta2_3){
            $sqlP23 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '2-3', '$pregunta2_3')";
            $sv = $pdo->prepare($sqlP23);
            $sv->execute();
        }
        foreach( $_GET["2-pregunta4"] as $pregunta2_4){
            $sqlP24 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '2-4', '$pregunta2_4')";
            $sv = $pdo->prepare($sqlP24);
            $sv->execute();
        }
        $sqlP25 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '2-5', '$pregunta2_5')";
        $sv = $pdo->prepare($sqlP25);
        $sv->execute();

        $sqlP31 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '3-1', '$pregunta3_1')";
        $sv = $pdo->prepare($sqlP31);
        $sv->execute();
        foreach( $_GET["3-pregunta2"] as $pregunta3_2){
            $sqlP32 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '3-2', '$pregunta3_2')";
            $sv = $pdo->prepare($sqlP32);
            $sv->execute();
        }
        foreach( $_GET["3-pregunta3"] as $pregunta3_3){
            $sqlP33 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '3-3', '$pregunta3_3')";
            $sv = $pdo->prepare($sqlP33);
            $sv->execute();
        }
        foreach( $_GET["3-pregunta4"] as $pregunta3_4){
            $sqlP34 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '3-4', '$pregunta3_4')";
            $sv = $pdo->prepare($sqlP34);
            $sv->execute();
        }
        $sqlP35 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '3-5', '$pregunta3_5')";
        $sv = $pdo->prepare($sqlP35);
        $sv->execute();
        $sqlP36 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '3-6', '$pregunta3_6')";
        $sv = $pdo->prepare($sqlP36);
        $sv->execute();
        $sqlP37 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '3-7', '$pregunta3_7')";
        $sv = $pdo->prepare($sqlP37);
        $sv->execute();

        $sqlP41 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '4-1', '$pregunta4_1')";
        $sv = $pdo->prepare($sqlP41);
        $sv->execute();
        foreach( $_GET["4-pregunta2"] as $pregunta4_2){
            $sqlP42 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '4-2', '$pregunta4_2')";
            $sv = $pdo->prepare($sqlP42);
            $sv->execute();
        }
        foreach( $_GET["4-pregunta3"] as $pregunta4_3){
            $sqlP43 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '4-3', '$pregunta4_3')";
            $sv = $pdo->prepare($sqlP43);
            $sv->execute();
        }
        $sqlP44 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '4-4', '$pregunta4_4')";
        $sv = $pdo->prepare($sqlP44);
        $sv->execute();
        
        header("Location: charts.html");
    } catch(Exception $e) {
        echo 'Exception -> ';
        var_dump($e->getMessage());
    }

?>