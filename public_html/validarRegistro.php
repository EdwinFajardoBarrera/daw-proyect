<?php    
    $error_nombreLargo= "";
    $error_nombreInvalido= "";
    $error_apellidoLargo= "";
    $error_apellidoInvalido= "";
    $error_usuarioLargo= "";
    $error_usuarioInvalido= "";
    $error_correoInvalido= "";
    $error_contraseñaNoCoincide= "";
    $error_contraseñaCorta = "";
    
    if(isset($_POST['form'])){
        $nombre = $_POST['name'];
        $apellido = $_POST['last_name'];
        $usuario = $_POST['username'];
        $correo = $_POST['email'];
        $contraseña = $_POST['password'];
        $contraseñaRegistro = $_POST['contraseñaRegistro'];

        $validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";

        if(strlen($nombre)> 15){
            $error_nombreLargo = "* El nombre es muy largo";                                   
        }

        for($i= 0; $i < strlen($nombre); $i++){
            if(strpos($validChars, substr($nombre,$i,1)) === false){
                $error_nombreInvalido = "* Introdujo caracteres invalidos en nombre";
            }
        }

        if(strlen($apellido)> 15){
            $error_apellidoLargo = "* El apellido es muy largo";
        }

        for($i= 0; $i < strlen($apellido); $i++){
            if(strpos($validChars, substr($apellido,$i,1)) === false){
                $error_apellidoInvalido = "* Introdujo caracteres invalidos en apellido";
            }
        }

        if(strlen($usuario)> 15){
            $error_usuarioLargo = "* El usuario es muy largo";                                   
        }

        for($i= 0; $i < strlen($usuario); $i++){
            if(strpos($validChars, substr($usuario,$i,1)) === false){
                $error_usuarioInvalido = "* Introdujo caracteres invalidos en usuario";
            }
        }

        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $error_correoInvalido = "* El correo es invalido";            
        }

        if($contraseña != $contraseñaRegistro){
            $error_contraseñaNoCoincide = "* Las contraseñas no coinciden";
        }

        if(strlen($contraseña)< 6){
            $error_contraseñaCorta = "* La contraseña es muy corta";                                   
        }

    }    