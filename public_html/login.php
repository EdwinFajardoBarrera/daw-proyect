<?php
 
session_start();
if (isset($_SESSION['Username'])) {
    header('Location: inicio.php');
}

require './Models/User.php';
require './Conexion/QueryConsults.php';

if (($_SERVER["REQUEST_METHOD"] == "POST") && $_POST["form"] == "login") {
    $ctrlConexion = new QueryConsults();
    
    $user = $_POST["user"];
    $password = $_POST["password"];

    // establecer y realizar consulta. guardamos en variable.
    $columna = $ctrlConexion->getUserAndPassword($user);

    if ($user == $columna['name'] && password_verify($password, $columna['password'])) {
        $_SESSION['Username'] = $user;
<<<<<<< HEAD
        echo "<script>
                     alert('Se inició sesión exitosamente');
                     window.location= inicio.php;
=======
        if (isset($_POST["recordar"])) {
            setcookie("user",$user,time()+37000);
            echo "<script>
                     alert('Se recordará al usuario: ".$_COOKIE['user'].");
                     window.location= Index.php;
                        </script>";
            header("refresh:0; url=login.php");
        } else {
            if(isset($_COOKIE['user'])){
                unset($_COOKIE['user']);
            }
            echo "<script>
                     alert('No se recordará al usuario);
                     window.location= Index.php;
>>>>>>> a2da0a4b53528ba9d19d9f904abaecba8ecdbefd
                        </script>";
            header("refresh:0; url=login.php");
        }
    } else {

        if ($user == $columna['name']) {
            echo "<script>
                         alert('Contraseña incorrecta');
<<<<<<< HEAD
                         window.location= inicio.php;
                            </script>;";
                        header('Location: index.php');
        } else {
            echo "<script>
                         alert('No existe el usuario');
                         window.location= inicio.php;
                            </script>;";
                        header('Location: index.php');
=======
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
>>>>>>> a2da0a4b53528ba9d19d9f904abaecba8ecdbefd
        }
    }
} else {
    header('Location: index.php');
}