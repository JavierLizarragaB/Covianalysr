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

    $email = htmlspecialchars($_GET["Correo"]);
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE Correo=?");
    $stmt->execute([$email]); 
    $user = $stmt->fetch();

    $password = htmlspecialchars($_GET["Contraseña"]);
    $stmt2 = $pdo->prepare("SELECT Password_Hashed FROM usuarios WHERE Correo=?");
    $stmt2->execute([$email]);
    $hash = $stmt2->fetch();
    $verified = password_verify ( $password , $hash['Password_Hashed'] );

    $stmt3 = $pdo->prepare("SELECT ID_Usuario FROM usuarios WHERE Correo=?");
    $stmt3->execute([$email]);
    $id = $stmt3->fetch();
    $stmt4 = $pdo->prepare("SELECT * FROM encuesta WHERE ID_Usuario=?");
    $stmt4->execute([$id['ID_Usuario']]); 
    $answered = $stmt4->fetch();
    $stmt5 = $pdo->prepare("SELECT * FROM datos_personales WHERE ID_Usuario=?");
    $stmt5->execute([$id['ID_Usuario']]); 
    $answered2 = $stmt5->fetch();

    if ($user and $verified) {
        session_start();
        $_SESSION["ID_Usuario"] = $id['ID_Usuario'];
        
        if($answered['ID_Usuario']==$_SESSION["ID_Usuario"] and $answered2['ID_Usuario']==$_SESSION["ID_Usuario"]){
            header("Location: charts.html");
        }else{
            header("Location: forms.html");
        }
    } else {
        echo '<script>
        redirectURL = "login.html";
        setTimeout("location.href = redirectURL;");
        alert("Correo o contraseña equivocados")</script>';
    }
?>