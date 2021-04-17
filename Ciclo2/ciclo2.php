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
    if ($user) {
        echo '<script>
        redirectURL = "signin.html";
        setTimeout("location.href = redirectURL;");
        alert("Correo ya utilizado");</script>';
        } else {
        header("Location: forms.html");
        $count = "SELECT COUNT(*) AS total from usuarios";
        $result = $pdo->query($count);
        $data =  $result->fetch();
        $hash = password_hash(htmlspecialchars($_GET["Contraseña"]), PASSWORD_DEFAULT);

        session_start();
        $_SESSION["ID_Usuario"] = $id['ID_Usuario'];
        
        $sql = "INSERT INTO usuarios (ID_Usuario, Correo, Password_Hashed, Rights) VALUES ('".htmlspecialchars($data['total'])."', '".htmlspecialchars($_GET["Correo"])."', '$hash', '1')";
        
        try{
            $sv = $pdo->prepare($sql);
            $sv->execute();

            $stmt3 = $pdo->prepare("SELECT ID_Usuario FROM usuarios WHERE Correo=?");
            $stmt3->execute([$email]);
            $id = $stmt3->fetch();

            $stmt3 = $pdo->prepare("SELECT ID_Usuario FROM usuarios WHERE Correo=?");
            $stmt3->execute([$email]);
            $id = $stmt3->fetch();

            session_start();
            $_SESSION["ID_Usuario"] = $id['ID_Usuario'];

        } catch(Exception $e) {
            echo 'Exception -> ';
            var_dump($e->getMessage());
        }
    }

?>