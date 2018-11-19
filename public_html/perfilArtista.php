<?php
session_start();
if (!isset($_SESSION['Username'])) {
    echo "<script>
        alert('No existe una sesión activa');
        window.location= 'login.php'
        </script>;";
}

require './Conexion/Conexion.php';

$ctrlConexion = new Conexion();
$conexion = $ctrlConexion->startConexion();
$username = $ctrlConexion->getNombreUsuario($_SESSION['Username'], $conexion);
$conexion = $ctrlConexion->startConexion();
$comentario = $ctrlConexion->getDescripcionUsuario($_SESSION['Username'], $conexion);
?>
<html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Perfil de <?= $username ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="styles.css" />
        <link rel="stylesheet" type="text/css" href="estilosInicio.css" />
        <script type="text/javascript" src="scripts.js"></script>

    </head>
    <body>
        <main style="height:900px; ">
            <iframe src="header.php" frameborder="0" width="100%" height="90"></iframe>
            <div>
                <div>
                    <div>
                        <div id="div_izq">
                            <img id="fotoPerfil" src="icons/perfil.png" width="50" height="200">

                            <p id="nombreUsuario"><?php echo $username ?><a class="button-edit" id="change-name-btn" onclick="editName()">Editar</a></p>
                            <br>
                        </div>
                        <div id="div_der">
                            <div style="float: left">
                                <p>Critics Score</p>
                                <br>
                                <p id="puntuaciones">0%</p>

                            </div>
                            <div style="float:right">
                                <p> User Score</p>
                                <br>
                                <p id="puntuaciones">0%</p>
                            </div>
                        </div>

                        <div id="div_descrip">
                            <div id="edit-description-button"><a class="button-edit" id="change-info-button" onclick="editInfo()">Editar</a></div>
                            <!-- Futura consulta a BD !-->
                            <p id="description-pane"><?= $comentario ?></p>
                            <br>
                        </div>
                    </div>

                    <div style="margin-left:10rem; margin-right: 10rem;">
                        <div class="titulo">
                            <p>Sube algunas imagenes para que el mundo empiece a conocerte</p>
                        </div>

                    </div>

                </div>
            </div>

        </main>
        <iframe src="footer.html" frameborder="0" width="100%" height="60"></iframe>

    </body>

</html>