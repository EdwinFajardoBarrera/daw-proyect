<?php

class QueryConsults {
    
    private $user = "root";
    private $password = "fireemblem1";
    private $host = "localhost";
    private $database = "wgt-db";

    function __construct() {
        
    }

    public function getUserAndPassword($sessionUser) {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }

        $consulta = "SELECT P.`name`, PD.password
                        FROM profiledata PD, profile P
                        WHERE P.`name` = '" . $sessionUser . "' AND PD.id_profile = P.id;";
        $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");
        $columna = mysqli_fetch_array($resultado);

        return $columna;
    }

    public function getNombreUsuario($sessionUser) {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }

        $consulta = "SELECT PD.`name`, PD.lastname
            FROM profiledata PD, profile P
            WHERE P.`name` = '" . $sessionUser . "' AND PD.id_profile = P.id;";
        $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");
        $columna = mysqli_fetch_array($resultado);
        $username = $columna['name'] . ' ' . $columna['lastname'];

        mysqli_close($conexion);

        return $username;
    }

    public function getDescripcionUsuario($sessionUser) {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }

        $consulta = "SELECT PD.description
            FROM profiledata PD, profile P
            WHERE PD.id = P.id AND P.`name` = '" . $sessionUser . "';";
        $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");
        $columna = mysqli_fetch_array($resultado);
        $descripcion = $columna['description'];

        mysqli_close($conexion);

        return $descripcion;
    }

    public function getRateUsuario($sessionUser) {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }

        $consulta = "SELECT P.reputation
            FROM profiledata PD, profile P
            WHERE PD.id = P.id AND P.`name` = '" . $sessionUser . "';";
        $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");
        $columna = mysqli_fetch_array($resultado);
        $result = $columna['reputation'];
        mysqli_close($conexion);

        $total = $result * 20;


        return $total;
    }

    public function startConexion(){
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);
        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }
        return $conexion;
    }
}
