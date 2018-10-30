<html lang="es">

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
                <form id="registroForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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

                <div><?php
                    // include("validarRegistro.php");             
                    // echo "<p class= 'error'> $error_nombreLargo </p>";
                    // echo "<p class= 'error'> $error_nombreInvalido </p>";
                    // echo "<p class= 'error'> $error_apellidoLargo </p>";
                    // echo "<p class= 'error'> $error_apellidoInvalido </p>";
                    // echo "<p class= 'error'> $error_usuarioLargo </p>";
                    // echo "<p class= 'error'> $error_usuarioInvalido </p>";
                    // echo "<p class= 'error'> $error_correoInvalido </p>";                    
                    // echo "<p class= 'error'> $error_contraseñaNoCoincide </p>";
                    // echo "<p class= 'error'> $error_contraseñaCorta </p>";                    
                    ?>
                </div>

                </form>   

            </div>



            <div class="acceder">
                <form id="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="form" value="login">
                    <p class="subtitle">Acceder</p>
                    <input type="text" id="usuarioAcceso" name="user" placeholder="Nombre de usuario">
                    <input type="password" id="contraseñaAcceso" name="password" placeholder="Contraseña">
                    <input type="checkbox" id="recordarUsuarioChBox" name="recordarUsuario" value="valor1">Recordarme en este equipo
                    <input type="submit" value="Acceder">
                </form>
            </div>

            <?php
            require "./Models/User.php";
            $instancia = new User();

            if (($_SERVER["REQUEST_METHOD"] == "POST") && $_POST['form'] == "create") {
                $name = $_POST["name"];
                $last_name = $_POST["last_name"];
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

                $instancia->setName($name);
                $instancia->setLastName($last_name);
                $instancia->setUsername($username);
                $instancia->setEmail($email);
                $instancia->setPassword($password);

                $instancia->keepData($instancia);

                //$name = $_POST['name'];
                //$password = $_POST['password'];
                $captcha = $_POST['g-recaptcha-response'];

                $secret = '6LdJRXcUAAAAALouIjSUxXaQmAEuYLqLgnPHv7wG';

                if (!$captcha) {

                    echo "<script>
                     alert('No verificaste el captcha... Robot?');
                     window.location= 'login.php'
                        </script>";
                } else {

                    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

                    $arr = json_decode($response, TRUE);

                    if (!$arr['success']) {
                        echo '<h3>Error al comprobar Captcha </h3>';
                    }
                }
            }

            if (($_SERVER["REQUEST_METHOD"] == "POST") && $_POST['form'] == "login") {
                $name = $_POST["user"];
                $password = $_POST["password"];
                $correct_login = $instancia->isValidLogin($name, $password);
                if ($correct_login) {
                    header('Location: inicio.php');
                    //Cookie que se destruirá en 1 dia
                    setcookie($name,$password,time() + 1*(60*60*24));
                }
                
                if(isset($_POST['recordarUsuario'])) {
                    echo "<script>
                     alert('Se recordará el usuario');
                     window.location= 'login.php'
                        </script>";
                }
            }
            ?>

        </main>
        <iframe src="footer.html" frameborder="0" width="100%" height="60"></iframe>

    </body>

</html>