<?php

//Creas una variable de tipo objeto mysqli con los datos de la bd y el charset que quieras
include 'config.php';
global $host, $user, $password, $database, $root_url;
$mysqli = new mysqli($host, $user, $password, $database);
$mysqli->set_charset("utf8");

//Aquí se obtienen los datos del formulario
$name = $_POST["name"];
$last_name = $_POST["last_name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_BCRYPT);

$crearPerfil = "INSERT INTO profile VALUES (NULL, '$username', 0, TRUE, now())";

if (!$crearPerfil) {
  echo "No se pudieron seleccionar los datos";
} else {

  $ejecutarPerfil = $mysqli->query("$crearPerfil");

  if (!$ejecutarPerfil) {
    echo "No se pudieron instertar los datos en la tabla";
  } else {

    $query = $mysqli->query("SELECT id FROM profile ORDER BY id DESC LIMIT 1");
    $resultado = mysqli_fetch_array ($query);
    $profile_id = $resultado['id'];

    $crearDatosPerfil = "INSERT INTO profileData VALUES (NULL, '$name', '$last_name', '$email', '$password', 'Bienvenido, edite su descripcion', '$profile_id', now())";

    $ejecutarDatos = $mysqli->query("$crearDatosPerfil");

    if (!$ejecutarDatos) {
      echo "No se pudieron instertar los datos en la tabla";
    } else {
      header("Location: $root_url");
    }

}
  }

?>