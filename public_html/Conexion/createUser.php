<?php

//Creas una variable de tipo objeto mysqli con los datos de la bd y el charset que quieras
include 'config.php';
global $host, $user, $password, $database;

$mysqli = new mysqli($host, $user, $password, $database);
$mysqli->set_charset("utf8");

//Aquí se obtienen los datos del formulario
$name = $_POST["name"];
$last_name = $_POST["last_name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_BCRYPT);

$sql = "INSERT INTO users VALUES (NULL, '$name', '$last_name', '$username', '$email', '$password', now())";

if (!$sql) {
  echo "No se pudieron seleccionar los datos";
} else {
  echo "Si se pudieron seleccionar los datos";
}

$ejecutar = $mysqli->query("$sql");

  if (!$ejecutar) {
    echo "No se pudieron instertar los datos en la tabla";
  } else {
    echo "Se han registrado los datos correctamente";
  }

?>