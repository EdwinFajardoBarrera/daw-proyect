<?php
    session_start();
    
        require './Conexion/QueryConsults.php';    
        $ctrlConexion = new QueryConsults();
        $conexion = $ctrlConexion->startConexion();
        $consulta = "SELECT * FROM images WHERE imageType='designs'";
        $resultado = $conexion->query($consulta);
        $conexion->close();
     
        $numImagen = 0;
        while($columna = $resultado->fetch_assoc()) {  
            
            $todasLasImagenes[$numImagen] = 
                        '
                         <div class="mbr-gallery-item mbr-gallery-item--p4" data-video-url="false" data-tags="Awesome">
                                    <div href="#lb-gallery1-h" data-slide-to="$i" data-toggle="modal"><img src="DB/designs/' . $columna["imageName"] . '' . $columna["imageExtension"] .'" alt="Cinque Terre" width="400" height="350"><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7"><a
                                                href="http://www.google.com">Perfil de Artista</a> &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href=""></a></span>
                                    </div>
                         </div>
                         
                        ';
         
            if ($numImagen == 0) {
                $carrousel[$numImagen] =
                        '<div class="carousel-item active"><img src="DB/designs/' . $columna["imageName"] . '' . $columna["imageExtension"] .'" alt="Cinque Terre" width="500" height="500"></div>';
            } else {
                $carrousel[$numImagen] =
                        '<div class="carousel-item"><img src="DB/designs/' . $columna["imageName"] . '' . $columna["imageExtension"] .'" alt="Cinque Terre" width="500" height="500"></div>';
            }
            
            $numImagen++;
        }
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>Diseño Grafico</title>
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



</head>

<body>
    <?php
        include 'headerN.php';
    ?>    
    <section class="mbr-section content5 cid-racubm0xo0 mbr-parallax-background" id="content5-l">
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-8">
                    <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">Diseño gráfico&nbsp;</h2>
                    <h2 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5">
                        Cuando el lápiz y el papel ya no son suficientes. </h2>
                </div>
            </div>
        </div>
    </section>
    <section class="mbr-gallery mbr-slider-carousel cid-racgjri4yx" id="gallery1-h">
        <div class="container">
            <div>
                <!-- Gallery -->
                <div class="mbr-gallery-row">
                    <div class="mbr-gallery-layout-default">
                        <div>
                            <div>      
                                <?php
                                    for($cont = 0; $cont < $numImagen; $cont++) {
                                       echo $todasLasImagenes[$cont];
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