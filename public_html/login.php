<?php
session_start();
$_SESSION['count'];
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
    if ($user == $column['name'] && password_verify($password, $column['password']) && $ctrlConexion->getUserStatus($user) != 0  ) {
        $_SESSION['Username'] = $user;
        $_SESSION['count'] = 0;
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

        //Se verifica si el usuario esta baneado
        if ($ctrlConexion->getUserStatus($user) == 0) {
            echo "<script>
            alert('La cuenta: $user se encuentra bloqueada');
            window.location= index.php;
            location.href = index.php;
               </script>;";
            header("refresh:0; url=recoverPassword.php");

        } else {
            if ($user == $column['name']) {
                $_SESSION['count']++;
                $intentos = $_SESSION['count'];
                
                //Se verifica cuantos intentos lleva el usuario
                if ($intentos >= 3) {
                    $ctrlConexion->banUser($user);
                    echo "<script>
                    alert('Supero el limite de intentos, cuenta de $user bloqueada');
                    window.location= index.php;
                    location.href = index.php;
                       </script>;";
                    header("refresh:0; url=recoverPassword.php");
                } else {
                    echo "<script>
                    alert('Contraseña incorrecta, intentos: $intentos');
                    window.location= Index.php;
                    location.href = Index.php;
                       </script>;";
                    header("refresh:0; url=login.php");
                }
            } else {
                echo "<script>
                             alert('No existe el usuario');
                             window.location= Index.php;
                             location.href = Index.php;
                                </script>;";
                header("refresh:0; url=login.php");
            }
        }        
    }
} else {
    header('Location: index.php');
}