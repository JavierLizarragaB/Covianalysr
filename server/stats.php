<?php
    include_once 'dbm.php';

    $sql = "SELECT COUNT(*) AS total from usuarios";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $registered = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    $sql = "SELECT COUNT(*) AS total from datos_personales";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $answered = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    $notanswered = $registered["total"] - $answered["total"];

    $sql = "SELECT COUNT(*) AS total from datos_personales WHERE Genero='Hombre'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $hombres = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

        $sql = "SELECT COUNT(*) AS total from datos_personales WHERE Genero='Mujer'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $women = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

        $sql = "SELECT COUNT(*) AS total from datos_personales WHERE Genero='Otro'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $otro = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

            $sql = "SELECT COUNT(*) AS total from datos_personales WHERE Genero='Otro'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $otro = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

                $sql = "SELECT COUNT(*) AS total from encuesta WHERE Respuesta='Mercado libre'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $merli = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

                    $sql = "SELECT COUNT(*) AS total from encuesta WHERE Respuesta='Amazon'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $ama = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

                        $sql = "SELECT COUNT(*) AS total from encuesta WHERE Respuesta='Facebook Marketplace'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $face = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
                        $sql = "SELECT COUNT(*) AS total from encuesta WHERE Respuesta='Alibaba / Aliexpress'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $ali = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
                        $sql = "SELECT COUNT(*) AS total from encuesta WHERE Respuesta='eBay'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $ebay = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
                        $sql = "SELECT COUNT(*) AS total from encuesta WHERE Respuesta='Tiendas electrónicas de cada marca'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $tien = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
                        $sql = "SELECT COUNT(*) AS total from encuesta WHERE Respuesta='Otros'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $otr = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
                        $sql = "SELECT COUNT(*) AS total from encuesta WHERE Respuesta='No realizaba compras en linea'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $nada = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);


    

    $json = array(
        "totalSample" => $registered["total"],
        "answered" => $answered["total"],
        "notAnswered" => $notanswered,
        "hombres" => $hombres["total"],
        "women" => $women["total"],
        "otro" => $otro["total"],
        "merli" => $merli["total"],
        "ama" => $ama["total"],
        "face" => $face["total"],
        "ali" => $ali["total"],
        "ebay" => $ebay["total"],
        "tien" => $tien["total"],
        "otr" => $otr["total"],
        "nada" => $nada["total"],
    );

    $payload = json_encode($json);
    echo $payload;
?>