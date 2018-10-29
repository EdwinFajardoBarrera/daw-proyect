<!DOCTYPE html>
<html>
<?php 
    $buscar = isset($_GET['buscar']) ?$_GET['buscar'] :"";
    $mostarImagenes = false;
    
    if($buscar != null) {
        
        $RUTA_ARCHIVO = '..\all_images.txt';
        $fpDatos = fopen($RUTA_ARCHIVO, 'r');

        if(!$fpDatos) {
            echo 'ERROR: No ha sido posble encontrar el archivo.';
            exit;
        }
        
        $contador = 0;
        $contImagen = 0;
        $numImagen = 0;
        while(!feof($fpDatos)) { 
            $contador++;

            $linea = fgets($fpDatos); 
            $field[$contador] = explode('|', $linea);
            
            foreach($field[$contador] as $imagen) {
               $imagen = substr($imagen, 0, - 1);
               
               if($buscar == $imagen) {
                   $mostarImagenes = true;
                   
                   $contImagen++;    
                   $resultados[$numImagen] = '<img src="DB/all_images/' . $buscar . $contImagen . '.jpg" class="acomodar" width="100%" height="400"> ' ;
                   $numImagen++;
               }
               
            }

            $fpDatos++;
        }
        
        
    }

?>
<head>
    <title>Resultados de búsqueda</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="carouselIndex.js"></script>
    <script src="scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="estilosInicio.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="styles.css" />
</head>

<body>
    <main>
        <!-- HEADER -->
        <iframe src="header.php" frameborder="0" width="100%" height="90"></iframe>

        <!-- Imágenes -->  
        <?php
            if ($mostarImagenes) {
                for($cont = 0; $cont < $numImagen; $cont++) {
                   echo $resultados[$cont];
                }
            } else {
                echo "<h1> No se encontraron imágenes :( </h1>";
            }
        ?>
     
        <!-- FOOTER -->
        <iframe src="footer.html" frameborder="0" width="100%" height="60"></iframe>

    </main>
</body>

</html>