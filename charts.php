<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    include_once 'server/functions.php';
    if(!isset($_SESSION["ID_Usuario"])){
        header("location: login.php");
        exit();
    }else if(isset($_SESSION['LAST_ACTIVITY'])){
        if((time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
            logout();

            header("location: login.php?error=tiempofuera");
            exit();
        }else{
            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Coroanalyst</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Regularidad', 'Antes', 'Despues'],
            <?php
            include_once 'server/dbm.php';
            $sqlGraph1antesA="SELECT COUNT(*) AS total from encuesta WHERE Respuesta='No realizaba compras en línea' and ID_Preguntas='2-1';";
            $stmtA = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmtA, $sqlGraph1antesA);
            mysqli_stmt_execute($stmtA);
            $resultantesA = mysqli_stmt_get_result($stmtA);
            $numantesA = mysqli_fetch_object($resultantesA);
            
            $sqlGraph1antesB="SELECT COUNT(*) AS total from encuesta WHERE Respuesta='1 vez cada varios meses' and ID_Preguntas='2-1';";
            $stmtB = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmtB, $sqlGraph1antesB);
            mysqli_stmt_execute($stmtB);
            $resultantesB = mysqli_stmt_get_result($stmtB);
            $numantesB = mysqli_fetch_object($resultantesB);
            
            $sqlGraph1antesC="SELECT COUNT(*) AS total from encuesta WHERE Respuesta='De 1 a 5 veces al mes' and ID_Preguntas='2-1';";
            $stmtC = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmtC, $sqlGraph1antesC);
            mysqli_stmt_execute($stmtC);
            $resultantesC = mysqli_stmt_get_result($stmtC);
            $numantesC = mysqli_fetch_object($resultantesC);
            
            $sqlGraph1antesD="SELECT COUNT(*) AS total from encuesta WHERE Respuesta='Más de 10 veces al mes' and ID_Preguntas='2-1';";
            $stmtD = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmtD, $sqlGraph1antesD);
            mysqli_stmt_execute($stmtD);
            $resultantesD = mysqli_stmt_get_result($stmtD);
            $numantesD = mysqli_fetch_object($resultantesD);

            $sqlGraph1despuesA="SELECT COUNT(*) AS total from encuesta WHERE Respuesta='No realizaba compras en línea' and ID_Preguntas='3-1';";
            $stmt2A = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt2A, $sqlGraph1despuesA);
            mysqli_stmt_execute($stmt2A);
            $resultdespuesA = mysqli_stmt_get_result($stmt2A);
            $numdespuesA = mysqli_fetch_object($resultdespuesA);
            
            $sqlGraph1despuesB="SELECT COUNT(*) AS total from encuesta WHERE Respuesta='1 vez cada varios meses' and ID_Preguntas='3-1';";
            $stmt2B = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt2B, $sqlGraph1despuesB);
            mysqli_stmt_execute($stmt2B);
            $resultdespuesB = mysqli_stmt_get_result($stmt2B);
            $numdespuesB = mysqli_fetch_object($resultdespuesB);
            
            $sqlGraph1despuesC="SELECT COUNT(*) AS total from encuesta WHERE Respuesta='De 1 a 5 veces al mes' and ID_Preguntas='3-1';";
            $stmt2C = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt2C, $sqlGraph1despuesC);
            mysqli_stmt_execute($stmt2C);
            $resultdespuesC = mysqli_stmt_get_result($stmt2C);
            $numdespuesC = mysqli_fetch_object($resultdespuesC);
            
            $sqlGraph1despuesD="SELECT COUNT(*) AS total from encuesta WHERE Respuesta='Más de 10 veces al mes' and ID_Preguntas='3-1';";
            $stmt2D = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt2D, $sqlGraph1despuesD);
            mysqli_stmt_execute($stmt2D);
            $resultdespuesD = mysqli_stmt_get_result($stmt2D);
            $numdespuesD = mysqli_fetch_object($resultdespuesD);
            
            echo "['No realizaba compras en línea'," .$numantesA->total.",".$numdespuesA->total."],";
            mysqli_stmt_close($stmtA);
            mysqli_stmt_close($stmt2A);
            echo "['1 vez cada varios meses'," .$numantesB->total.",".$numdespuesB->total."],";
            mysqli_stmt_close($stmtB);
            mysqli_stmt_close($stmt2B);
            echo "['De 1 a 5 veces al mes'," .$numantesC->total.",".$numdespuesC->total."],";
            mysqli_stmt_close($stmtC);
            mysqli_stmt_close($stmt2C);
            echo "['Más de 10 veces al mes'," .$numantesD->total.",".$numdespuesD->total."],";
            mysqli_stmt_close($stmtD);
            mysqli_stmt_close($stmt2D);
            ?>
            ]);

            var options = {
            chart: {
                title: 'Que tan seguido se compraba en linea antes y despues de la pandemia',
            }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material1'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Regularidad', 'Antes', 'Despues'],
            <?php
            include_once 'server/dbm.php';
            $sqlGraph2antesA="SELECT COUNT(*) AS total from encuesta WHERE Respuesta='No realizaba compras en línea' and ID_Preguntas='2-1';";
            $stmt2A = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt2A, $sqlGraph2antesA);
            mysqli_stmt_execute($stmt2A);
            $resultantes2A = mysqli_stmt_get_result($stmt2A);
            $numantes2A = mysqli_fetch_object($resultantes2A);
            
            $sqlGraph2antesB="SELECT COUNT(*) AS total from encuesta WHERE Respuesta='1 vez cada varios meses' and ID_Preguntas='2-1';";
            $stmt2B = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt2B, $sqlGraph2antesB);
            mysqli_stmt_execute($stmt2B);
            $resultantes2B = mysqli_stmt_get_result($stmt2B);
            $numantes2B = mysqli_fetch_object($resultantes2B);
            
            $sqlGraph2antesC="SELECT COUNT(*) AS total from encuesta WHERE Respuesta='De 1 a 5 veces al mes' and ID_Preguntas='2-1';";
            $stmt2C = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt2C, $sqlGraph2antesC);
            mysqli_stmt_execute($stmt2C);
            $resultantes2C = mysqli_stmt_get_result($stmt2C);
            $numantes2C = mysqli_fetch_object($resultantes2C);
            
            $sqlGraph2antesD="SELECT COUNT(*) AS total from encuesta WHERE Respuesta='Más de 10 veces al mes' and ID_Preguntas='2-1';";
            $stmt2D = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt2D, $sqlGraph2antesD);
            mysqli_stmt_execute($stmt2D);
            $resultantes2D = mysqli_stmt_get_result($stmt2D);
            $numantes2D = mysqli_fetch_object($resultantes2D);

            $sqlGraph2despuesA="SELECT COUNT(*) AS total from encuesta WHERE Respuesta='No realizaba compras en línea' and ID_Preguntas='3-1';";
            $stmt2A2 = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt2A2, $sqlGraph2despuesA);
            mysqli_stmt_execute($stmt2A2);
            $resultdespues2A = mysqli_stmt_get_result($stmt2A2);
            $numdespues2A = mysqli_fetch_object($resultdespues2A);
            
            $sqlGraph2despuesB="SELECT COUNT(*) AS total from encuesta WHERE Respuesta='1 vez cada varios meses' and ID_Preguntas='3-1';";
            $stmt2B2 = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt2B2, $sqlGraph2despuesB);
            mysqli_stmt_execute($stmt2B2);
            $resultdespues2B = mysqli_stmt_get_result($stmt2B2);
            $numdespues2B = mysqli_fetch_object($resultdespues2B);
            
            $sqlGraph1despuesC="SELECT COUNT(*) AS total from encuesta WHERE Respuesta='De 1 a 5 veces al mes' and ID_Preguntas='3-1';";
            $stmt2C = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt2C, $sqlGraph1despuesC);
            mysqli_stmt_execute($stmt2C);
            $resultdespuesC = mysqli_stmt_get_result($stmt2C);
            $numdespuesC = mysqli_fetch_object($resultdespuesC);
            
            $sqlGraph1despuesD="SELECT COUNT(*) AS total from encuesta WHERE Respuesta='Más de 10 veces al mes' and ID_Preguntas='3-1';";
            $stmt2D = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt2D, $sqlGraph1despuesD);
            mysqli_stmt_execute($stmt2D);
            $resultdespuesD = mysqli_stmt_get_result($stmt2D);
            $numdespuesD = mysqli_fetch_object($resultdespuesD);
            
            echo "['No realizaba compras en línea'," .$numantesA->total.",".$numdespuesA->total."],";
            mysqli_stmt_close($stmtA);
            mysqli_stmt_close($stmt2A);
            echo "['1 vez cada varios meses'," .$numantesB->total.",".$numdespuesB->total."],";
            mysqli_stmt_close($stmtB);
            mysqli_stmt_close($stmt2B);
            echo "['De 1 a 5 veces al mes'," .$numantesC->total.",".$numdespuesC->total."],";
            mysqli_stmt_close($stmtC);
            mysqli_stmt_close($stmt2C);
            echo "['Más de 10 veces al mes'," .$numantesD->total.",".$numdespuesD->total."],";
            mysqli_stmt_close($stmtD);
            mysqli_stmt_close($stmt2D);
            ?>
            ]);

            var options = {
            chart: {
                title: '¿Qué plataformas utilizaba para realizar sus compras?:',
            }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material2'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
</head>

<body>
    <nav style="background: rgb(241, 247, 252);" class="navbar justify-content-end" >
            <form style="margin-right: 35px;" method="POST" action="AboutUs.php">
                <button class="btn btn-primary btn-block" style="background:#f4476b;border:none;" type="submit" name="submit">Acerca de nosotros</button>
            </form>
            <br/>
            <form style="margin-right: 35px;" method="POST" action="server/logout.php">
                <button class="btn btn-primary btn-block" style="background:#f4476b;border:none;" type="submit" name="submit">Cerrar sesión</button>
            </form>
    </nav>
    <div id="columnchart_material1" style="width: 800px; height: 500px;"></div>
    <div id="columnchart_material2" style="width: 800px; height: 500px;"></div>

</body>
</html>