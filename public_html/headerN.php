<!doctype <!DOCTYPE html>
<?php
    if(isset($_POST['search'])) {
        $buscar = $_POST['search'];
        $buscar = trim($buscar);
        $buscar = strtolower($buscar);        
        header("location: searchResults.php?buscar=$buscar");
        exit;
    }
?>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
  <link rel="stylesheet" type="text/css" href="./estilosInicio.css">
  <link rel="stylesheet" type="text/css" href="./loginStyle.css">
  <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
  <!-- <script src="main.js"></script> -->
</head>
<body>
  <!-- HEADER -->            
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
                    <li class="nav-item">
                        <a class="nav-link link text-white display-4" href="dibujos.php">
                            <span class="mobi-mbri mobi-mbri-edit-2 mbr-iconfont mbr-iconfont-btn"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-white display-4" href="DisenoGrafico.php">
                            <span class="mbrib-desktop mbr-iconfont mbr-iconfont-btn"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-white display-4" href="3D.php">
                            <span class="mobi-mbri mobi-mbri-delivery mbr-iconfont mbr-iconfont-btn" style="font-size: 25px;"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-white display-4" href="profile.php">
                            <span class="mobi-mbri mobi-mbri-user mbr-iconfont" style="font-size: 25px;"></span>
                        </a>
                    </li>
                </ul>
                <div class="navbar-buttons mbr-section-btn">
                    <a class="btn btn-sm btn-success-outline display-7" href="contacto.php">
                        <span class="mbri-touch mbr-iconfont mbr-iconfont-btn"><br></span>
                    </a>
                    <?php
                        if (!isset($_SESSION['Username'])) {
                            echo '<a class="btn btn-sm btn-primary display-7" href="index.php">
                            <span class="mbri-login mbr-iconfont mbr-iconfont-btn"></span>
                            Log in
                            </a>';
                        }

                        if (isset($_SESSION['Username'])) {
                            echo '<a class="btn btn-sm btn-warning display-7" href="logout.php">
                            <span class="mbri-login mbr-iconfont mbr-iconfont-btn"></span>
                            Log out
                            </a>';
                            }
                    ?>
                </div>
            </div>
        </nav>
    </section>
</body>
</html>