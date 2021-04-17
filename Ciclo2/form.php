<?php
    $host = 'localhost';
    $db   = 'covianalyst';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    session_start();
    $id = $_SESSION["ID_Usuario"];

    $pregunta1 = htmlspecialchars($_GET["pregunta1"]);
    $pregunta2 = htmlspecialchars($_GET["pregunta2"]);
    $pregunta3 = htmlspecialchars($_GET["pregunta3"]);
    $pregunta4 = htmlspecialchars($_GET["pregunta4"]);
    $pregunta5 = htmlspecialchars($_GET["pregunta5"]);
    $pregunta6 = htmlspecialchars($_GET["pregunta6"]);
    $pregunta7 = htmlspecialchars($_GET["pregunta7"]);

    $pregunta2_1 = htmlspecialchars($_GET["2-pregunta1"]);



    $sqlDP = "INSERT INTO datos_personales (ID_Usuario, Edad, Ingresos, Estudios, Localidad, Estado_Civil, Genero, Ocupacion) VALUES ('$id', '$pregunta2', '$pregunta6', '$pregunta4', '$pregunta7', '$pregunta3', '$pregunta1', '$pregunta5')";

    $sqlP1 = "INSERT INTO encuesta (ID_Usuario, ID_Preguntas, Respuesta) VALUES ('$id', '2-1', '$pregunta2_1')";
    
    try{
        $sv = $pdo->prepare($sqlDP);
        $sv->execute();
        $sv = $pdo->prepare($sqlP1);
        $sv->execute();
        header("Location: charts.html");
    } catch(Exception $e) {
        echo 'Exception -> ';
        var_dump($e->getMessage());
    }

?>