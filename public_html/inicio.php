<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    
    require './Conexion/QueryConsults.php';
    
    if(isset($_COOKIE['user'])){
    echo '<script>alert("Recordando usuario: '.$_COOKIE['user'].'");</script>';
    } else {echo '<script>alert("No se detecto cookie");</script>';}
    
    ?>
    
    <head>
        <title>Inicio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="scripts.js"></script>
        <link rel="stylesheet" type="text/css" href="estilosInicio.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="styles.css" />
    </head>

    <body>
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

                $ctrlConexion = new QueryConsults();
                
                $conexion = $ctrlConexion->startConexion();
                $consulta = "SELECT Images.id, Images.`imageName`, Images.`imageExtension`, Images.`imageType`, Profile.`name`
                    FROM Images JOIN Posts JOIN Profile ON Images.id = posts.id_image AND posts.id_profile = profile.id ;";
                $resultado = $conexion->query($consulta);
                $conexion->close();

                $numImagen = 0;
                while ($columna = $resultado->fetch_assoc()) {
                    $idImageArray[$numImagen] = $columna["id"];
                    $todasLasImagenes[$numImagen] = 
                            '<div class="mySlides fade">
                                <img src="DB/' . $columna["imageType"] . '/' . $columna["imageName"] . $columna["imageExtension"] . '" width="100%" height="500">
                            </div>';
                            
                    $numImagen++;
                }
                for ($cont = 0; $cont < $numImagen; $cont++) {
                    echo $todasLasImagenes[$cont];
                }
                ?>
                <!-- botones siguiente y anterior -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <?php
            include "./Controller/ControlComment.php";
            ?>
        </main>
        <iframe src="footer.html" frameborder="0" width="100%" height="70"></iframe>
    </body>

</html>