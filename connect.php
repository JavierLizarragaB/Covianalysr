<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "covianalyst";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $db_name);

    // Verificar conexión
    if ($conn->connect_error) {
        die("No se ha podido conectar a la BD: " . $conn->connect_error);
    } 
    echo "Conexión exitosa.<br>";

    $conn->close();

?>