<!DOCTYPE html>
<html>


<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

    <title>Home</title>
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
    <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    <script src="scripts.js"></script>
    <script src="Js/comentariosInicio.js"></script>
    <link rel="stylesheet" type="text/css" href="estilosInicio.css" />
    




</head>

<body>
    <section class="menu cid-ra9b0gb1Mf" once="menu" id="menu1-1">
        <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="menu-logo">
                <div class="navbar-brand">

                    <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-5" href="indexN.php">W.G.T</a></span>
                    <form action="" method="post" autocomplete="off" id="form-search">
                        <input id="searchBox" type="text" name="search" placeholder="Buscar en W.G.T">
                    </form>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">

                    <li class="nav-item"><a class="nav-link link text-white display-4" href="dibujos.html"><span class="mobi-mbri mobi-mbri-edit-2 mbr-iconfont mbr-iconfont-btn"></span>
                        </a></li>
                    <li class="nav-item"><a class="nav-link link text-white display-4" href="Disenografico.html"><span
                                class="mbrib-desktop mbr-iconfont mbr-iconfont-btn"></span>
                        </a></li>
                    <li class="nav-item"><a class="nav-link link text-white display-4" href="3D.html"><span class="mobi-mbri mobi-mbri-delivery mbr-iconfont mbr-iconfont-btn"
                                style="font-size: 25px;"></span>
                        </a></li>
                </ul>
                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-success-outline display-7" href="contacto.html"><span
                            class="mbri-touch mbr-iconfont mbr-iconfont-btn"><br></span>
                    </a> <a class="btn btn-sm btn-primary display-7" href="Index.php"><span class="mbri-login mbr-iconfont mbr-iconfont-btn"></span>
                        Log in</a></div>
            </div>
        </nav>
    </section>

    <section class="engine"></section>
    <section class="carousel slide cid-ra9hqGKF9R" data-interval="false" id="slider1-4">



        <div class="full-screen">
            <div class="mbr-slider slide carousel" data-pause="true" data-keyboard="false" data-ride="carousel"
                data-interval="50000000">
                <ol class="carousel-indicators">
                    <li data-app-prevent-settings="" data-target="#slider1-4" class="active" data-slide-to="0"></li>
                    <li data-app-prevent-settings="" data-target="#slider1-4" data-slide-to="1"></li>
                    <li data-app-prevent-settings="" data-target="#slider1-4" data-slide-to="2"></li>
                    <li data-app-prevent-settings="" data-target="#slider1-4" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item slider-fullscreen-image active" data-bg-video-slide="false" style="background-color: aliceblue">
                        <div class="container container-slide">
                            <div class="image_wrapper">
                                
                                <div class="carousel-caption justify-content-center">
                                    <div class="col-10 align-center">
                                        <h2 class="mbr-fonts-style display-1">Disfruta contenido random</h2>
                                        <!-- contenedor carousel -->
                                        <div class="slideshow-container">

                                            <!-- imágenes -->
                                            <div class="mySlides fade" style="display: block;">
                                                <img src="DB/designs/design3.jpg" width="100%" height="500">
                                            </div>
                                            <!-- genera imágenes de forma dinámica -->
                                            <?php
                                            for ($cont = 0; $cont < $numImagen; $cont++) {
                                            echo $todasLasImagenes[$cont];
                                            }
                                            ?>
                                            <!-- botones siguiente y anterior -->
                                            <a class="prev" onclick="plusSlides(-1); setIdImage(getIdImage() - 1); chargeComments(getIdImage())">&#10094;</a>
                                            <a class="next" onclick="plusSlides(1); setIdImage(getIdImage() + 1); chargeComments(getIdImage())">&#10095;</a>
                                        </div>

                                        <div id="comment-div">
                                            <p id="tex-tittle">Comentarios</p>
                                            <p id="area-comentarios">
                                                <!--comentarios se cargan aquí------------------------------------------------------------------------------>
                                            </p>
                                            <div style="float: center; text-align: center">
                                                <textarea id="commentBox" rows="4" cols="54" placeholder="Añadir comentario público"></textarea>
                                                <input type="button" id="comentar-btn" style="float: left;" value="Comentar"
                                                    onclick="agregarComentario('<?=$username?>', getIdImage())">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item slider-fullscreen-image" data-bg-video-slide="false" style="background-image: url(assets/images/mbr-1271x1920.jpg);">
                        <div class="container container-slide">
                            <div class="image_wrapper">
                                <div class="mbr-overlay"></div><img src="assets/images/mbr-1271x1920.jpg">
                                <div class="carousel-caption justify-content-center">
                                    <div class="col-10 align-center">
                                        <h2 class="mbr-fonts-style display-1">Web Got Tallent</h2>
                                        <p class="lead mbr-text mbr-fonts-style display-5">Conectamos el talento del
                                            mundo para que tú y todos podamos compartir y disfrutar del arte 3D, dibujo
                                            y el diseño gráfico</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item slider-fullscreen-image" data-bg-video-slide="false" style="background-image: url(assets/images/mbr-1-1920x1280.jpg);">
                        <div class="container container-slide">
                            <div class="image_wrapper">
                                <div class="mbr-overlay"></div><img src="assets/images/mbr-1-1920x1280.jpg">
                                <div class="carousel-caption justify-content-center">
                                    <div class="col-10 align-center">
                                        <h2 class="mbr-fonts-style display-1">Bienvenidos diseñadores gráficos</h2>
                                        <p class="lead mbr-text mbr-fonts-style display-5">inspirate con los diseños de
                                            nuestros usuarios y luego compártenos tu talento</p>
                                        <div class="mbr-section-btn" buttons="0"><a class="btn btn-primary display-4"
                                                href="https://mobirise.com">Explorar diseños</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item slider-fullscreen-image" data-bg-video-slide="false" style="background-image: url(assets/images/mbr-1920x1280.jpg);">
                        <div class="container container-slide">
                            <div class="image_wrapper">
                                <div class="mbr-overlay"></div><img src="assets/images/mbr-1920x1280.jpg">
                                <div class="carousel-caption justify-content-center">
                                    <div class="col-10 align-center">
                                        <h2 class="mbr-fonts-style display-1">¿Tu talento es dibujar?</h2>
                                        <p class="lead mbr-text mbr-fonts-style display-5">mira lo que el mundo está
                                            haciendo</p>
                                        <div class="mbr-section-btn" buttons="0"><a class="btn btn-info display-4" href="https://mobirise.com">Explorar
                                                Dibujos</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button"
                    data-slide="prev" href="#slider1-4"><span aria-hidden="true" class="mbri-left mbr-iconfont"></span><span
                        class="sr-only">Previous</span></a><a data-app-prevent-settings="" class="carousel-control carousel-control-next"
                    role="button" data-slide="next" href="#slider1-4"><span aria-hidden="true" class="mbri-right mbr-iconfont"></span><span
                        class="sr-only">Next</span></a>
            </div>
        </div>

    </section>

    <section once="" class="cid-ra9iqqZfZS" id="footer6-8">





        <div class="container">
            <div class="media-container-row align-center mbr-white">
                <div class="col-12">
                    <p class="mbr-text mb-0 mbr-fonts-style display-7">
                        © Copyright 2018 Web Got Tallent - All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </section>


    <script src="assets/web/assets/jquery/jquery.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/tether/tether.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/smoothscroll/smooth-scroll.js"></script>
    <script src="assets/dropdown/js/script.min.js"></script>
    <script src="assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
    <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
    <script src="assets/theme/js/script.js"></script>
    <script src="assets/slidervideo/script.js"></script>


</body>

</html>