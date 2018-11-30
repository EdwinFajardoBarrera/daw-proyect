<?php
session_start();
if (!isset($_SESSION['Username'])) {
    echo "<script>
        alert('No existe una sesión activa');
        window.location= 'Index.php'
        </script>;";
}

include 'headerN.php';
include 'Conexion/QueryConsults.php';

$ctrlConexion = new QueryConsults();
$username = $ctrlConexion->getNombreUsuario($_SESSION['Username']);
$comentario = $ctrlConexion->getDescripcionUsuario($_SESSION['Username']);
$rate = $ctrlConexion->getRateUsuario($_SESSION['Username']);
$cadenaGenerada = $ctrlConexion->getImagesByUser($_SESSION['Username']);
?>

<!DOCTYPE HTML>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <title>Perfil de <?= utf8_encode($username) ?></title>

        <!--Mis hojas de estilo-->
        <link rel="stylesheet" href="css/imagenes.css">
        <link rel="stylesheet" href="css/imageOverlay.css">



    </head>

    <body>
        <section class="testimonials5 cid-racG9LzvlY" id="testimonials5-x">


            <div class="container">
                <div class="media-container-row">
                    <div class="title col-12 align-center">
                        <h2 class="pb-3 mbr-fonts-style display-2"><?= utf8_encode($_SESSION['Username']) ?></h2>

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
                                <p class="mbr-text mbr-fonts-style mbr-white display-7"><?= utf8_encode($comentario) ?><br>
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="mbr-author-name mbr-bold mbr-fonts-style mbr-white display-7"><?=$username?></div>
                                <small class="mbr-author-desc mbr-italic mbr-light mbr-fonts-style mbr-white display-7">
                                    Diseñador Gráfico</small>
                                <div class="mbr-author-name mbr-bold mbr-fonts-style mbr-white display-7">Puntuaci&oacute;n de usuario: <?= $rate ?>%</div>
                            </div>
                            <div class="card-footer"> <br>
                                <h3 style="color: #ffffff">Elije el archivo que deseas compartir y su categoría</h3>
                                <div class="container-fluid">
                                    <form action="Migrations/saveImage.php" method="post" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-md-9">

                                                <input type="hidden" name="form" value="upfile">
                                                <input type="hidden" name="user" value="<?= $_SESSION['Username']?>">
                                                <input type="file" name="archivo" class="btn-black-outline form-control" style="cursor: pointer" multiple accept="image/jpeg, image/gif, image/png" required>

                                                <div class="row">
                                                    <label class="btn btn-secondary">
                                                        <input type="radio" name="tipoImagen" value="draws" required>Dibujo
                                                    </label>
                                                    <label class="btn btn-secondary">
                                                        <input type="radio" name="tipoImagen" value="designs" required>Dise&ntilde;o
                                                    </label>
                                                    <label class="btn btn-secondary">
                                                        <input type="radio" name="tipoImagen" value="3Ddesigns" required>Dise&ntilde;o 3D
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="col-md">
                                                <button type="submit" class="btn btn-black btn-sm" value="Subir archivo">Subir</button>
                                            </div>

                                        </div>
                                    </form>

                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
        </section>

        <!--Mis scripts-->
        <script src="Js/imageOverlay.js"></script>
        <script src="Js/comentariosInicio.js"></script>
        <!--Bootstrap scripts!-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>

</html>