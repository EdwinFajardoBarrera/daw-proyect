<?php

require_once '../Conexion/QueryConsults.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form'] == 'upfile') {
    if ($_FILES['archivo']["error"] > 0) {
        echo '<center style="color: tomato">Error: ' . $_FILES['archivo']['error'] . '</center><br>';
        echo '<center style="color: tomato">Hubo un error al subir tu archivo! Por favor intenta de nuevo</center>';
    } else {
        $username = $_POST['user'];
        $tipoImagen = $_POST['tipoImagen'];

        $target_path = "../DB/" . $tipoImagen . "/";
        $target_path = $target_path . basename($_FILES['archivo']['name']);
        echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";

        echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";

        echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";

        echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];

        move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path);

        $ctrlConexion = new QueryConsults();
        $mysqli = $ctrlConexion->startConexion();

//Guarda los datos de la imagen subida por el usuario
        $imagen = basename($_FILES['archivo']['name']);
        $imagenASubir = preg_split("/./", $imagen);
        $lastCut = count($imagenASubir)-1;
//nombre de la imagen   //extensión
        echo 'Esto es lo ultimo->'.$imagenASubir[$lastCut];
        $guardarImagen = "INSERT INTO images VALUES (NULL, '$imagen', '.$imagenASubir[$lastCut].', '$tipoImagen', now())";
        $mysqli->query("$guardarImagen");

//Guardar los id´s de la imagen y el usuario en la tabla 
        $consultaImagen = "SELECT id FROM images WHERE imageName='$imagen'";
        $resultadoImagen = $mysqli->query("$consultaImagen");
        $idImagen = $resultadoImagen->fetch_assoc();

        $consultaUsuario = "SELECT id FROM profile WHERE profile.name='$username'";
        $resultadoUsuario = $mysqli->query("$consultaUsuario");
        $idUsuario = $resultadoUsuario->fetch_assoc();

        $guardarPost = "INSERT INTO posts VALUES ('$idUsuario[id]', '$idImagen[id]', now())";
        $mysqli->query("$guardarPost");
    }
}
header('refresh:0; url=../perfil.php');