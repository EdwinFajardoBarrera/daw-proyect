<?php

class Conexion {

    private $usuario = "root";
    private $password = "root";
    private $host = "localhost";
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

        $consulta = 'SELECT PD.`name`, PD.lastname
FROM profiledata PD, profile P
WHERE PD.id = P.id ;';
        $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");
        $columna = mysqli_fetch_array($resultado);
        $username = $columna['name'] . ' ' . $columna['lastname'];

        mysqli_close($conexion);

        return $username;
    }

    public function getDescripcionUsuario($sessionUser, $conexEst) {
        $user = $sessionUser;
        $conexion = $conexEst;

        $consulta = "SELECT PD.description
FROM profiledata PD, profile P
WHERE PD.id = P.id AND P.`name` = '" . $user . "';";
        $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");
        $columna = mysqli_fetch_array($resultado);
        $descripcion = $columna['description'];

        mysqli_close($conexion);

        return $descripcion;
    }

    public function getRateUsuario($sessionUser, $conexEst) {
        $user = $sessionUser;
        $conexion = $conexEst;

        $consulta = "SELECT P.reputation
            FROM profiledata PD, profile P
            WHERE PD.id = P.id AND P.`name` = '" . $user . "';";
        $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");
        $columna = mysqli_fetch_array($resultado);
        $result = $columna['reputation'];
        mysqli_close($conexion);
        
        $total = $result*20;
        

        return $total;
    }

}

?>