<?php

//Creas una variable de tipo objeto mysqli con los datos de la bd y el charset que quieras
//include 'config.php';
require '../Conexion/QueryConsults.php';
$ctrlConexion = new QueryConsults();
$conexion = $ctrlConexion->startConexion();

//Aquí se obtienen los datos del formulario
$name = $_POST["name"];
$last_name = $_POST["last_name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$passwordConfirm = $_POST["passwordConfirm"];
$errorsValidator = false;

// $ctrlConexion->createProfile($name, $last_name, $username, $email, $password);

if (strlen($password) < 8) {
  $errorPassword = "Contraseña muy corta";
  // echo "<script>
  // alert('Error: " . $errorPassword . "');
  // window.location= Index.php;
  //    </script>";
  // header("refresh:0; url=../login.php");
  $errorsValidator = true;
} else {
  $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
}

if ($ctrlConexion->usernameIsAviable($username) == false) {
  $errorUsername = "El nombre de usuario ya se encuentra en uso";
  // echo "<script>
  // alert('Error: " . $errorUsername . "');
  // window.location= Index.php;
  //    </script>";
  // header("refresh:0; url=../login.php");
  $errorsValidator = true;
}

if (password_verify($passwordConfirm, $password) == false) {
  $errorPasswordConfirm = "Las contraseñas no coinciden";
}

 



?>