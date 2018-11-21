<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    
    require './Conexion/QueryConsults.php';
    
    $ctrlConexion = new QueryConsults();
    
    if(isset($_COOKIE['user'])){
    echo '<script>Recordando usuario</script>';
    } else {echo '<script>No se detecto cookie</script>';}
    
    $conexion = $ctrlConexion->startConexion();
    $consulta = "SELECT Images.`imageName`, Images.`imageExtension`, Images.`imageType`, Profile.`name`
FROM Images JOIN Posts JOIN Profile ON Images.id = posts.id_image AND posts.id_profile = profile.id ;";
    $resultado = $conexion->query($consulta);
    $conexion ->close();
    
    $numImagen = 0;
    while($columna = $resultado->fetch_assoc()) {  
        $todasLasImagenes[$numImagen] = '<div class="mySlides fade">
                                              <div class="image-header">
                                                  <span style="float:left"><a href="#">'.$columna["name"].'</a></span><span style="float:right"><a href="perfilVisitante.php">Seguir</a></span>
                                              </div>
                                            <img src="DB/'. $columna["imageType"] . '/' . $columna["imageName"] . '' . $columna["imageExtension"] .'" width="100%" height="500">
                                           <iframe class="area-comentarios" src="comentarios.php" frameborder="0" width="100%" height="90"></iframe>
                                         </div>';
        $numImagen++;
    }
    
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
            <iframe src="header.php" frameborder="0" width="100%" height="90"></iframe>

            <!-- contenedor carousel -->
            <div class="slideshow-container">

                <!-- imágenes -->
                <div class="mySlides fade" style="display: block;">
                    <img src="DB/designs/design3.jpg" width="100%" height="500">
                    <iframe class="area-comentarios" src="comentarios.php" frameborder="0" width="100%" height="90"></iframe>
                </div>

                <!-- genera imágenes de forma dinámica -->
                <?php
                for ($cont = 0; $cont < $numImagen; $cont++) {
                    echo $todasLasImagenes[$cont];
                }
                ?>

                <!-- botones siguiente y anterior -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </main>
        <iframe src="footer.html" frameborder="0" width="100%" height="60"></iframe>
    </body>

</html>