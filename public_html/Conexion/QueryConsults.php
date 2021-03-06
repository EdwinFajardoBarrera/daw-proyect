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

    public function getImagesByUser($sessionUser) {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }

        // $conexion = new mysqli($host, $user, $password, $database);
        $consulta = "SELECT PR.`name`, I.`imageName`, I.`imageExtension`, I.`imageType`, I.`id` FROM images I, profile PR, posts PO
        WHERE PR.`name` = '" . $sessionUser . "' AND PR.id = PO.id_profile AND I.id = PO.id_image;";
        $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");

        $numImagen = 0;
        while ($columna = $resultado->fetch_assoc()) {
            $cadenaGenerada[$numImagen] = '
                
                <div class="card">
                        <a data-toggle="modal" data-target="#modal">
                            <img src="http://localhost/daw-proyect/public_html/DB/' . $columna["imageType"] . '/' . $columna["imageName"] . $columna["imageExtension"] . '" class="card-img-top elementInGallery" onclick="obtenerElemento(this.src); chargeComments(' . $columna["id"] . '); setActiveImage(' . $columna["id"] . ');">
                        </a>
                </div>';
            $numImagen++;
        }
        $conexion->close();

        return $cadenaGenerada;
    }

    public function getImagesByType($type) {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }

        // $conexion = new mysqli($host, $user, $password, $database);
        $consulta = "SELECT PR.`name`, I.`imageName`, I.`imageExtension`, I.`imageType`, I.`id` FROM images I, profile PR, posts PO
        WHERE I.`imageType` = '" . $type . "' AND PR.id = PO.id_profile AND I.id = PO.id_image;";
        $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");

        $numImagen = 0;
        while ($columna = $resultado->fetch_assoc()) {
            $cadenaGenerada[$numImagen] = '
                
                <div class="card">
                        <a data-toggle="modal" data-target="#modal">
                            <img src="http://localhost/daw-proyect/public_html/DB/' . $columna["imageType"] . '/' . $columna["imageName"] . $columna["imageExtension"] . '" class="card-img-top imgOfGalery" onclick="obtenerElemento(this.src); chargeComments(' . $columna["id"] . '); setActiveImage(' . $columna["id"] . ');">
                        </a>
                </div>';
            $numImagen++;
        }
        $conexion->close();

        return $cadenaGenerada;
    }

    public function getImagesBySearch($searchText) {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }

        $consulta = "SELECT PR.`name`, I.`imageName`, I.`imageExtension`, I.`imageType`, I.`id` FROM images I, profile PR, posts PO
        WHERE I.`imageName` like '%". $searchText ."%' AND PR.id = PO.id_profile AND I.id = PO.id_image;";
        $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");

        $numImagen = 0;
        while ($columna = $resultado->fetch_assoc()) {
            $cadenaGenerada[$numImagen] = '
                
                <div class="card">
                        <a data-toggle="modal" data-target="#modal">
                            <img src="http://localhost/daw-proyect/public_html/DB/' . $columna["imageType"] . '/' . $columna["imageName"] . $columna["imageExtension"] . '" class="card-img-top elementInGallery" onclick="obtenerElemento(this.src); chargeComments(' . $columna["id"] . '); setActiveImage(' . $columna["id"] . ');">
                        </a>
                </div>';
            $numImagen++;
        }
        $conexion->close();

        return $cadenaGenerada;
    }

    public function getImagesForUserInv($sessionUser) {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }

        $consulta = "SELECT PR.`name`, I.`imageName`, I.`imageExtension`, I.`imageType` FROM images I, profile PR, posts PO
            WHERE PR.`name` = '" . $sessionUser . "' AND PR.id = PO.id_profile AND I.id = PO.id_image;";
        $resultado = mysqli_query($conexion, $consulta) or die("Corregir sintaxis de la consulta");
        $numImagen = 0;
        while ($columna = $resultado->fetch_assoc()) {

            $todasLasImagenes[$numImagen] = '<div class="responsivePer">
                    <div class="imagenLoca">
                        <a target="_blank" href="DB/' . $columna["imageType"] . '/' . $columna["imageName"] . $columna["imageExtension"] . '">
                            <img class="miFoto" src="DB/' . $columna["imageType"] . '/' . $columna["imageName"] . $columna["imageExtension"] . '" alt="Cinque Terre" width="100%" height="300">
                        </a>
                    </div>
                </div>';

            $numImagen++;
        }
        $conexion->close();
        return $todasLasImagenes;
    }

    public function startConexion() {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);
        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }
        return $conexion;
    }

    public function banUser($user) {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "UPDATE profile SET status = 0 WHERE name= '$user'";
        $resultado = $conexion->query($query);
        $conexion->close();
    }

    public function unBanUser($user) {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        /* comprueba la conexión */
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }
        $query = "UPDATE profile SET status = 1 WHERE name= '$user'";
        $resultado = $conexion->query($query);
        $conexion->close();
    }

    public function getUserStatus($user) {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);
        /* comprueba la conexión */
        $status;
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }

        $query = "SELECT status FROM profile WHERE name = '$user'";
        $resultado = $conexion->query($query);

        while ($columna = $resultado->fetch_assoc()) {
            $status = $columna['status'];
        }

        $conexion->close();

        return $status;
    }

    public function validateUserData($username, $email, $contra) {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);
        /* comprueba la conexión */
        $validation = false;
        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }

        $query = "SELECT profile.name, profiledata.email, profiledata.password FROM profile, profiledata WHERE profile.name";
        $resultado = $conexion->query($query);

        while ($columna = $resultado->fetch_assoc()) {
            if ($username == $columna['name'] && $email == $columna['email'] && password_verify($contra, $columna['password'])) {
                $validation = true;
            }
        }

        return $validation;
    }

    public function createProfile($name, $lastName, $username, $email, $password) {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }

        $crearPerfil = "INSERT INTO profile VALUES (NULL, '$username', 0, TRUE, now())";

        if (!$crearPerfil) {
            echo "No se pudieron seleccionar los datos";
        } else {

            $ejecutarPerfil = $conexion->query("$crearPerfil");

            if (!$ejecutarPerfil) {
                echo "No se pudieron instertar los datos en la tabla";
            } else {

                $query = $conexion->query("SELECT id FROM profile ORDER BY id DESC LIMIT 1");
                $resultado = mysqli_fetch_array($query);
                $profile_id = $resultado['id'];

                $crearDatosPerfil = "INSERT INTO profileData VALUES (NULL, '$name', '$lastName', '$email', '$password', 'Bienvenido, edite su descripcion', '$profile_id', now())";

                $ejecutarDatos = $conexion->query("$crearDatosPerfil");

                if (!$ejecutarDatos) {
                    echo "No se pudieron instertar los datos en la tabla";
                }
            }
        }
    }

    public function usernameIsAviable($username) {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        if (mysqli_connect_errno()) {
            printf("Conexion fallida: %s\n", mysqli_connect_error());
            exit();
        }

        $query = "SELECT * FROM profile WHERE name = '$username'";
        $resultado = $conexion->query($query);
        $conexion->close();

        if (mysqli_num_rows($resultado) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUser() {
        return $this->user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getHost() {
        return $this->host;
    }

    public function getDB() {
        return $this->database;
    }

}
