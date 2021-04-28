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

    $json = array(
        "totalSample" => $registered["total"],
        "answered" => $answered["total"],
        "notAnswered" => $notanswered
    );

    $payload = json_encode($json);
    echo $payload;
?>