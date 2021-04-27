<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    if(!isset($_SESSION["ID_Usuario"])){
        header("location: login.php");
    exit();
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

</html>