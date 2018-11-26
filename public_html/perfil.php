<?php
session_start();
if (!isset($_SESSION['Username'])) {
    echo "<script>
        alert('No existe una sesión activa');
        window.location= 'Index.php'
        </script>;";
}

include 'Conexion/QueryConsults.php';

$ctrlConexion = new QueryConsults();
$username = $ctrlConexion->getNombreUsuario($_SESSION['Username']);
$comentario = $ctrlConexion->getDescripcionUsuario($_SESSION['Username']);
$rate = $ctrlConexion->getRateUsuario($_SESSION['Username']);
$imagenes = $ctrlConexion->getImagesByUser($_SESSION['Username']);
$postImagenes = $ctrlConexion->getImagesByUser2($_SESSION['Username']);
?>

<!DOCTYPE HTML>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <title>Perfil de <?= utf8_encode($username) ?></title>
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
        <link rel="stylesheet" href="css/imagenes.css" type="text/css">



    </head>

    <body onresize="detectarCambioResolucion(); chargeComments(5);">

    <?php
        include 'headerN.php';
    ?>

        <section class="testimonials5 cid-racG9LzvlY" id="testimonials5-x">


            <div class="container">
                <div class="media-container-row">
                    <div class="title col-12 align-center">
                        <h2 class="pb-3 mbr-fonts-style display-2"><?= $_SESSION['Username'] ?></h2>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="media-container-column">
                    <div class="mbr-testimonial align-center col-12 col-md-10">
                        <div class="panel-item">
                            <div class="card-block">
                                <div class="testimonial-photo">
                                    <img src="icons/perfil.png">
                                </div>
                                <p class="mbr-text mbr-fonts-style mbr-white display-7"><?= $comentario ?><br>
                                </p>
                                <p id="resizeResult">Resolucion actual</p>
                            </div>
                            <div class="card-footer">
                                <div class="mbr-author-name mbr-bold mbr-fonts-style mbr-white display-7"><?= utf8_encode($username) ?></div>
                                <small class="mbr-author-desc mbr-italic mbr-light mbr-fonts-style mbr-white display-7">
                                    Diseñador Gráfico</small>
                                <div class="mbr-author-name mbr-bold mbr-fonts-style mbr-white display-7">Puntuaci&oacute;n de usuario: <?= $rate ?>%</div>
                            </div>
                            
                            <div class="card-footer"> 
                                                                             
                              <br>
                                <form enctype="multipart/form-data" method="POST">
                                
                                    <div class="container align-left col-12"> 
                                        <small class="mbr-author-desc mbr-italic mbr-light mbr-fonts-style mbr-white display-7">
                                        Elije el archivo que deseas compartir y su categoría</small>
                                        <input type="submit" value="Subir archivo"/> 
                                        <input name="archivoAsubir" type="file" multiple accept="image/jpeg, image/gif, image/png"><br />
                                        <input type="radio" name="tipoImagen" value="draws"> Dibujo<br>
                                        <input type="radio" name="tipoImagen" value="designs"> Diseño grafico<br>
                                        <input type="radio" name="tipoImagen" value="3Ddesigns"> Diseño 3D<br>
                                        
                                        
                                    </div>
                                </form> 
                                                                    
                                <?php
                                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        $tipoImagen = isset($_POST['tipoImagen']) ? $_POST['tipoImagen'] : null;

                                        if($tipoImagen) {
                                            $target_path = "DB/" . $tipoImagen . "/"; 
                                            $target_path = $target_path . basename( $_FILES['archivoAsubir']['name']); 
                                            if((move_uploaded_file($_FILES['archivoAsubir']['tmp_name'], $target_path)) && ($tipoImagen)) { 
                                                echo "<center>El archivo ". basename( $_FILES['archivoAsubir']['name'])." ha sido subido exitosamente!</center>";  
                                                include 'Migrations/saveImage.php';
                                            }
                                        } else { 
                                            echo "<center>Hubo un error al subir tu archivo! Por favor intenta de nuevo</center>"; 
                                        }
                                    }
                                ?>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mbr-gallery mbr-slider-carousel cid-racLqv6S6a" id="gallery3-y">

            <div>
                <div>

                    <!-- Lightbox -->

                    <div data-app-prevent-settings="" class="mbr-slider modal carousel slide" tabindex="-1"
                         data-keyboard="true" data-interval="false" id="lb-gallery3-y" style="right: -8%;">
                        <div class="col-sm-8" id="imageBox">
                            <div id="blockImage" class="modal-dialog" style="overflow-y: auto">
                                <div class="modal-content">

                                    <div class="modal-body">

                                        <div class="carousel-inner">

                                            <?php
                                            if (count($imagenes) > 0) {
                                                for ($cont = 0; $cont < count($postImagenes); $cont++) {
                                                    echo $postImagenes[$cont];
                                                }
                                            }
                                            ?>
                                        </div>
                                        <a id="prevBtn" class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#lb-gallery3-y">
                                            <span class="mbri-left mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
                                        <a id="nextBtn" class="carousel-control carousel-control-next" role="button" data-slide="next" href="#lb-gallery3-y">
                                            <span class="mbri-right mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Next</span></a>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <a id="closeBtn" class="close" href="#" role="button" data-dismiss="modal"><span class="sr-only">Close</span></a>
                        <div class="col-sm-3" id="commentsElementBox">
                            <div id="elementInCommentBox" class="col-sm-12">
                                <img id="profilePic" src="icons/perfil.png">
                                Nombre de usuario
                            </div>
                            <div id="elementLikeComment" class="col-sm-12" style="display: inline-block; align-items: center;">
                                <div id="like" class="col-sm-6">
                                    <a href="#">Me gusta</a>
                                </div>
                                <div id="commment" class="col-sm-5">
                                    <a onclick="getFocus();">Comentar</a>
                                </div>
                            </div>
                            <div id="commentsColumn" class="col-sm-12" >
                                <div id="commentsCharged" class="col-sm-12" >
                                    No hay comentarios que mostrar
                                </div>
                            </div>
                            <div class="col-sm-12" style="display: inline-flex">
                                <img id="profilePicCom" style="width: 50px; height: 50px; border-radius: 100%; " src="icons/perfil.png">
                                <textarea id="commentTxtBox" cols="35" rows="1" placeholder="Añadir comentario público"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery -->
            <div class="mbr-gallery-row" style="background-color: #465362;">
                <div class="mbr-gallery-layout-default">
                    <div>
                        <div>
                            <?php
                            if (count($imagenes) < 0) {
                                echo'
                                        <div>
                                            <p>Sube algunas imagenes para que el mundo empiece a conocerte</p>
                                        </div>';
                            } else {
                                //Genera las imagenes
                                for ($cont = 0; $cont < count($imagenes); $cont++) {
                                    echo $imagenes[$cont];
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <?php
//            include 'perfil.php';
        ?>


        <script src="Js/comentariosInicio.js"></script>
        <script src="assets/web/assets/jquery/jquery.min.js"></script>
        <script src="assets/tether/tether.min.js"></script>
        <script src="assets/popper/popper.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/masonry/masonry.pkgd.min.js"></script>
        <script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
        <script src="assets/smoothscroll/smooth-scroll.js"></script>
        <script src="assets/dropdown/js/script.min.js"></script>
        <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
        <script src="assets/theme/js/script.js"></script>
        <script src="assets/gallery/player.min.js"></script>
        <script src="assets/gallery/script.js"></script>


    </body>

</html>