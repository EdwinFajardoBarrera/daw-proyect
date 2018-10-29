<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
        $RUTA_ARCHIVO = '../designs.txt';
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
                    $todasLasImagenes[$numImagen] = 
                        '
                         <div class="responsive">
                            <div class="gallery container">
                              <div class="image-header">
                                <span style="float:left"><a href="#">Artista</a></span><span style="float:right"><a href="perfilVisitante.html">Seguir</a></span>
                              </div>
                                  <a target="_blank" href="DB/desings/' . $imagen . '.jpg">
                                <img src="DB/designs/' . $imagen . '.jpg" alt="Cinque Terre" width="100%" height="400">
                              </a>
                              <div class="desc">Descripcion</div>
                            </div>
                          </div> 
                        ';
                    
                    $numImagen++;
                }


            }

            $fpDatos++;

        }
    ?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Diseño grafico</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="styles.css" />
        <!-- <script src="main.js"></script> -->
    </head>
    <body>
        <iframe src="header.php" frameborder="0" width="100%" height="90"></iframe>
        
        <!-- Genera las imagenes -->
        <div class="content">
            <?php
                for($cont = 0; $cont < $numImagen; $cont++) {
                   echo $todasLasImagenes[$cont];
                }
            ?>
        </div>
        
        <iframe src="footer.html" frameborder="0" width="100%" height="60"></iframe>
    </body>
</html>
