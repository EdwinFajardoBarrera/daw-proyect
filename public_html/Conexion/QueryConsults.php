<?php

class QueryConsults {

    private $user = "root";
    private $password = "";
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
    
    public function getImagesByUser($sessionUser){
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }

        $consulta = "SELECT PR.`name`, I.`imageName`, I.`imageExtension`, I.`imageType` FROM images I, profile PR, posts PO
            WHERE PR.`name` = '". $sessionUser ."' AND PR.id = PO.id_profile AND I.id = PO.id_image;";
        $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");
        
        $numImagen = 0;
        while($columna = $resultado->fetch_assoc()) {  
            
            $todasLasImagenes[$numImagen] = 
                        '
                         <div class="responsive">
                            <div class="gallery container">
                              <div class="image-header">
                                <span style="float:left"><a href="#">Artista</a></span><span style="float:right"><a href="perfilVisitante.php">Seguir</a></span>
                              </div>
                                  <a target="_blank" href="DB/'.$columna["imageType"].'/' . $columna["imageName"] . $columna["imageExtension"] .'">
                                <img src="DB/'.$columna["imageType"].'/' . $columna["imageName"] . $columna["imageExtension"] .'" alt="Cinque Terre" width="100%" height="400">
                              </a>
                              <div class="desc">Descripcion</div>
                            </div>
                          </div> 
                        ';
                    
            $numImagen++;
            
        }
        $conexion->close();
        return $todasLasImagenes;
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