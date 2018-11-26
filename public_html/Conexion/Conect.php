<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conect
 *
 * @author Kirbey
 */
class Conect {
    private $user = "root";
    private $password = "root";
    private $host = "localhost";
    private $database = "wgt-db";
    
    public function getConexion(){
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);
        return $conexion;
    }
}
