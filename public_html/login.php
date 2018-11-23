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
    $columna = $ctrlConexion->getUserAndPassword($user);

    if ($user == $columna['name'] && password_verify($password, $columna['password'])) {
        $_SESSION['Username'] = $user;
        if ($_POST["recordar"] == 1) {
            if (isset($_COOKIE['user'])) {
                Setcookie ('user', $datos, 0);
            }
            setcookie("user", $user, time() + 60*60*24/*1 dia*/);
            echo "<script>
                     alert('Se recordará al usuario: " . $_COOKIE['user'] . "');
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

        if ($user == $columna['name']) {
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