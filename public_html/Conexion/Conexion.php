<?php

class Conexion {

    private $usuario = "root";
    private $password = "root";
    private $servidor = "localhost";
    private $basededatos = "wgt-db";

    function __construct() {
        
    }

    public function startConexion() {
//creación de la conexión a la base de datos con mysql_connect()
        $conexion = new mysqli($this->host, $this->usuario, $this->password, $this->basededatos);

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

        $consulta = 'SELECT `username`, `name` FROM users WHERE `users`.`username` = "' . $user . '"';
        $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");
        $columna = mysqli_fetch_array($resultado);
        $username = $columna['Name'];

        mysqli_close($conexion);

        return $username;
    }

}

?>