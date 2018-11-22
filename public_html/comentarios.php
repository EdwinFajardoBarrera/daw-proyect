<!DOCTYPE html>

<?php
require_once 'Conexion/QuueryConsults.php';
require_once 'Controllers/ControlComment.php';
?>
<html>
<head>
  <title>Comentarios</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles.css" />
  <base target="_parent">
  <script type="text/javascript" src="scripts.js"></script>

</head>

<body class="area-comentarios">
  <!-- buscador -->
  <p id="tex-tittle">Comentarios</p>
  <p id="area-comentarios"></p>   
  <div style="float: center; text-align: center">
    <textarea id="commentBox" rows="2" cols="50" placeholder="Añadir comentario público"></textarea> 
    <a id="comentar-btn" style="float: left;" onclick="añadirComentario()">Comentar</a>
  </div>

</body>

</html>