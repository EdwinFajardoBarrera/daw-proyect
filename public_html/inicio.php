<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<?php
    $RUTA_ARCHIVO = 'C:\xampp\htdocs\daw-proyect\all_images.txt';
    $fpDatos = fopen($RUTA_ARCHIVO, 'r');

    if(!$fpDatos) {
        echo 'ERROR: No ha sido posble encontrar el archivo.';
        exit;
    }
    
    $contador = 0;
    $numImagen = 0;
    while(!feof($fpDatos)) { 
        $linea = fgets($fpDatos); 
        $field[$contador] = explode('|', $linea);
        
        foreach($field[$contador] as $imagen) { 
            
            $imagen = trim($imagen);
            
            if($imagen != "") {
                $todasLasImagenes[$numImagen] = '<div class="mySlides fade">
                                            <img src="DB/all_images/' . $imagen . '.jpg" width="100%" height="500">
                                            <iframe class="area-comentarios" src="comentarios.html" frameborder="0" width="100%" height="90"></iframe>
                                          </div>' ;
                $numImagen++;
            }
            
           
        }

        $fpDatos++;
        
    }
?>
<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="estilosInicio.css" />
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
                <iframe class="area-comentarios" src="comentarios.html" frameborder="0" width="100%" height="90"></iframe>
            </div>

            <!-- genera imágenes de forma dinámica -->
            <?php
                for($cont = 0; $cont < $numImagen; $cont++) {
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