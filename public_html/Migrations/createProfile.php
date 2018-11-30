<?php
//Creas una variable de tipo objeto mysqli con los datos de la bd y el charset que quieras
//include 'config.php';
require '../Conexion/QueryConsults.php';
$ctrlConexion = new QueryConsults();
$conexion = $ctrlConexion->startConexion();

//Aquí se obtienen los datos del formulario
$name = utf8_encode($_POST["name"]);
$last_name = $_POST["last_name"];
$username = utf8_encode($_POST["username"]);
$email = $_POST["email"];
$password = $_POST["password"];
$passwordConfirm = $_POST["passwordConfirm"];
$captcha = $_POST['g-recaptcha-response'];
$secret = '6LdJRXcUAAAAALouIjSUxXaQmAEuYLqLgnPHv7wG';
$errorsValidator = false;

if (strlen($password) < 8) {
  $errorPassword = "Contraseña muy corta";
  $errorsValidator = true;
} else {
  $errorPassword = "";
  $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
}

if ($ctrlConexion->usernameIsAviable($username) == false) {
  $errorUsername = "El nombre de usuario ya se encuentra en uso";
  $errorsValidator = true;
} else {
  $errorUsername = "";
}

if (password_verify($passwordConfirm, $password) == false) {
  $errorPasswordConfirm = "Las contraseñas no coinciden";
  $errorsValidator = true;
} else {
  $errorPasswordConfirm = "";
}

if(!$captcha) {
  $errorCaptcha = "No se selecciono el captcha";
  $errorsValidator = true;  
  } else {
  
    $errorCaptcha = "";
  $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
  
  $arr = json_decode($response, TRUE);
}

if ($errorsValidator == true ) {
  echo "<script>
        alert('Errores:" . '\n' ."  ". $errorUsername . " " . '\n' ."  ". $errorPassword . " " . '\n' ." ". $errorPasswordConfirm . " " . '\n' ." ". $errorCaptcha . "');
        window.location= Index.php;
        </script>";
  header("refresh:0; url=../login.php");
} else {
  $ctrlConexion->createProfile($name, $last_name, $username, $email, $password);
  echo "<script>
      alert('Usuario creado satisfactoriamente');
      window.location= Index.php;
      </script>";
  header("refresh:0; url=../login.php");
}
 



?>