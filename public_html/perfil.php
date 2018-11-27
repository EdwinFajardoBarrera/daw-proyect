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
/* Generacion de imagenes */
$user = "root";
$password = "";
$host = "localhost";
$database = "wgt-db";
$conexion = new mysqli($host, $user, $password, $database);
$consulta = "SELECT PR.`name`, I.`imageName`, I.`imageExtension`, I.`imageType`, I.`id` FROM images I, profile PR, posts PO
            WHERE PR.`name` = '" . $_SESSION['Username'] . "' AND PR.id = PO.id_profile AND I.id = PO.id_image;";
$resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");

$numImagen = 0;
while ($columna = $resultado->fetch_assoc()) {
    $cadenaGenerada[$numImagen] = '
            
            <div class="card">
                    <a data-toggle="modal" data-target="#modal">
                        <img src="http://localhost/daw-proyect/public_html/DB/' . $columna["imageType"] . '/' . $columna["imageName"] . $columna["imageExtension"] . '" class="card-img-top" onclick="obtenerElemento(this.src); chargeComments(' . $columna["id"] . '); setActiveImage(' . $columna["id"] . ');">
                    </a>
            </div>';
    $numImagen++;
}
$conexion->close();
?>

<!DOCTYPE HTML>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <title>Perfil de <?= utf8_encode($username) ?></title>
        <!--Bootstrap!-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css"><link rel="stylesheet" href="assets/dropdown/css/style.css">
        <link rel="stylesheet" href="assets/theme/css/style.css">
        <link rel="stylesheet" href="assets/gallery/style.css">
        <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
        <!--Mis hojas de estilo!-->
        <link rel="stylesheet" href="css/imagenes.css">
        <link rel="stylesheet" href="css/imageOverlay.css">
        <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">



    </head>

    <body>

        <?php
        //include 'headerN.php';
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
            <h1 class="text-center display-4 my-4">Galeria</h1>
            <div class="container">
                <div class="card-columns" id="galeria">

                    <?php
                    $cuenta = count($cadenaGenerada);
                    for ($cont = 0; $cont < $cuenta; $cont++) {
                        echo $cadenaGenerada[$cont];
                    }
                    ?>
                </div>
            </div>

            <!--Visualizador de fotos!-->
            <div class="container">
                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="row">
                        <div class="col-sm-8 align-self-center">
                            <div class="modal-dialog modal-lg modal-dialog-centered" id="rolloGaleria" role="document">
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
                                <textarea id="commentTxtBox" cols="2" placeholder="Añadir comentario público" onkeypress="comentar(event,'<?=$_SESSION['Username']?>', getActiveImage()); chargeComments(getActiveImage()); clearTxtBox(event, this);"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <script></script>
        <script src="Js/imageOverlay.js"></script>
        <script src="Js/comentariosInicio.js"></script>
        <!--Bootstrap scripts!-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>

</html>