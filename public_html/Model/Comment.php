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
include_once './Conexion/Conect.php';
class Comment {
    
    private $id;
    private $username;
    private $contenido;
    
    public function __construct() {
    }
    
    public function getContenidoByUser($user) {
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
        $connect = new Conect();
        $conexion = $connect->getConexion();
        $comments = array();
        $consulta = "select P.`name`, C.content 
            from profile P, comments C, writes W, images I, haves H
            where ". $imageID ." = I.id and I.id = H.id_image and C.id = H.id_comment and "
            . "W.id_profile = P.id and W.id_comment = C.id;";
        $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");
        
        while($filas=$resultado->fetch_assoc()){
            $comments[]=$filas;
        }
        mysqli_close($conexion);
        return $resultado;
    }
}
