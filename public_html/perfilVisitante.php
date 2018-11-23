<!DOCTYPE <!DOCTYPE html>
    <?php
    if (!isset($_GET['user'])) {
        header('refresh:0; url=inicio.php');
    } 
    include 'Conexion/QueryConsults.php';    

    $owner = $_GET['user'];
    $ctrlConexion = new QueryConsults();
    $username = $ctrlConexion->getNombreUsuario($owner);
    if($username == " "){
        echo '<script>alert("El usuario no existe");</script>';
        header('refresh:0; url=inicio.php');
    }
    
    $comentario = $ctrlConexion->getDescripcionUsuario($owner);
    $rate = $ctrlConexion->getRateUsuario($owner);
    $imagenes = $ctrlConexion->getImagesForUserInv($owner);
    ?>
    <html>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Web Got Talent - Artista #653</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" media="screen" href="styles.css" />
            <link rel="stylesheet" type="text/css" href="estilosInicio.css" />

        </head>

        <body>
            <main style="height:900px; ">
                <iframe src="header.php" frameborder="0" width="100%" height="90"></iframe>
                <div>
                    <div>
                        <div id="div_izq">
                            <img id="fotoPerfil" src="icons/perfil.png" width="50" height="200">

                            <p><?= utf8_encode($username) ?></p>
                            <br>
                        </div>
                        <div id="div_der">
                            <div style="float: left">
                                <p>Critics Score</p>
                                <br>
                                <p id="puntuaciones"><?= $rate ?>%</p>

                            </div>
                            <div style="float:right">
                                <p> User Score</p>
                                <br>
                                <p id="puntuaciones">97%</p>
                            </div>
                        </div>

                        <div id="div_descrip"><?= $comentario ?></div>
                    </div>

                    <div style="margin-left:10rem; margin-right: 10rem;">
                        <?php
                        if (count($imagenes) <= 0) {
                            echo'
                            <div style="margin-left:10rem; margin-right: 10rem;">
                                <div class="titulo">
                                    <p>El usuario aún no sube imagenes</p>
                                </div>
                            </div>';
                        } else {
                            //Genera las imagenes
                            echo '<div class="content">';
                            for ($cont = 0; $cont < count($imagenes); $cont++) {
                                echo $imagenes[$cont];
                            }
                            echo '</div>';
                        }
                        ?>
                    </div>

                </div>



                </div>
                </div>

            </main>
            <iframe src="footer.html" frameborder="0" width="100%" height="60"></iframe>

        </body>

    </html>