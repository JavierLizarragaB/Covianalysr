<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "covianalyst";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $db_name);

    // Verificar
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    } 
    echo "Conexión exitosa<br>";

    $check_email = $conn->query("SELECT * FROM usuarios WHERE Correo = '".htmlspecialchars($_GET["Correo"])."'");
    if ($check_email) {
      echo '<script>alert("Este correo ya ha sido usado")</script>';
    } else {
      $count = $conn->query("SELECT COUNT(ID_Usuario) FROM usuarios;");
      $count = $count + 1;
      $sql = "INSERT INTO usuarios (ID_Usuario, Correo, Password_Hashed, Rights) VALUES ('$count', '".htmlspecialchars($_GET["Correo"])."', '".htmlspecialchars($_GET["Contraseña"])."', '1')";
      
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    $conn->close();

?>