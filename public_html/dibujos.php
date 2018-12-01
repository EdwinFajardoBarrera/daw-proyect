<?php
session_start();
include 'header.php';
require './Conexion/QueryConsults.php';

$ctrlConexion = new QueryConsults();
$cadenaGenerada = $ctrlConexion->getImagesByType('draws');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <title>Dibujos</title>
        <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
        <link rel="stylesheet" href="assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
        <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
        <link rel="stylesheet" href="assets/tether/tether.min.css">
        <link rel="stylesheet" href="assets/dropdown/css/style.css">
        <link rel="stylesheet" href="assets/theme/css/style.css">
        <link rel="stylesheet" href="assets/gallery/style.css">
        <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
        
        <!--Mis hojas de estilo-->
        <link rel="stylesheet" href="css/imagenes.css">
        <link rel="stylesheet" href="css/imageOverlay.css">

    </head>

    <body style="background-color: #465362">
        <section class="mbr-section content5 cid-racjG1Jao3 mbr-parallax-background" id="content5-k">
            <div class="container">
                <div class="media-container-row">
                    <div class="title col-12 col-md-8">
                        <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">Dibujos&nbsp;</h2>
                        <h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5">
                            Colección aleatoria de los trabajos de nuestros artistas
                        </h3>
                    </div>
                </div>
            </div>
        </section>

        <!--Galeria-->
        <div class="page-header">
            <h1 style="text-align: center; color: #ffffff">Galer&iacute;a</h1>
        </div>
        <div class="container">
            <div class="card-columns" id="galeria">
                <?php
                if ($cadenaGenerada > 0) {
                    $cuenta = count($cadenaGenerada);
                    for ($cont = 0; $cont < $cuenta; $cont++) {
                        echo $cadenaGenerada[$cont];
                    }
                }
                ?>
            </div>
        </div>

        <!--Visualizador de fotos-->
        <div class="container-fluid">
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="row">
                    <div class="col-sm-8 align-self-center">
                        <div class="modal-dialog modal-lg modal-dialog-centered card-img-top" id="rolloGaleria" role="document">
                            <img id="overImg" src="https://images5.alphacoders.com/376/thumb-1920-376912.jpg" class="img-fluid rounded">
                        </div>
                    </div>
                    <div class="col-sm-3 align-self-center" id="commentsElementBox">
                        <div id="elementInCommentBox" class="col-sm-12">
                            <img id="profilePic" src="icons/perfil.png" onmouseover="this.style.cursor = 'pointer'">
                            Nombre de usuario
                        </div>
                        <div id="elementLikeComment" class="row">
                            <div id="like" class="col-sm-6">
                                <a href="#">Me gusta</a>
                            </div>
                            <div id="commment" class="col-sm-6" onclick="getFocus();">
                                <a>Comentar</a>
                            </div>
                        </div>
                        <div id="commentsColumn" class="col-sm-12" >
                            <div id="commentsCharged" class="col-sm-12">
                                No hay comentarios que mostrar
                            </div>
                        </div>
                        <div id="commentTxtArea" class="col-sm-12">
                            <img id="profilePicCom" style="width: 50px; height: 50px; border-radius: 100%; " src="icons/perfil.png">
                            <textarea id="commentTxtBox" cols="2" placeholder="Añadir comentario público" onkeypress="comentar(event, '<?= $_SESSION['Username'] ?>', getActiveImage()); chargeComments(getActiveImage()); clearTxtBox(event, this);"></textarea>
                            <button class="btn btn-black-outline" style="width: 50px; height: 50px; white-space: nowrap;">Comentar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include 'footer.html';
        ?>

        <!--Mis scripts-->
        <script src="Js/imageOverlay.js"></script>
        <script src="Js/comentariosInicio.js"></script>
        
        <script src="assets/web/assets/jquery/jquery.min.js"></script>
        <script src="assets/popper/popper.min.js"></script>
        <script src="assets/tether/tether.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
        <script src="assets/parallax/jarallax.min.js"></script>
        <script src="assets/smoothscroll/smooth-scroll.js"></script>
        <script src="assets/masonry/masonry.pkgd.min.js"></script>
        <script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="assets/dropdown/js/script.min.js"></script>
        <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
        <script src="assets/theme/js/script.js"></script>
        <script src="assets/gallery/player.min.js"></script>
        <script src="assets/gallery/script.js"></script>


    </body>

</html>