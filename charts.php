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

<body>
    <nav style="background: rgb(241, 247, 252);" class="navbar justify-content-end">
            <form method="POST" action="AboutUs.php">
                <button class="btn btn-primary btn-block" style="background:#f4476b;border:none;" type="submit" name="submit">About Us</button>
            </form>
            <form method="POST" action="server/logout.php">
                <button class="btn btn-primary btn-block" style="background:#f4476b;border:none;" type="submit" name="submit">Log out</button>
            </form>
    </nav>
</body>

</html>