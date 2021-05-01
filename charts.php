<!DOCTYPE html>
<html lang="en">

<?php
    include_once 'server/dbm.php';
    session_start();
    include_once 'server/functions.php';
    include_once 'server/getdata.php';
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
    
    //$sql = "SELECT COUNT(*) AS Respuesta FROM encuesta WHERE Respuesta='Más de 10 veces al mes' AND WHERE ID_Preguntas='2-1'";
    /*$stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    */
    //$result = $conn->query($sql);
    //$twoONEichi = $sql;
    //var twoONEichi = $sql;
    //$twoONEichi = mysqli_fetch_assoc($result);
    //mysqli_stmt_close($stmt);

    //$sql = "SELECT COUNT(*) AS Respuesta FROM encuesta WHERE Respuesta='De 6 a 10 veces al mes' AND WHERE ID_Preguntas='2-1'";
    /*$stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    */
    //$result = $conn->query($sql);
    //$twoONEni = $sql;
    //var twoONEni = $sql;
    //$twoONEni = mysqli_fetch_assoc($result);
    //mysqli_stmt_close($stmt);

    //$sql = "SELECT COUNT(*) AS Respuesta FROM encuesta WHERE Respuesta='De 1 a 5 veces al mes' AND WHERE ID_Preguntas='2-1'";
    /*$stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    */
    //$result = $conn->query($sql);
    //$twoONEsan = $sql;
    //var twoONEsan = $sql;
    //$twoONEsan = mysqli_fetch_assoc($result);
    //mysqli_stmt_close($stmt);

    //$sql = "SELECT COUNT(*) AS Respuesta FROM encuesta WHERE Respuesta='1 vez cada varios meses' AND WHERE ID_Preguntas='2-1'";
    /*$stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    */
    //$result = $conn->query($sql);
    //$twoONEyo = $sql;
    //var twoONEyo = $sql;
    //$twoONEyo = mysqli_fetch_assoc($result);
    //mysqli_stmt_close($stmt);

    //$sql = "SELECT COUNT(*) AS Respuesta FROM encuesta WHERE Respuesta='No realizaba compras en línea' AND WHERE ID_Preguntas='2-1'";
    /*$stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    */
    //$result = $conn->query($sql);
    //$twoONEgo = $sql;
    //var twoONEgo = $sql;
    //$twoONEgo = mysqli_fetch_assoc($result);
    //mysqli_stmt_close($stmt);
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Coroanalyst</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawTwoAChart);
    google.charts.setOnLoadCallback(drawTwoBChart);
    google.charts.setOnLoadCallback(drawThreeChart);
    google.charts.setOnLoadCallback(drawFourAChart);
    google.charts.setOnLoadCallback(drawFourBChart);
    google.charts.setOnLoadCallback(drawFiveAChart);
    google.charts.setOnLoadCallback(drawFiveBChart);

    function drawTwoAChart() {
        var data = new google.visualization.arrayToDataTable([
            ['Categoría', 'Compras realizadas'],
            ['Ropa', 3],
            ['Comida a domicilio', 2],
            ['Víveres a domicilio', 1],
            ['Muebles/electrodomésticos', 2],
            ['Coleccionables', 3],
            ['Libros', 1],
            ['Computadoras y/o electrónicos', 4],
            ['Ferretería', 0],
            ['Entretenimiento', 4],
            ['Aplicaciones', 0],
            ['Reservaciones y boletos', 2],
            ['Higiene', 1],
            ['Deporte', 1],
            ['Otros', 1],
            ['Ninguno', 6]
        ]);

        var options = {
            title:'Categorías de compras realizadas antes de la pandemia',
            width:650,
            height:600
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_twoA_div'));
        chart.draw(data, options);
    }

    function drawTwoBChart() {
        var data = new google.visualization.arrayToDataTable([
            ['Categoría', 'Compras realizadas'],
            ['Ropa', 3],
            ['Comida a domicilio', 2],
            ['Víveres a domicilio', 2],
            ['Muebles/electrodomésticos', 4],
            ['Coleccionables', 4],
            ['Libros', 3],
            ['Computadoras y/o electrónicos', 2],
            ['Ferretería', 1],
            ['Entretenimiento', 4],
            ['Aplicaciones', 1],
            ['Reservaciones y boletos', 1],
            ['Higiene', 3],
            ['Deporte', 2],
            ['Otros', 3],
            ['Ninguno', 7]
        ]);

        var options = {
            title:'Categorías de compras realizadas durante la pandemia',
            width:650,
            height:600
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_twoB_div'));
        chart.draw(data, options);
    }

    function drawThreeChart() {
        var data = new google.visualization.arrayToDataTable([
            ['Gastos', 'Respuestas'],
            ['Menos de $1,000 MXN', 2],
            ['$1,000 - $2,500 MXN', 2],
            ['$2,500 - $5,000 MXN', 2],
            ['$5,000 - $7,500 MXN', 3],
            ['$7,500 - $10,000 MXN', 3],
            ['Más de $10,000 MXN', 1]
        ]);

        var options = {
            title:'Gastos mensuales en compras en línea durante la pandemia', 
            width:650, 
            height:600
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_three_div'));
        chart.draw(data, options);
    }

    function drawFourAChart() {
        var data = new google.visualization.arrayToDataTable([
            ['Plataforma', 'Respuestas'],
            ['Mercado Libre', 2],
            ['Amazon', 2],
            ['Facebook Marketplace', 4],
            ['Alibaba/Aliexpress', 2],
            ['eBay', 2],
            ['E-shop/misma marca', 0],
            ['Otros', 2],
            ['N/A', 8]
        ]);

        var options = {
            title:'Plataformas utilizadas para compras en línea antes de la pandemia', 
            pieHole: 0.4,
            width:650, 
            height:600
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_fourA_div'));
        chart.draw(data, options);
    }

    function drawFourBChart() {
        var data = new google.visualization.arrayToDataTable([
            ['Plataforma', 'Respuestas'],
            ['Mercado Libre', 3],
            ['Amazon', 2],
            ['Facebook Marketplace', 2],
            ['Alibaba/Aliexpress', 2],
            ['eBay', 3],
            ['E-shop/misma marca', 2],
            ['Otros', 2],
            ['N/A', 6]
        ]);

        var options = {
            title:'Plataformas utilizadas para compras en línea durante la pandemia', 
            pieHole: 0.4,
            width:650, 
            height:600
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_fourB_div'));
        chart.draw(data, options);
    }

    function drawFiveAChart() {
        var data = new google.visualization.arrayToDataTable([
            ['Método de pago', 'Respuestas'],
            ['Tarjeta de crédito', 2],
            ['Tarjeta de débito', 4],
            ['Paypal', 3],
            ['Mercado Pago', 2],
            ['Efectivo', 2],
            ['Transferencia electrónica', 2],
            ['Depósito en tiendas de conveniencia', 1],
            ['Otro', 2],
            ['N/A', 7]
        ]);

        var options = {
            title:'Uso de métodos de pago antes de la pandemia', 
            pieHole: 0.4,
            width:650, 
            height:600
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_fiveA_div'));
        chart.draw(data, options);
    }

    function drawFiveBChart() {
        var data = new google.visualization.arrayToDataTable([
            ['Método de pago', 'Respuestas'],
            ['Tarjeta de crédito', 3],
            ['Tarjeta de débito', 3],
            ['Paypal', 3],
            ['Mercado Pago', 4],
            ['Efectivo', 4],
            ['Transferencia electrónica', 3],
            ['Depósito en tiendas de conveniencia', 1],
            ['Otro', 3],
            ['N/A', 6]
        ]);

        var options = {
            title:'Uso de métodos de pago durante la pandemia', 
            pieHole: 0.4,
            width:650, 
            height:600
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_fiveB_div'));
        chart.draw(data, options);
    }

    </script>
</head>

<body align=>
    <nav style="background: rgb(241, 247, 252);" class="navbar justify-content-end" >
            <form style="margin-right: 35px;" method="POST" action="AboutUs.php">
                <button class="btn btn-primary btn-block" style="background:#f4476b;border:none;" type="submit" name="submit">Acerca de nosotros</button>
            </form>
            <br/>
            <form style="margin-right: 35px;" method="POST" action="server/logout.php">
                <button class="btn btn-primary btn-block" style="background:#f4476b;border:none;" type="submit" name="submit">Cerrar sesión</button>
            </form>
    </nav>


    <div id="chart_oneA" align="center"></div>
    <div id="chart_oneB" align="center"></div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawAStuff);
    function drawAStuff() {
        /*var jsonData = $.ajax({
        url: "server/getdata.php",
        dataType: ".json",
        async: false
        });

        var data = new google.visualization.DataTable(jsonData);*/

        /*a = $twoONEichi;
        b = $twoONEni;
        c = $twoONEsan;
        d = $twoONEyo;
        e = $twoONEgo;*/

        
        //
        //$sql = "SELECT COUNT(*) AS Respuesta FROM encuesta WHERE Respuesta='Más de 10 veces al mes' AND WHERE ID_Preguntas='2-1'"; 
        //echo $sql
        //;
        
        var data = new google.visualization.arrayToDataTable([
            ['','Respuestas'],
            ["Más de 10 veces por mes", 2],
            ["10 a 6 veces al mes", 1],
            ["5 a 1 vez al mes", 3],
            ["1 vez cada varios meses", 4],
            ["No realizó compras en línea", 5],
        ]);

        var options = {
            title: 'Frecuencia de compras en línea antes de la pandemia',
            width: 900,
            legend: {position: 'none'},
            chart: {title: 'Frecuencia de compras en línea antes de la pandemia'},
            bars: 'horizontal',
            axes: {
                x: {
                    0: {side: 'top', label: 'Respuestas'}
                }
            },
            bar: {groupWidth:"90%"}
        };

        var chart = new google.charts.Bar(document.getElementById('chart_oneA'));
        chart.draw(data, options);
    };
    </script>

    <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawBStuff);
    function drawBStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['','Respuestas'],
            ["Más de 10 veces por mes", 7],
            ["10 a 6 veces al mes", 6],
            ["5 a 1 vez al mes", 2],
            ["1 vez cada varios meses", 1],
            ["No realizó compras en línea", 1],
        ]);

        var options = {
            title: 'Frecuencia de compras en línea durante la pandemia',
            width: 900,
            legend: {position: 'none'},
            chart: {title: 'Frecuencia de compras en línea durante la pandemia'},
            bars: 'horizontal',
            axes: {
                x: {
                    0: {side: 'bottom', label: 'Respuestas'}
                }
            },
            bar: {groupWidth:"90%"}
        };

        var chart = new google.charts.Bar(document.getElementById('chart_oneB'));
        chart.draw(data, options);
    };
    </script>

    <table class="columns" align="center">
      <tr>
        <td><div id="chart_twoA_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="chart_twoB_div" style="border: 1px solid #ccc"></div></td>
      </tr>
      <tr>
        <td><div id="chart_fourA_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="chart_fourB_div" style="border: 1px solid #ccc"></div></td>
      </tr>
      <tr>
        <td><div id="chart_fiveA_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="chart_fiveB_div" style="border: 1px solid #ccc"></div></td>
      </tr>
      <tr>
        <td><div id="chart_three_div" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>
</body>
</html>