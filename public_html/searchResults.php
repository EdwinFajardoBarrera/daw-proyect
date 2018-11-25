<!DOCTYPE html>
<html>
<?php 
    require './Conexion/QueryConsults.php';

    $buscar = isset($_GET['buscar']) ?$_GET['buscar'] :"";
    $mostarImagenes = false;
    
    if($buscar != null) {
        $ctrlConexion = new QueryConsults();
        $conexion = $ctrlConexion->startConexion();
        $consulta = "SELECT * FROM images";
        $resultado = $conexion->query($consulta);
        $conexion->close();
        
        $numImagen = 0;
        while($columna = $resultado->fetch_assoc()) {   
            similar_text($buscar, $columna["imageName"], $porcentaje);
            
            if($porcentaje >= 70) {  
                $mostarImagenes = true;

                $resultados[$numImagen] = 
                        '
                         <div class="mbr-gallery-item mbr-gallery-item--p4" data-video-url="false" data-tags="Awesome">
                                    <div href="#lb-gallery1-h" data-slide-to="$i" data-toggle="modal"><img src="DB/' . $columna["imageType"] . '/' . $columna["imageName"] . '' . $columna["imageExtension"] .'" alt="Cinque Terre" width="400" height="350"><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7"><a
                                                href="http://www.google.com">Perfil de Artista</a> &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="http://www.google.com">Seguir</a></span>
                                    </div>
                         </div>
                         
                        ';
                        $carrousel[$numImagen] =
                        '<div class="carousel-item"><img src="DB/' . $columna['imageType'] . '/' . $columna["imageName"] . '' . $columna["imageExtension"] .'" alt="Cinque Terre" width="500" height="500"></div>';
                $numImagen++;
            }
            
        }
        
    }

?>
<head>
    <title>Resultados de búsqueda</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="assets/gallery/style.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <!-- <script src="carouselIndex.js"></script> -->
    <!-- <script src="scripts.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="estilosInicio.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="styles.css" /> -->
</head>

<body>
    <?php
            include 'headerN.php';
    ?>
    <section class="mbr-section content5 cid-racjG1Jao3 mbr-parallax-background" id="content5-k">
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-8">
                    <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">Resultados de tu busqueda&nbsp;</h2>
                    <h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5">
                        Inreíble :o
                    </h3>
                </div>
            </div>
        </div>
    </section>

        <!-- Imágenes --> 
    <section class="mbr-gallery mbr-slider-carousel cid-racgjri4yx" id="gallery1-h">
        <div class="container">
            <div>
                <!-- Gallery -->
                <div class="mbr-gallery-row">
                    <div class="mbr-gallery-layout-default">
                        <div>
                            <div>      
                            <?php
                                if ($mostarImagenes) {
                                    for($cont = 0; $cont < $numImagen; $cont++) {
                                        echo $resultados[$cont];
                                    }
                                } else {
                                    echo "<h1> No se encontraron imágenes :( </h1>";
                                }
                            ?>   
                            </div>
                        <div class="clearfix"></div>
                    </div>
                </div><!-- Lightbox -->
                <div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1"
                    data-keyboard="true" data-interval="false" id="lb-gallery1-h">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="carousel-inner">
                                    <?php
                                        for($cont = 0; $cont < $numImagen; $cont++) {
                                           echo $carrousel[$cont];
                                        }
                                    ?>  
                                    <div class="carousel-item active"><img src="assets/images/gallery00.jpg" alt="" title=""></div>
                                </div><a class="carousel-control carousel-control-prev" role="button" data-slide="prev"
                                    href="#lb-gallery1-h"><span class="mbri-left mbr-iconfont" aria-hidden="true"></span><span
                                        class="sr-only">Previous</span></a><a class="carousel-control carousel-control-next"
                                    role="button" data-slide="next" href="#lb-gallery1-h"><span class="mbri-right mbr-iconfont"
                                        aria-hidden="true"></span><span class="sr-only">Next</span></a><a class="close"
                                    href="#" role="button" data-dismiss="modal"><span class="sr-only">Close</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     
        <!-- FOOTER -->
        <?php
            include 'footer.html';
        ?>

    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/tether/tether.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
    <script src="assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
    <script src="assets/parallax/jarallax.min.js"></script>
    <script src="assets/smoothscroll/smooth-scroll.js"></script>
    <script src="assets/masonry/masonry.pkgd.min.js"></script>
    <script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/dropdown/js/script.min.js"></script>
    <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
    <script src="assets/theme/js/script.js"></script>
    <script src="assets/slidervideo/script.js"></script>
    <script src="assets/gallery/player.min.js"></script>
    <script src="assets/gallery/script.js"></script>
</body>

</html>