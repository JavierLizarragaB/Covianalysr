<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    if(!isset($_SESSION["ID_Usuario"])){
        header("location: login.php");
        exit();
    }else{
        include_once 'server/dbm.php';
        include_once 'server/functions.php';
        if (answered($conn, $_SESSION["ID_Usuario"])){
            header("location: charts.php");
            exit();
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

<body  style="background: rgb(241, 247, 252);">
    <div  style="margin: 25px;background: rgb(255,255,255);padding: 20px;border-radius: 15px;">
        <h1>Queremos saber sobre ti</h1>
                <?php 
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "stmtfailed"){
                            echo "<p class='Error'>*Algo salio mal, porfavor intente mas tarde</p>";
                        }
                    }
                ?>
        <form style="padding: 25px;" name="myForm" onsubmit="return ifEmpty()" method="POST" action="server/form.php">
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">Genero:</h1>
            <p id="ERRpregunta1" class="Error"></p>
            <div class="form-group" style="padding-left: 45px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1" name="pregunta1" value="Mujer"><label class="form-check-label" for="formCheck-1">Mujer</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2" name="pregunta1" value="Hombre"><label class="form-check-label" for="formCheck-2">Hombre</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-3" name="pregunta1" value="Otro"><label class="form-check-label" for="formCheck-3">Otro</label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">Edad:</h1>
            <p id="ERRpregunta2" class="Error"></p>
            <div  class="form-group" style="padding-left: 45px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-4" name="pregunta2" value="Menos de 15"><label class="form-check-label" for="formCheck-4">Menos de 15</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-5" name="pregunta2" value="De 15 a 20 años"><label class="form-check-label" for="formCheck-5">De 15 a 20 años</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-6" name="pregunta2" value="De 21 a 25 años"><label class="form-check-label" for="formCheck-6">De 21 a 25 años</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-7" name="pregunta2" value="De 26 a 30 años"><label class="form-check-label" for="formCheck-7">De 26 a 30 años</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-8" name="pregunta2" value="De 31 a 25 años"><label class="form-check-label" for="formCheck-8">De 31 a 35 años</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-9" name="pregunta2" value="De 36 a 40 años"><label class="form-check-label" for="formCheck-9">De 36 a 40 años</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-10" name="pregunta2" value="De 41 a 45 años"><label class="form-check-label" for="formCheck-10">De 41 a 45 años</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-11" name="pregunta2" value="De 46 a 50 años"><label class="form-check-label" for="formCheck-11">De 46 a 50 años</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-12" name="pregunta2" value="De 51 a 55 años"><label class="form-check-label" for="formCheck-12">De 51 a 55 años</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-13" name="pregunta2" value="De 56 a 60 años"><label class="form-check-label" for="formCheck-13">De 56 a 60 años</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-14" name="pregunta2" value="De 61 a 65 años"><label class="form-check-label" for="formCheck-14">De 61 a 65 años</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-15" name="pregunta2" value="De 66 a 70 años"><label class="form-check-label" for="formCheck-15">De 66 a 70 años</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-16" name="pregunta2" value="Más de 70"><label class="form-check-label" for="formCheck-16">Más de 70</label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">Estado Civil:</h1>
            <p id="ERRpregunta3" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-17" name="pregunta3" value="Soltero/a"><label class="form-check-label" for="formCheck-17">Soltero/a</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-18" name="pregunta3" value="Casado/a"><label class="form-check-label" for="formCheck-18">Casado/a</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-19" name="pregunta3" value="Divorciado/a"><label class="form-check-label" for="formCheck-19">Divorciado/a</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-20" name="pregunta3" value="Unión libre"><label class="form-check-label" for="formCheck-20">Unión libre</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-21" name="pregunta3" value="Viudo/a"><label class="form-check-label" for="formCheck-21">Viudo/a</label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">Nivel máximo de estudios:</h1>
            <p id="ERRpregunta4" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-22" name="pregunta4" value="No aplica"><label class="form-check-label" for="formCheck-22">No aplica</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-23" name="pregunta4" value="Primaria"><label class="form-check-label" for="formCheck-23">Primaria</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-24" name="pregunta4" value="Secundaria"><label class="form-check-label" for="formCheck-24">Secundaria</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-25" name="pregunta4" value="Preparatoria"><label class="form-check-label" for="formCheck-25">Preparatoria</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-26" name="pregunta4" value="Universidad"><label class="form-check-label" for="formCheck-26">Universidad</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-27" name="pregunta4" value="Maestría"><label class="form-check-label" for="formCheck-27">Maestría</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-28" name="pregunta4" value="Doctorado"><label class="form-check-label" for="formCheck-28">Doctorado</label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">Ocupación:</h1>
            <p id="ERRpregunta5" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-29" name="pregunta5" value="Sector industrial"><label class="form-check-label" for="formCheck-29">Sector industrial</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-30" name="pregunta5" value="Sector educativo"><label class="form-check-label" for="formCheck-30">Sector educativo</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-31" name="pregunta5" value="Sector gubernamental"><label class="form-check-label" for="formCheck-31">Sector gubernamental</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-32" name="pregunta5" value="Sector de comercio"><label class="form-check-label" for="formCheck-32">Sector de comercio</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-33" name="pregunta5" value="Sector de transporte"><label class="form-check-label" for="formCheck-33">Sector de transporte</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-34" name="pregunta5" value="Sector de comida"><label class="form-check-label" for="formCheck-34">Sector de comida</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-35" name="pregunta5" value="Sector de alojamiento"><label class="form-check-label" for="formCheck-35">Sector de alojamiento</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-36" name="pregunta5" value="Sector de construcción"><label class="form-check-label" for="formCheck-36">Sector de construcción</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-37" name="pregunta5" value="Sector suministro de energía"><label class="form-check-label" for="formCheck-37">Sector de suministros de energía</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-38" name="pregunta5" value="Sector de actividades inmobiliarias"><label class="form-check-label" for="formCheck-38">Sector de actividades inmobiliarias</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-39" name="pregunta5" value="Sector artístico"><label class="form-check-label" for="formCheck-39">Sector artístico</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-40" name="pregunta5" value="Sector de pesca y acuicultura"><label class="form-check-label" for="formCheck-40">Sector de pesca y acuicultura</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-41" name="pregunta5" value="Sector de informática"><label class="form-check-label" for="formCheck-41">Sector de informática</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-42" name="pregunta5" value="Sector de servicios financieros"><label class="form-check-label" for="formCheck-42">Sector de servicios financieros</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-43" name="pregunta5" value="Sector judicial"><label class="form-check-label" for="formCheck-43">Sector judicial</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-44" name="pregunta5" value="Hogar"><label class="form-check-label" for="formCheck-44">Hogar</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-45" name="pregunta5" value="Estudiante"><label class="form-check-label" for="formCheck-45">Estudiante</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-46" name="pregunta5" value="Otro"><label class="form-check-label" for="formCheck-46">Otro</label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">Ingreso económico mensual:</h1>
            <p id="ERRpregunta6" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-47" name="pregunta6" value="No recibo algún ingreso"><label class="form-check-label" for="formCheck-47">No recibo algún ingreso</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-48" name="pregunta6" value="Menor a 1000"><label class="form-check-label" for="formCheck-48">Menor a 1,000</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-49" name="pregunta6" value="De 1000 a 10000"><label class="form-check-label" for="formCheck-49">De 1,000 a 10,000</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-50" name="pregunta6" value="De 10000 a 30000"><label class="form-check-label" for="formCheck-50">De 10,000 a 30,000</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-51" name="pregunta6" value="De 30000 a 50000"><label class="form-check-label" for="formCheck-51">De 30,000 a 50,000</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-52" name="pregunta6" value="Mayor a 50000"><label class="form-check-label" for="formCheck-52">Mayor a 50,000</label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">Estado:</h1>
            <p id="ERRpregunta7" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;padding-right: 25px;"><select class="form-control" style="width: 200px;" name="pregunta7" required="">
                    <optgroup label="Selecciona un estado">
                        <option value="N/A">N/A</option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja California">Baja California</option>
                        <option value="Baja California Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="Coahuila">Coahuila</option>
                        <option value="Colima">Colima</option>
                        <option value="Ciudad de México">Ciudad de México</option>
                        <option value="Durango">Durango</option>
                        <option value="Estado de México">Estado de México</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Michoacán">Michoacán</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo León">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Querétaro">Querétaro</option>
                        <option value="Quintana Roo">Quintana Roo</option>
                        <option value="San Luis Potosí">San Luis Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Yucatán">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>
                    </optgroup>
                </select></div>
            <h1 style="background: transparent;margin-left: -25px;padding-left: 0px;font-size: 30px;color: rgb(80, 94, 108);margin-top: 25px;">Antes de la pandemia...</h1>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">¿Qué tan seguido compraba en línea?:</h1>
            <p id="ERRpregunta21" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-53" name="2-pregunta1" value="No realizaba compras en línea"><label class="form-check-label" for="formCheck-53">No realizaba compras en línea</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-54" name="2-pregunta1" value="1 vez cada varios meses"><label class="form-check-label" for="formCheck-54">1 vez cada varios meses</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-55" name="2-pregunta1" value="De 1 a 5 veces al mes"><label class="form-check-label" for="formCheck-55">De 1 a 5 veces al mes</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-56" name="2-pregunta1" value="De 6 a 10 veces al mes"><label class="form-check-label" for="formCheck-56">De 6 a 10 veces al mes</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-57" name="2-pregunta1" value="Más de 10 veces al mes"><label class="form-check-label" for="formCheck-57">Más de 10 veces al mes</label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">¿Qué plataformas utilizaba para realizar sus compras?:</h1>
            <p id="ERRpregunta22" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-58" name="2-pregunta2[]" value="Mercado libre"><label class="form-check-label" for="formCheck-58">Mercado libre</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-59" name="2-pregunta2[]" value="Amazon"><label class="form-check-label" for="formCheck-59">Amazon<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-60" name="2-pregunta2[]" value="Facebook Marketplace"><label class="form-check-label" for="formCheck-60">Facebook Marketplace</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-61" name="2-pregunta2[]" value="Alibaba / Aliexpress"><label class="form-check-label" for="formCheck-61">Alibaba / Aliexpress</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-62" name="2-pregunta2[]" value="eBay"><label class="form-check-label" for="formCheck-62">eBay</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-63" name="2-pregunta2[]" value="Tiendas electrónicas de cada marca"><label class="form-check-label" for="formCheck-63">Tiendas electrónicas de cada marca (Nike, Adidas, Walmart, Liverpool, etc.)</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-64" name="2-pregunta2[]" value="Otros"><label class="form-check-label" for="formCheck-64">Otros</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-65" name="2-pregunta2[]" value="No realizaba compras en línea"><label class="form-check-label" for="formCheck-65">No realizaba compras en línea</label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">¿Qué métodos de pago utilizaba para realizar sus compras en línea?:</h1>
            <p id="ERRpregunta23" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-66" name="2-pregunta3[]" value="Tarjeta de crédito"><label class="form-check-label" for="formCheck-66">Tarjeta de crédito</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-67" name="2-pregunta3[]" value="Tarjeta de débito"><label class="form-check-label" for="formCheck-67">Tarjeta de débito<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-68" name="2-pregunta3[]" value="Paypal"><label class="form-check-label" for="formCheck-68">Paypal</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-69" name="2-pregunta3[]" value="Mercado pago"><label class="form-check-label" for="formCheck-69">Mercado pago</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-70" name="2-pregunta3[]" value="Efectivo"><label class="form-check-label" for="formCheck-70">Efectivo</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-71" name="2-pregunta3[]" value="Transferencia electrónica"><label class="form-check-label" for="formCheck-71">Transferencia electrónica</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-72" name="2-pregunta3[]" value="Deposito en tiendas de convenio"><label class="form-check-label" for="formCheck-72">Deposito en tiendas de convenio (Oxxo, 7Eleven, etc.)</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-73" name="2-pregunta3[]" value="Otros"><label class="form-check-label" for="formCheck-73">Otros</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-74" name="2-pregunta3[]" value="No realizaba compras en línea"><label class="form-check-label" for="formCheck-74">No realizaba compras en línea</label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">¿En cuál de las siguientes categorías caen sus compras realizadas en línea?:</h1>
            <p id="ERRpregunta24" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-75" name="2-pregunta4[]" value="Ropa"><label class="form-check-label" for="formCheck-75">Ropa</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-76" name="2-pregunta4[]" value="Comida a domicilio"><label class="form-check-label" for="formCheck-76">Comida a domicilio (Rappi, UberEats, etc.)<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-77" name="2-pregunta4[]" value="Super a domicilio"><label class="form-check-label" for="formCheck-77">Super a domicilio (víveres)</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-78" name="2-pregunta4[]" value="Muebles y/o electrodomésticos"><label class="form-check-label" for="formCheck-78">Muebles y/o electrodomésticos</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-79" name="2-pregunta4[]" value="Coleccionables"><label class="form-check-label" for="formCheck-79">Coleccionables</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-80" name="2-pregunta4[]" value="Libros"><label class="form-check-label" for="formCheck-80">Libros (físicos o electrónicos)</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-81" name="2-pregunta4[]" value="Computadoras y/o electrónicos"><label class="form-check-label" for="formCheck-81">Computadoras y/o electrónicos</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-82" name="2-pregunta4[]" value="Herramientas y ferretería"><label class="form-check-label" for="formCheck-82">Herramientas y ferretería</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-83" name="2-pregunta4[]" value="Entretenimiento"><label class="form-check-label" for="formCheck-83">Entretenimiento (música, tv, videojuegos, juguetes, etc.)<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-84" name="2-pregunta4[]" value="Programas o aplicaciones"><label class="form-check-label" for="formCheck-84">Programas o aplicaciones<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-85" name="2-pregunta4[]" value="Reservaciones y boletos"><label class="form-check-label" for="formCheck-85">Reservaciones y boletos<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-86" name="2-pregunta4[]" value="Artículos de higiene"><label class="form-check-label" for="formCheck-86">Artículos de higiene<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-87" name="2-pregunta4[]" value="Artículos deportivos"><label class="form-check-label" for="formCheck-87">Artículos deportivos<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-88" name="2-pregunta4[]" value="Otros"><label class="form-check-label" for="formCheck-88">Otros<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-89" name="2-pregunta4[]" value="No realizaba compras en línea"><label class="form-check-label" for="formCheck-89">No realizaba compras en línea<br></label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">¿Cuánto tiempo estima que usaba la computadora para actividades diarias?:</h1>
            <p id="ERRpregunta25" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-90" name="2-pregunta5" value="7 horas o más al día"><label class="form-check-label" for="formCheck-90">7 horas o más al día</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-91" name="2-pregunta5" value="De 2 a 6 horas al día"><label class="form-check-label" for="formCheck-91">De 2 a 6 horas al día</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-92" name="2-pregunta5" value="De 2 a 6 horas a la semana"><label class="form-check-label" for="formCheck-92">De 2 a 6 horas a la semana</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-93" name="2-pregunta5" value="Menos de 2 horas a la semana"><label class="form-check-label" for="formCheck-93">Menos de 2 horas a la semana</label></div>
            </div>
            <h1 style="background: transparent;margin-left: -25px;padding-left: 0px;font-size: 30px;color: rgb(80, 94, 108);margin-top: 25px;">Durante la pandemia...</h1>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">¿Qué tan seguido compra en línea?:</h1>
            <p id="ERRpregunta31" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-94" name="3-pregunta1" value="No realizo compras en línea"><label class="form-check-label" for="formCheck-94">No realizo compras en línea</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-95" name="3-pregunta1" value="1 vez cada varios meses"><label class="form-check-label" for="formCheck-95">1 vez cada varios meses</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-96" name="3-pregunta1" value="De 1 a 5 veces al mes"><label class="form-check-label" for="formCheck-96">De 1 a 5 veces al mes</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-97" name="3-pregunta1" value="De 6 a 10 veces al mes"><label class="form-check-label" for="formCheck-97">De 6 a 10 veces al mes</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-98" name="3-pregunta1" value="Más de 10 veces al mes"><label class="form-check-label" for="formCheck-98">Más de 10 veces al mes</label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">¿Qué plataformas utiliza para realizar sus compras en línea?:</h1>
            <p id="ERRpregunta32" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-99" name="3-pregunta2[]" value="Mercado libre"><label class="form-check-label" for="formCheck-99">Mercado libre</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-100" name="3-pregunta2[]" value="Amazon"><label class="form-check-label" for="formCheck-100">Amazon<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-101" name="3-pregunta2[]" value="Facebook Marketplace"><label class="form-check-label" for="formCheck-101">Facebook Marketplace</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-102" name="3-pregunta2[]" value="Alibaba / Aliexpress"><label class="form-check-label" for="formCheck-102">Alibaba / Aliexpress</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-103" name="3-pregunta2[]" value="eBay"><label class="form-check-label" for="formCheck-103">eBay</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-104" name="3-pregunta2[]" value="Tiendas electónicas de cada marca"><label class="form-check-label" for="formCheck-104">Tiendas electrónicas de cada marca (Nike, Adidas, Walmart, Liverpool, etc.)</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-105" name="3-pregunta2[]" value="Otros"><label class="form-check-label" for="formCheck-105">Otros</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-106" name="3-pregunta2[]" value="No realizo compras en línea"><label class="form-check-label" for="formCheck-106">No realizo compras en línea</label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">¿Qué métodos de pago utiliza para realizar sus compras en línea?:</h1>
            <p id="ERRpregunta33" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-107" name="3-pregunta3[]" value="Tarjeta de crédito"><label class="form-check-label" for="formCheck-107">Tarjeta de crédito</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-108" name="3-pregunta3[]" value="Tarjeta de débito"><label class="form-check-label" for="formCheck-108">Tarjeta de débito<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-109" name="3-pregunta3[]" value="Paypal"><label class="form-check-label" for="formCheck-109">Paypal</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-110" name="3-pregunta3[]" value="Mercado pago"><label class="form-check-label" for="formCheck-110">Mercado pago</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-111" name="3-pregunta3[]" value="Efectivo"><label class="form-check-label" for="formCheck-111">Efectivo</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-112" name="3-pregunta3[]" value="Transferencia electrónica"><label class="form-check-label" for="formCheck-112">Transferencia electrónica</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-113" name="3-pregunta3[]" value="Deposito en tiendas de convenio"><label class="form-check-label" for="formCheck-113">Deposito en tiendas de convenio (Oxxo, 7Eleven, etc.)</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-114" name="3-pregunta3[]" value="Otros"><label class="form-check-label" for="formCheck-114">Otros</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-115" name="3-pregunta3[]" value="No realizo compras en línea"><label class="form-check-label" for="formCheck-115">No realizo compras en línea</label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">¿En cuál de las siguientes categorías caen sus compras en línea?:</h1>
            <p id="ERRpregunta34" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-116" name="3-pregunta4[]" value="Ropa"><label class="form-check-label" for="formCheck-116">Ropa</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-117" name="3-pregunta4[]" value="Comida a domicilio"><label class="form-check-label" for="formCheck-117">Comida a domicilio (Rappi, UberEats, etc.)<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-118" name="3-pregunta4[]" value="Super a domicilio"><label class="form-check-label" for="formCheck-118">Super a domicilio (víveres)</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-119" name="3-pregunta4[]" value="Muebles y/o electromomésticos"><label class="form-check-label" for="formCheck-119">Muebles y/o electrodomésticos</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-120" name="3-pregunta4[]" value="Coleccionables"><label class="form-check-label" for="formCheck-120">Coleccionables</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-121" name="3-pregunta4[]" value="Libros"><label class="form-check-label" for="formCheck-121">Libros (físicos o electrónicos)</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-122" name="3-pregunta4[]" value="Computadoras y/o electrónicos"><label class="form-check-label" for="formCheck-122">Computadoras y/o electrónicos</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-123" name="3-pregunta4[]" value="Herramientas y ferretería"><label class="form-check-label" for="formCheck-123">Herramientas y ferretería</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-124" name="3-pregunta4[]" value="Entretenimiento"><label class="form-check-label" for="formCheck-124">Entretenimiento (música, tv, videojuegos, juguetes, etc.)<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-125" name="3-pregunta4[]" value="Programas o aplicaciones"><label class="form-check-label" for="formCheck-125">Programas o aplicaciones<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-126" name="3-pregunta4[]" value="Reservaciones y boletos"><label class="form-check-label" for="formCheck-126">Reservaciones y boletos<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-127" name="3-pregunta4[]" value="Artículos de higiene"><label class="form-check-label" for="formCheck-127">Artículos de higiene<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-128" name="3-pregunta4[]" value="Artículos deportivos"><label class="form-check-label" for="formCheck-128">Artículos deportivos<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-129" name="3-pregunta4[]" value="Otros"><label class="form-check-label" for="formCheck-129">Otros<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-130" name="3-pregunta4[]" value="No realizo compras en línea"><label class="form-check-label" for="formCheck-130">No realizo compras en línea<br></label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">¿Cuánto tiempo estima que utiliza la computadora para actividades diarias?:</h1>
            <p id="ERRpregunta35" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-131" name="3-pregunta5" value="7 horas o más al día"><label class="form-check-label" for="formCheck-131">7 horas o más al día</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-132" name="3-pregunta5" value="De 2 a 6 horas al día"><label class="form-check-label" for="formCheck-132">De 2 a 6 horas al día</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-133" name="3-pregunta5" value="De 2 a 6 horas a la semana"><label class="form-check-label" for="formCheck-133">De 2 a 6 horas a la semana</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-134" name="3-pregunta5" value="Menos de 2 horas a la semana"><label class="form-check-label" for="formCheck-134">Menos de 2 horas a la semana</label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">En promedio, ¿Cuánto dinero estima que gasta en compras en línea al mes?:</h1>
            <p id="ERRpregunta36" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-135" name="3-pregunta6" value="Menos de 1000"><label class="form-check-label" for="formCheck-135">Menos de 1,000</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-136" name="3-pregunta6" value="De 1000 a 2500"><label class="form-check-label" for="formCheck-136">De 1,000 a 2,500</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-137" name="3-pregunta6" value="De 2500 a 5000"><label class="form-check-label" for="formCheck-137">De 2,500 a 5,000</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-138" name="3-pregunta6" value="De 5000 a 7500"><label class="form-check-label" for="formCheck-138">De 5,000 a 7,500</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-139" name="3-pregunta6" value="De 7500 a 10000"><label class="form-check-label" for="formCheck-139">De 7,500 a 10,000</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-140" name="3-pregunta6" value="Más de 10000"><label class="form-check-label" for="formCheck-140">Más de 10,000</label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">Actualmente, ¿Compra más seguido en físico o en línea?:</h1>
            <p id="ERRpregunta37" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-141" name="3-pregunta7" value="En físico"><label class="form-check-label" for="formCheck-141">En físico</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-142" name="3-pregunta7" value="En línea"><label class="form-check-label" for="formCheck-142">En línea</label></div>
            </div>
            <h1 style="background: transparent;margin-left: -25px;padding-left: 0px;font-size: 30px;color: rgb(80, 94, 108);margin-top: 25px;">Sobre su bienestar...</h1>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">¿Desde que empezó la pandemia, ha presentado síntomas relacionados al COVID-19?:</h1>
            <p id="ERRpregunta41" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-143" name="4-pregunta1" value="Si"><label class="form-check-label" for="formCheck-143">Si</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-144" name="4-pregunta1" value="No"><label class="form-check-label" for="formCheck-144">No</label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">¿Usted sufre de alguna de las siguientes condiciones médicas?:</h1>
            <p id="ERRpregunta42" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-145" name="4-pregunta2[]" value="Diabetes"><label class="form-check-label" for="formCheck-145">Diabetes</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-146" name="4-pregunta2[]" value="Hipertensión"><label class="form-check-label" for="formCheck-146">Hipertensión<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-147" name="4-pregunta2[]" value="Obesidad"><label class="form-check-label" for="formCheck-147">Obesidad</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-148" name="4-pregunta2[]" value="Asma"><label class="form-check-label" for="formCheck-148">Asma</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-149" name="4-pregunta2[]" value="Condiciones cardíacas"><label class="form-check-label" for="formCheck-149">Condiciones cardíacas</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-150" name="4-pregunta2[]" value="Inmunodeficiencia"><label class="form-check-label" for="formCheck-150">Inmunodeficiencia</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-151" name="4-pregunta2[]" value="Hepatitis"><label class="form-check-label" for="formCheck-151">Hepatitis</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-152" name="4-pregunta2[]" value="Otro no listado"><label class="form-check-label" for="formCheck-152">Otro no listado</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-153" name="4-pregunta2[]" value="Ninguna condición medica"><label class="form-check-label" for="formCheck-153">Ninguna condición medica<br></label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">¿A causa de la pandemia usted se ha sentido relacionado con algunas de las siguientes situaciones?:<br></h1>
            <p id="ERRpregunta43" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-154" name="4-pregunta3[]" value="Ansiedad"><label class="form-check-label" for="formCheck-154">Ansiedad</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-155" name="4-pregunta3[]" value="Estrés"><label class="form-check-label" for="formCheck-155">Estrés<br></label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-156" name="4-pregunta3[]" value="Depresión"><label class="form-check-label" for="formCheck-156">Depresión</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-157" name="4-pregunta3[]" value="Défici de atención"><label class="form-check-label" for="formCheck-157">Déficit de atención</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-158" name="4-pregunta3[]" value="Baja de rendimiento laboral y/o académico"><label class="form-check-label" for="formCheck-158">Baja de rendimiento laboral y/o académico</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-159" name="4-pregunta3[]" value="Baja autoestima"><label class="form-check-label" for="formCheck-159">Baja autoestima</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-160" name="4-pregunta3[]" value="Otra no listada"><label class="form-check-label" for="formCheck-160">Otra no listada</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-161" name="4-pregunta3[]" value="No me he sentido afectado"><label class="form-check-label" for="formCheck-161">No me he sentido afectado<br></label></div>
            </div>
            <h1 style="font-size: 24px;color: rgb(80, 94, 108);">Durante la pandemia ¿Cómo ha cambiado su actividad física?:</h1>
            <p id="ERRpregunta44" class="Error"></p>
            <div class="form-group" style="padding-left: 25px;color: rgb(80, 94, 108);">
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-162" name="4-pregunta4" value="Aumentó"><label class="form-check-label" for="formCheck-162">Aumentó</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-163" name="4-pregunta4" value="Permaneció igual que antes"><label class="form-check-label" for="formCheck-163">Permaneció igual que antes</label></div>
                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-164" name="4-pregunta4" value="Disminuyo"><label class="form-check-label" for="formCheck-164">Disminuyo</label></div>
            </div>
            <button class="btn btn-primary btn-block col-md-2" type="submit" name="submit">Entregar</button>
        </form>
    </div>
    <script>
    document.getElementById("myForm").addEventListener("submit", function(event){
        event.preventDefault()
    });
    </script>    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/checked.js"></script>
</body>

</html>