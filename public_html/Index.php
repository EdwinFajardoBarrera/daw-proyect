<html lang="es">
    <?php
    session_start();
    // $_SESSION['count'];
    if (isset($_SESSION['Username'])) {
        header('Location: inicio.php');
    }
    ?>
    <head>  
        <title> Registro </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
        <link rel="stylesheet" href="assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
        <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
        <link rel="stylesheet" href="assets/tether/tether.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="assets/dropdown/css/style.css">
        <link rel="stylesheet" href="assets/theme/css/style.css">
        <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="./estilosInicio.css">
        <link rel="stylesheet" type="text/css" href="./loginStyle.css">
        <script src="ajaxScripts.js"></script>
        <script type="text/javascript" src="loginScript.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>

    <body>
        <main>
            <!-- HEADER -->     
            <?php
                include 'headerN.php';
            ?>
            <!--REGISTER FORM-->
            <div class="registro" id="registroDiv">
                <form id="registroForm" method="post" action="Migrations/createProfile.php">
                    <input type="hidden" name="form" value="create">
                    <p class="subtitle"> Registrarse</p>
                    <input type="name" id="nombre" name="name" placeholder="Nombre" required>
                    <input type="name" id="apellido" name="last_name" placeholder="Apellido" required>
                    <input type="text" id="usuarioRegistro" name="username" placeholder="Nombre de usuario" required>
                    <input type="email" id="correo" name="email" placeholder="Correo electrónico" required>
                    <input type="password" id="contraseñaRegistro" name="password" placeholder="Contraseña" required>
                    <input type="password" id="confirmacionContraseñaRegistro" name="passwordConfirm" placeholder="Confirmar contraseña" required>
                    <div class="g-recaptcha" data-sitekey="6LdJRXcUAAAAAJp03Cr-TYpBxbYQESnKAOg5Em3o"></div>  
                    <input onclick="validarRegistro()" type="submit" value="Crear cuenta" name="submitRegistro">
                </form>
            </div>      

            <div class="acceder">
                <form id="login" method="post" action="login.php">
                    <input type="hidden" name="form" value="login">
                    <p class="subtitle">Acceder</p>
                    <input type="text" id="usuarioAcceso" name="user" placeholder="Nombre de usuario" required>
                    <input type="password" id="contraseñaAcceso" name="password" placeholder="Contraseña"required>
                    <input type="checkbox" id="recordarUsuarioChBox" name="remember"> Recordarme en este equipo
                    <input type="submit" value="Acceder">
                </form>
            </div>
        </main>
        <?php
            include 'footer.html';
        ?>

    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/tether/tether.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/smoothscroll/smooth-scroll.js"></script>
    <script src="assets/dropdown/js/script.min.js"></script>
    <script src="assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
    <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
    <script src="assets/theme/js/script.js"></script>
    <script src="assets/slidervideo/script.js"></script>

    </body>

</html>