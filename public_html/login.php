<?php
session_start();
if (isset($_SESSION['Username'])) {
    header('Location: inicio.php');
}

require './Model/User.php';
require './Conexion/QueryConsults.php';

if (($_SERVER["REQUEST_METHOD"] == "POST") && $_POST["form"] == "login") {
    $ctrlConexion = new QueryConsults();

    $user = $_POST["user"];
    $password = $_POST["password"];

    // establecer y realizar consulta. guardamos en variable.
    $column = $ctrlConexion->getUserAndPassword($user);

    /*
    Si las credenciales de acceso son correctas se le redirecciona al inicio y este se establece como el
    nuevo index
    */
    if ($user == $column['name'] && password_verify($password, $column['password'])) {
        $_SESSION['Username'] = $user;

        if (isset($_POST["remember"]) == true) {
            if (isset($_COOKIE['user'])) {
                Setcookie ('user', $datos, 0);
            }
            setcookie("user", $user, time() + 60*60*24/*1 dia*/);
            echo "<script>
                     alert('Se recordará al usuario: " . $user . "');
                     window.location= Index.php;
                        </script>";
            header("refresh:0; url=login.php");
        } else {
            if (isset($_COOKIE['user'])) {
                Setcookie ('user', "", 0);
            }
            header("refresh:0; url=login.php");
        }
    } else {

        if ($user == $column['name']) {
            echo "<script>
                         alert('Contraseña incorrecta');
                         window.location= Index.php;
                         location.href = Index.php;
                            </script>;";
            header("refresh:0; url=login.php");
        } else {
            echo "<script>
                         alert('No existe el usuario');
                         window.location= Index.php;
                         location.href = Index.php;
                            </script>;";
            header("refresh:0; url=login.php");
        }
    }
} else {
    header('Location: index.php');
}