<!DOCTYPE html>
<html>
<?php 
    require './Conexion/Conexion.php';

    $buscar = isset($_GET['buscar']) ?$_GET['buscar'] :"";
    $mostarImagenes = false;
    
    if($buscar != null) {
        $ctrlConexion = new QueryConsults();
        $conexion = $ctrlConexion->startConexion();
        $consulta = "SELECT * FROM images";
        $resultado = $conexion->query($consulta); 
        
        $numImagen = 0;
        while($columna = $resultado->fetch_assoc()) {   
            similar_text($buscar, $columna["imageName"], $porcentaje);
            
            if($porcentaje >= 70) {  
                $mostarImagenes = true;
                
                $resultados[$numImagen] = '<img src="DB/'. $columna["imageType"] . '/' . $columna["imageName"] . '' . $columna["imageExtension"] .'" '
                        . 'class="acomodar" width="100%" height="400"> ' ;
                $numImagen++;
            }
            
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