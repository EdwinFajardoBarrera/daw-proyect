<?php

class Conexion {

    private $usuario = "root";
    private $password = "fireemblem1";
    private $servidor = "localhost";
    private $basededatos = "wgt-db";

    function __construct() {
        
    }

    public function startConexion() {
//creación de la conexión a la base de datos con mysql_connect()
        $conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->basededatos);

        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        } else {
            return $conexion;
        }
    }

    public function closeConexion($conexion) {
        mysqli_close($conexion);
    }

    public function getNombreUsuario($sessionUser, $conexEst) {
        $user = $sessionUser;
        $conexion = $conexEst;

        $consulta = 'SELECT `Username`, `Name` FROM users WHERE `users`.`Username` = "' . $user . '"';
        $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");
        $columna = mysqli_fetch_array($resultado);
        $username = $columna['Name'];

        mysqli_close($conexion);

        return $username;
    }

}

?>