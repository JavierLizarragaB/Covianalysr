<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Coroanalyst</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="color: rgb(241, 247, 252);padding: 80px;background: rgb(241, 247, 252);">
    <section class="register-photo" style="padding: 0px;margin: 0px;background: rgb(241, 247, 252);color: rgb(241, 247, 252);">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="POST" action="server/signin.php">
                <h2 class="text-left">Crear&nbsp;cuenta.</h2>
                <?php 
                    if (isset($_GET["error"])) {
                        if ($_GET["error"]=="emptyinput"){
                            echo "<p class='Error'>* Porfavor llene todos los campos</p>";
                        } else if ($_GET["error"] === "invalidemail"){
                            echo "<p class='Error'>*Direccion de correo no valido</p>";
                        } else if ($_GET["error"] === "passwordsdontmatch"){
                            echo "<p class='Error'>*Las contrasenas no coinciden</p>";
                        } else if ($_GET["error"] === "userexists"){
                            echo "<p class='Error'>* Este correo ya fue utilizado</p>";
                        } else if ($_GET["error"] === "stmtfailed"){
                            echo "<p class='Error'>*Algo salio mal, porfavor intente mas tarde</p>";
                        }else if ($_GET["error"] === "terminos"){
                            echo "<p class='Error'>*Porfavor lea y acepte los Terminos y Condiciones</p>";
                        }
                    }
                ?>
                <div class="form-group"><input class="form-control" type="text" id="Correo" name="Correo" placeholder="Correo"></div>
                <div class="form-group"><input class="form-control" type="password" id="Contraseña" name="Contraseña" placeholder="Contraseña"></div>
                <div class="form-group"><input class="form-control" type="password" id="Confirmar-Contraseña" name="Confirmar-Contraseña" placeholder="Confirmar contraseña"></div>
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label d-inline"><input class="form-check-input" type="checkbox" name="AceptarTerminos" value="terminosCondiciones">Acepto&nbsp;<a class="text-primary d-inline-block already" href="termsadconditions.phtml"><span style="text-decoration: underline;">Términos y Condiciones.</span></a></label></div>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" id="submit" name="submit" type="submit">Sign in</button>
                    <div class="form-check"><label class="form-check-label d-inline"><input class="form-check-input" type="checkbox" name="Recordar" value="Recuerdame">Recuerdame&nbsp;</label></div>
                </div><a class="text-primary already" href="login.php">Ya tienes una cuenta? Haz Log in aquí.</a>
            </form>
        </div>
    </section>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>