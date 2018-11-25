<?php
/*Datos de conexion a base de datos*/
$user = "root";
$password = "fireemblem1";
$host = "localhost";
$database = "wgt-db";

/*respuesta de lista de comentarios por id*/
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $imageID = $_GET['id'];
    $conexion = new mysqli($host, $user, $password, $database);
    $comments = array();
    $consulta = "Select P.`name`, C.content 
            from profile P, comments C, writes W, images I, haves H
            where " . $imageID . " = I.id and I.id = H.id_image and C.id = H.id_comment and "
            . "W.id_profile = P.id and W.id_comment = C.id;";
    $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");

    $numImagen = 0;
    while ($columna = $resultado->fetch_assoc()) {
        $comments[$numImagen] = '<div class="col-sm-12" ><a href="perfilVisitante.php?user=' . $columna['name'] . '">' . $columna['name'] . '</a> ' . $columna['content'] . '</div>';
        $numImagen++;
    }
    mysqli_close($conexion);

    $numImagen = count($comments);
    for ($cont = 0; $cont < $numImagen; $cont++) {
        echo utf8_encode($comments[$cont]);
    }
}

if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    $usuario= $_POST['user'];
    $commentario = $_POST['comment'];
    $imageId = $_POST['imageID'];
    //--------------------------------------------------------------------------
    $conexion1 = new mysqli($host, $user, $password, $database);
    $consulta1 = "INSERT INTO comments (content) 
	VALUES ('".$commentario."')";
    $query = $conexion1->query($consulta1) or die("Corregir sintaxis de la consulta1");
    //--------------------------------------------------------------------------
    $conexion2 = new mysqli($host, $user, $password, $database);
    $consulta2 = "SELECT id FROM profile WHERE name ='".$usuario."';";
    $query1 = $conexion2->query($consulta2) or die("Corregir sintaxis de la consulta2");
    $resultado1 = mysqli_fetch_array ($query1);
    $profile_id = $resultado1['id'];
    //--------------------------------------------------------------------------
    $conexion3 = new mysqli($host, $user, $password, $database);
    $consulta3 = "SELECT id FROM comments ORDER BY id DESC LIMIT 1";
    $query2 = $conexion3->query($consulta3) or die("Corregir sintaxis de la consulta3");
    $resultado2 = mysqli_fetch_array ($query2);
    $comment_id = $resultado2['id'];
    //--------------------------------------------------------------------------
    $conexion4 = new mysqli($host, $user, $password, $database);
    $consulta4 = "INSERT INTO writes (id_profile, id_comment, reg_date) 
	VALUES (".$profile_id.",".$comment_id.",now())";
    $query3 = $conexion4->query($consulta4) or die("Corregir sintaxis de la consulta4");
    //--------------------------------------------------------------------------
    $conexion5 = new mysqli($host, $user, $password, $database);
    $consulta5 = "INSERT INTO haves (id_comment, id_image, reg_date) 
	VALUES (".$comment_id.",".$imageId.",now())";
    $query4 = $conexion5->query($consulta5) or die("Corregir sintaxis de la consulta5");
} 