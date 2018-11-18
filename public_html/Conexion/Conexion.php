<?php

class Conexion {

    private $usuario = "root";
    private $password = "fireemblem1";
    private $servidor = "localhost";
    private $basededatos = "wgt-db";
    
    function __construct(){}

    public function getConexion(){
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

    public function closeConexion($conexion){
        mysqli_close($conexion);
    }
}

?>