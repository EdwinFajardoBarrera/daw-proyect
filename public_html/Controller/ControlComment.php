<?php

/**
 * Description of ControlComment
 *
 * @author Kirbey
 */
//Llamada al modelo
require('Model/Comment.php');
$comment = new Comment();
$datos = $comment->getCommentsOfImage(5);//$_GET['idImage']

//Llamada a la vista
require('View/ViewComments.php');

class ControlComment {

    public function __construct() {
        
    }

}
