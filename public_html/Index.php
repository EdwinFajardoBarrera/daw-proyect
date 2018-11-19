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
        <link rel="stylesheet" type="text/css" href="./estilosInicio.css">
        <link rel="stylesheet" type="text/css" href="./loginStyle.css">
        <script type="text/javascript" src="loginScript.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>

    </head>

    <body>
        <main>
            <!-- HEADER -->
            <iframe src="header.php" frameborder="0" width="100%" height="90"></iframe>

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
                <form id="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="form" value="login">
                    <p class="subtitle">Acceder</p>
                    <input type="text" id="usuarioAcceso" name="user" placeholder="Nombre de usuario" required>
                    <input type="password" id="contraseñaAcceso" name="password" placeholder="Contraseña"required>
                    <input type="checkbox" id="recordarUsuarioChBox" name="recordarUsuario" value="valor1">Recordarme en este equipo
                    <input type="submit" value="Acceder">
                </form>
            </div>

            <?php
            require "./Models/User.php";
            require './Conexion/Conexion.php';
            $instancia = new User();

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

            if (($_SERVER["REQUEST_METHOD"] == "POST") && $_POST["form"] == "login") {

                $ctrlConexion = new Conexion();
                $user = $_POST["user"];
                $password = $_POST["password"];

                // establecer y realizar consulta. guardamos en variable.
                $conexion = $ctrlConexion->startConexion();
                $consulta = 'SELECT O.`name`, P.password
                        FROM profiledata P, profile O
                        WHERE P.id = O.id ;';
                $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");
                $columna = mysqli_fetch_array($resultado);

                if ($user == $columna['name'] && $password == $columna['password']) {
                    session_start();
                    session_cache_expire(1);
                    $_SESSION['Username'] = $user;
                    echo "<script>
                     alert('Se inició sesión exitosamente');
                     window.location= 'inicio.php'
                        </script>";
                    header('Location: inicio.php');
                } else {

                    if ($user == $columna['name']) {
                        echo "<script>
                         alert('Contraseña incorrecta');
                         window.location= 'index.php'
                            </script>;";
                    } else {
                        echo "<script>
                         alert('No existe el usuario');
                         window.location= 'index.php'
                            </script>;";
                    }
                }

                $ctrlConexion ->closeConexion($conexion);
            }
            ?>

        </main>
        <iframe src="footer.html" frameborder="0" width="100%" height="60"></iframe>

    </body>

</html>