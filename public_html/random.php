<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    session_start();
    require './Conexion/QueryConsults.php';

    $ctrlConexion = new QueryConsults();
    $conexion = $ctrlConexion->startConexion();
    $consulta = "SELECT * FROM images";
    $resultado = $conexion->query($consulta);
    $conexion->close();

    $numImagen = 0;
    while ($columna = $resultado->fetch_assoc()) {
        $todasLasImagenes[$numImagen] = 
                '<div class="mySlides fade">
                    <img src="DB/' . $columna["imageType"] . '/' . $columna["imageName"] . '' . $columna["imageExtension"] . '" width="100%" height="500">
                 </div>';
        $numImagen++;
    }
    ?>

    <head>
        <title>Inicio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php
        include 'headerN.php';
        ?>
        <div>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="DB/3Ddesigns/3ddesign6.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="DB/draws/cantante4.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="DB/designs/Mi Horario.png" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>

        <?php
        include 'footer.html';
        ?>
    </body>

</html>