<html lang="es">
    <?php
    session_start();
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
            
            <section class="menu cid-ra9b0gb1Mf" once="menu" id="menu1-1">
                <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                </button>
                <div class="menu-logo">
                    <div class="navbar-brand">

                    <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-5" href="indexN.php">W.G.T</a></span>
                    <form action="" method="post" autocomplete="off" id="form-search">
                        <input id="searchBox" type="text" name="search" placeholder="Buscar en W.G.T">
                    </form>
                </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">

                    <li class="nav-item"><a class="nav-link link text-white display-4" href="dibujos.html"><span class="mobi-mbri mobi-mbri-edit-2 mbr-iconfont mbr-iconfont-btn"></span>
                        </a></li>
                    <li class="nav-item"><a class="nav-link link text-white display-4" href="Disenografico.html"><span
                                class="mbrib-desktop mbr-iconfont mbr-iconfont-btn"></span>
                        </a></li>
                    <li class="nav-item"><a class="nav-link link text-white display-4" href="3D.html"><span class="mobi-mbri mobi-mbri-delivery mbr-iconfont mbr-iconfont-btn"
                                style="font-size: 25px;"></span>
                        </a></li>
                </ul>
                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-success-outline display-7" href="contacto.html"><span
                            class="mbri-touch mbr-iconfont mbr-iconfont-btn"><br></span>
                    </a> <a class="btn btn-sm btn-primary display-7" href="login.php"><span class="mbri-login mbr-iconfont mbr-iconfont-btn"></span>
                        Log in</a></div>
            </div>
        </nav>
    </section>

            <div class="registro" id="registroDiv">
                <form id="registroForm" method="post" action="Migrations/createProfile.php">
                    <input type="hidden" name="form" value="create">
                    <p class="subtitle">Registrarse</p>
                    <input type="name" id="nombre" name="name" placeholder="Nombre" required>
                    <input type="name" id="apellido" name="last_name" placeholder="Apellido" required>
                    <input type="text" id="usuarioRegistro" name="username" placeholder="Nombre de usuario" required>
                    <input type="text" id="correo" name="email" placeholder="Correo electrónico" required>
                    <input type="password" id="contraseñaRegistro" name="password" placeholder="Contraseña" required>
                    <input type="password" id="confirmacionContraseñaRegistro" name="contraseñaRegistro" placeholder="Confirmar contraseña" required>
                    <!--<input type="submit" value="Crear cuenta">-->
                    <div class="g-recaptcha" data-sitekey="6LdJRXcUAAAAAJp03Cr-TYpBxbYQESnKAOg5Em3o"></div>  
                    <input onclick = validarRegistro(); type="submit" value="Crear" name="submitRegistro">

                </form>

                </form>   

            </div>



            <div class="acceder">
                <form id="login" method="post" action="login.php">
                    <input type="hidden" name="form" value="login">
                    <p class="subtitle">Acceder</p>
                    <input type="text" id="usuarioAcceso" name="user" placeholder="Nombre de usuario" required>
                    <input type="password" id="contraseñaAcceso" name="password" placeholder="Contraseña"required>
                    <input type="checkbox" id="recordarUsuarioChBox" name="recordar" value=1> Recordarme en este equipo
                    <input type="submit" value="Acceder">
                </form>
            </div>

            <?php
            if (($_SERVER["REQUEST_METHOD"] == "POST") && $_POST['form'] == "create") {

                $captcha = $_POST['g-recaptcha-response'];

                $secret = '6LdJRXcUAAAAALouIjSUxXaQmAEuYLqLgnPHv7wG';

                if (!$captcha) {

                    echo "<script>
                     alert('No verificaste el captcha... Robot?');
                     window.location= 'index.php'
                        </script>";
                } else {

                    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

                    $arr = json_decode($response, TRUE);

                    if (!$arr['success']) {
                        echo '<h3>Error al comprobar Captcha </h3>';
                    }
                }
            }
            ?>
        </main>
        <section once="" class="cid-ra9iqqZfZS" id="footer6-8">





        <div class="container">
            <div class="media-container-row align-center mbr-white">
                <div class="col-12">
                    <p class="mbr-text mb-0 mbr-fonts-style display-7">
                        © Copyright 2018 Web Got Tallent - All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </section>

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