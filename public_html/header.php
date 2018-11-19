<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    if(isset($_POST['search'])) {
        $buscar = $_POST['search'];
        $buscar = trim($buscar);
        $buscar = strtolower($buscar);
        
        header("location: searchResults.php? buscar=$buscar");
        exit;
    }
?>

<html>
<head>
  <title>Cabecera</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @import url('https://fonts.googleapis.com/css?family=Poiret+One');
  </style>
  <link rel="stylesheet" type="text/css" href="styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <base target="_parent">
  <script type="text/javascript" src="scripts.js"></script>

</head>

<body class="header">
  <!-- logo de la página -->
  <div class="logo"><a href="inicio.php">W.G.T</a></div>

  <!-- buscador -->
  <form style="POSITION: absolute; margin-left: 200px;" action="" method="post" autocomplete="off" id="form-search">
    <input id="searchBox" type="text" name="search" placeholder="Buscar en W.G.T">
  </form>
  <!-- botones -->
  <nav>
    <a href="contacto.html" title="Contactanos"><i>Contáctanos</i></a>
    <a href="drawsView.php" title="Dibujo"><i class="fa fa-pencil"></i></a>
    <a href="designsView.php" title="Diseño Gráfico"><i class="fa fa-desktop"></i></a>
    <a href="3DdesignsView.php" title="Diseño 3D"><i class="fa fa-cube"></i></a>
    <?php
    session_start();
    if (isset($_SESSION['Username'])) {
        echo '<a href="perfilArtista.php" title="Perfil"><i class="fa fa-user"></i></a>';
        echo '<a href="logout.php" title="Cerrar sesi&oacute;n">Salir</a>';
    } 
    ?> 
    

  </nav>

  <div style="float: right; text-align: right"></div>

</body>

</html>