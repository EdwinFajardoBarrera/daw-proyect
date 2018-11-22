<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comentario
 *
 * @author Kirbey
 */
class Comment {
    
    private $id;
    private $username;
    private $contenido;
    
    private $user = "root";
    private $password = "fireemblem1";
    private $host = "localhost";
    private $database = "wgt-db";
    
    public function __construct() {
        
    }
    
    public function getContenidoByUser() {
        return $this->contenido;
    }
    
    public function getUser() {
        return $this->username;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }
    
    public function setUser($username) {
        $this->username = $username;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getCommentsOfImage($imageID){
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }

        $consulta = "select P.`name`, C.content 
            from profile P, comments C, writes W, images I, haves H
            where ". $imageID ." = I.id and I.id = H.id_image and C.id = H.id_comment and "
            . "W.id_profile = P.id and W.id_comment = C.id;";
        $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");
        $columna = mysqli_fetch_array($resultado);
        $cont = 0;
        while ($columna != null){
            $resultado[$cont] = $columna['name']. "," .$columna['content'];
        }
        return $resultado;
    }
}
