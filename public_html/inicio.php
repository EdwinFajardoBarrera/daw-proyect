<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    require './Conexion/QueryConsults.php';
    session_start();
    $ctrlConexion = new QueryConsults();
    if (isset($_SESSION['Username'])) {
        $username = $_SESSION['Username'];
    } else {
        $username = null;
    }
    
    $conexion = $ctrlConexion->startConexion();
    $consulta = "SELECT Images.id, Images.`imageName`, Images.`imageExtension`, Images.`imageType`, Profile.`name`
                    FROM Images JOIN Posts JOIN Profile ON Images.id = posts.id_image AND posts.id_profile = profile.id ORDER BY id;";
    $resultado = $conexion->query($consulta);
    $conexion->close();

    $numImagen = 0;
    while ($columna = $resultado->fetch_assoc()) {
        $todasLasImagenes[$numImagen] = '<div class="mySlides fade">
                    <img src="DB/' . $columna["imageType"] . '/' . $columna["imageName"] . $columna["imageExtension"] . '" width="100%" height="500">
                </div>';

        $numImagen++;
    }
    ?>

    <head>
        <title>Inicio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="scripts.js"></script>
        <script src="Js/comentariosInicio.js"></script>
        <link rel="stylesheet" type="text/css" href="estilosInicio.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="styles.css" />
    </head>

    <body onload="setNumMaxIdImage(<?= count($todasLasImagenes) ?>); setIdImage(0);">
        <main>
            <!-- HEADER -->
            <iframe src="header.php" frameborder="0" width="100%" height="100"></iframe>

            <!-- contenedor carousel -->
            <div class="slideshow-container">

                <!-- imágenes -->
                <div class="mySlides fade" style="display: block;">
                    <img src="DB/designs/design3.jpg" width="100%" height="500">
                </div>
                <!-- genera imágenes de forma dinámica -->
                <?php
                for ($cont = 0; $cont < $numImagen; $cont++) {
                    echo $todasLasImagenes[$cont];
                }
                ?>
                <!-- botones siguiente y anterior -->
                <a class="prev" onclick="plusSlides(-1); setIdImage(getIdImage() - 1); chargeComments(getIdImage())">&#10094;</a>
                <a class="next" onclick="plusSlides(1); setIdImage(getIdImage() + 1); chargeComments(getIdImage())">&#10095;</a>
            </div>

            <div id="comment-div">
                <p id="tex-tittle">Comentarios</p>
                <p id="area-comentarios">
                    <!comentarios se cargan aquí------------------------------------------------------------------------------>
                </p>   
                <div style="float: center; text-align: center">
                    <textarea id="commentBox" rows="4" cols="54" placeholder="Añadir comentario público"></textarea>
                    <input type="button" id="comentar-btn" style="float: left;" value="Comentar" onclick="agregarComentario('<?=$username?>', getIdImage())">
                </div>
            </div>
        </main>
        <iframe src="footer.html" frameborder="0" width="100%" height="70"></iframe>
    </body>

</html>