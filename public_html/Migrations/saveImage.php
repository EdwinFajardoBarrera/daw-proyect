<?php

    include 'config.php';
    global $host, $user, $password, $database, $root_url;
    $mysqli = new mysqli($host, $user, $password, $database);
    $mysqli->set_charset("utf8");
    
    //Guarda los datos de la imagen subida por el usuario
    $imagen = basename( $_FILES['archivoAsubir']['name']);
    $imagenASubir = explode(".", $imagen);
                                                      //nombre de la imagen   //extensión
    $guardarImagen = "INSERT INTO images VALUES (NULL, '$imagenASubir[0]', '.$imagenASubir[1]', '$tipoImagen', now())"; 
    $mysqli->query("$guardarImagen");
     
    //Guardar los id´s de la imagen y el usuario en la tabla 
    $consultaImagen = "SELECT id FROM images WHERE imageName='$imagenASubir[0]'";
    $resultadoImagen = $mysqli->query("$consultaImagen");
    $idImagen = $resultadoImagen->fetch_assoc();

    $arregloNombre = explode(" ", $username);
    $consultaUsuario = "SELECT * FROM profile INNER JOIN profiledata ON profile.id=profiledata.id WHERE profiledata.name='$arregloNombre[0]'";
    $resultadoUsuario = $mysqli->query("$consultaUsuario");  
    $idUsuario = $resultadoUsuario->fetch_assoc();
    
    $guardarPost = "INSERT INTO posts VALUES ('$idUsuario[id]', '$idImagen[id]', now())";
    $mysqli->query("$guardarPost");