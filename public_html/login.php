<?php
 
session_start();
if (isset($_SESSION['Username'])) {
    header('Location: inicio.php');
}

require_once './Models/User.php';
require_once './Conexion/QueryConsults.php';

if (($_SERVER["REQUEST_METHOD"] == "POST") && $_POST["form"] == "login") {

    $ctrlConexion = new QueryConsults();
    $user = $_POST["user"];
    $password = $_POST["password"];

    // establecer y realizar consulta. guardamos en variable.
    $columna = $ctrlConexion->getUserAndPassword($user);

    if ($user == $columna['name'] && password_verify($password, $columna['password'])) {
        session_start();
        session_cache_expire(1);
        $_SESSION['Username'] = $user;
        echo "<script>
                     alert('Se inició sesión exitosamente');
                     window.location= document;
                        </script>";
        header('Location: inicio.php');
    } else {

        if ($user == $columna['name']) {
            echo "<script>
                         alert('Contraseña incorrecta');
                         window.location= document;
                            </script>;";
        } else {
            echo "<script>
                         alert('No existe el usuario');
                         window.location= document;
                            </script>;";
        }
    }
} else {
    header('Location: Index.php');
}