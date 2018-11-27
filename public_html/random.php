<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
//    session_start();
//    if (!isset($_SESSION['Username'])) {
//        echo "<script>
//        alert('No existe una sesión activa');
//        window.location= 'login.php'
//        </script>;";
//    }
    
    require './Conexion/QueryConsults.php';
    
    $ctrlConexion = new QueryConsults();
    $conexion = $ctrlConexion->startConexion();
    $consulta = "SELECT * FROM images";
    $resultado = $conexion->query($consulta);
    $conexion ->close();
    
    $numImagen = 0;
    while($columna = $resultado->fetch_assoc()) {  
        $todasLasImagenes[$numImagen] = '<div class="mySlides fade">
                                            <img src="DB/'. $columna["imageType"] . '/' . $columna["imageName"] . '' . $columna["imageExtension"] .'" width="100%" height="500">
                                         </div>';
        $numImagen++;
    }
    
    ?>
    
    <head>
        <title>Inicio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/carrousel.js"></script>
        <link rel="stylesheet" type="text/css" href="estilosInicio.css" />
    </head>

    <body>
    <?php
        include 'headerN.php';
    ?>
    <div>
        <main>
           
            <br><br><br>
            <br><br><br>
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
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </main>

    </div>

        <?php
        include 'footer.html';
    ?>
    </body>

</html>