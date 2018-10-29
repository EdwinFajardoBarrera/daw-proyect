<html lang="en">

<head>
    <title> Registro </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./estilosInicio.css">
    <link rel="stylesheet" type="text/css" href="./loginStyle.css">
    <script type="text/javascript" src="loginScript.js"></script>

</head>

<body>
    <main>
        <!-- HEADER -->
        <iframe src="header.php" frameborder="0" width="100%" height="90"></iframe>

        <div class="registro" id="registroDiv">
            <form id="registroForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="form" value="create">
                <p class="subtitle">Registrarse</p>
                <input type="name" id="nombre" name="name" placeholder="Nombre">
                <input type="name" id="apellido" name="last_name" placeholder="Apellido">
                <input type="text" id="usuarioRegistro" name="username" placeholder="Nombre de usuario">
                <input type="text" id="correo" name="email" placeholder="Correo electrónico">
                <input type="password" id="contraseñaRegistro" name="password" placeholder="Contraseña">
                <input type="password" id="confirmacionContraseñaRegistro" name="contraseñaRegistro" placeholder="Confirmar contraseña">
                <!--<input type="submit" value="Crear cuenta">-->
                <input onclick = "validarRegistro()" type="submit" value="Crear">
            </form>
        </div>


        <div class="acceder">
            <form id="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="hidden" name="form" value="login">
                <p class="subtitle">Acceder</p>
                <input type="text" id="usuarioAcceso" name="user" placeholder="Nombre de usuario">
                <input type="password" id="contraseñaAcceso" name="password" placeholder="Contraseña">
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
            }

            if (($_SERVER["REQUEST_METHOD"] == "POST") && $_POST['form'] == "login") {
                $user = $_POST["user"];
                $password = $_POST["password"];
                $correct_login =  $instancia->isValidLogin($user, $password);
                if ($correct_login) {
                    header('Location: inicio.php');
                    $instancia->session($user);
                }    
            }

        ?>

    </main>
    <iframe src="footer.html" frameborder="0" width="100%" height="60"></iframe>

</body>

</html>