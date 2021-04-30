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
</head>

<body>
    <nav style="background: rgb(241, 247, 252);" class="navbar justify-content-end">
            <form style="margin-right: 35px;" method="POST" action="AboutUs.php">
                <button class="btn btn-primary btn-block" style="background:#f4476b;border:none;" type="submit" name="submit">Acerca de nosotros</button>
            </form>
            <br/>
            <form style="margin-right: 35px;" method="POST" action="server/logout.php">
                <button class="btn btn-primary btn-block" style="background:#f4476b;border:none;" type="submit" name="submit">Cerrar sesión</button>
            </form>
    </nav>

    <div id="chart_one"></div>
    <div id="chart_two"></div>
    <div id="chart_three"></div>
    <div id="chart_four"></div>
    <div id="chart_five"></div>
    <div id="chaart"></div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawStuff);
    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['','Respuestas'],
            ["Más de 10 veces por mes", 10],
            ["10 a 6 veces al mes", 6],
            ["5 a 1 vez al mes", 7],
            ["1 vez cada varios meses", 11],
            ["No realizó compras en línea", 0],
        ]);

        var options = {
            title: 'Frecuencia de compras en línea durante la pandemia',
            width: 900,
            legend: {position: 'none'},
            chart: {title: 'Frecuencia de compras en línea durante la pandemia'},
            bars: 'horizontal',
            axes: {
                x: {
                    0: {side: 'top', label: 'Respuestas'}
                }
            },
            bar: {groupWidth:"90%"}
        };

        var chart = new google.charts.Bar(document.getElementById('chart_one'));
        chart.draw(data, options);
    };
    </script>

    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.arrayToDataTable([
            ['Categoría', 'Compras realizadas'],
            ['Ropa', 8],
            ['Comida a domicilio', 2],
            ['Víveres a domicilio', 4],
            ['Muebles/electrodomésticos', 2],
            ['Coleccionables', 8],
            ['Libros', 6],
            ['Computadoras y/o electrónicos', 5],
            ['Ferretería', 3],
            ['Entretenimiento', 8],
            ['Aplicaciones', 7],
            ['Reservaciones y boletos', 6],
            ['Higiene', 5],
            ['Deporte', 4],
            ['Otros', 3],
            ['Ninguno', 0]
        ]);

        var options = {
            title:'Categorías de compras realizadas',
            width:650,
            height:600
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_two'));
        chart.draw(data, options);
    }
    </script>

    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.arrayToDataTable([
            ['Gastos', 'Respuestas'],
            ['Menos de $1,000 MXN', 8],
            ['$1,000 - $2,500 MXN', 2],
            ['$2,500 - $5,000 MXN', 4],
            ['$5,000 - $7,500 MXN', 2],
            ['$7,500 - $10,000 MXN', 8],
            ['Más de $10,000 MXN', 6]
        ]);

        var options = {
            title:'Gastos mensuales en compras en línea', 
            width:650, 
            height:600
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_three'));
        chart.draw(data, options);
    }
    </script>

    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.arrayToDataTable([
            ['Plataforma', 'Respuestas'],
            ['Mercado Libre', 8],
            ['Amazon', 2],
            ['Facebook Marketplace', 4],
            ['Alibaba/Aliexpress', 2],
            ['eBay', 8],
            ['E-shop/misma marca', 6],
            ['Otros', 3],
            ['N/A', 0]
        ]);

        var options = {
            title:'Plataformas utilizadas para compras en línea', 
            pieHole: 0.4,
            width:650, 
            height:600
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_four'));
        chart.draw(data, options);
    }
    </script>

    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.arrayToDataTable([
            ['Método de pago', 'Respuestas'],
            ['Tarjeta de crédito', 8],
            ['Tarjeta de débito', 2],
            ['Paypal', 4],
            ['Mercado Pago', 2],
            ['Efectivo', 8],
            ['Transferencia electrónica', 6],
            ['Depósito en tiendas de conveniencia', 3],
            ['Otro', 0],
            ['N/A', 0]
        ]);

        var options = {
            title:'Métodos de pago', 
            pieHole: 0.4,
            width:650, 
            height:600
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_five'));
        chart.draw(data, options);
    }
    </script>

</body>

</html>