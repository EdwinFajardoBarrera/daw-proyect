<?php
class User {
    private $name;
    private $last_name;
    private $username;
    private $email;
    private $password;

    public function getName() {
      return $this->name;
    }

    public function getLastName() {
      return $this->last_name;
    }

    public function getUsername() {
      return $this->username;
    }

    public function getEmail() {
      return $this->email;
    }

    public function setName($name){
      $this->name = $name;
    }

    public function setLastName($last_name){
      $this->last_name = $last_name;
    }

    public function setUsername($username){
      $this->username = $username;
    }

    public function setEmail($email){
      $this->email = $email;
    }

    public function setPassword($password){
      $this->password = $password;
    }

    public function keepData($instance) {
      //echo $instance->name;

      $objtext = serialize($instance);

      $file = fopen("Users" . "/" . $instance->username . ".txt", "w");
      //fwrite($file, $this->name . " | " . $this->last_name . " | " . $this->username . " | " . $this->email . " | " . $this->password . PHP_EOL);
      fwrite($file, $objtext);
      fclose($file);

    }

    public function isValidLogin($username, $password) {

    $RUTA_ARCHIVO = "Users" . "/" . $username . ".txt";
    $validation = false;

      if (!file_exists($RUTA_ARCHIVO)){
        return $validation;
      }

    $fpDatos = fopen($RUTA_ARCHIVO, 'r');

    $user = unserialize(file_get_contents($RUTA_ARCHIVO));
    $validPassword = password_verify($password, $user->password);
      if ($validPassword) {
        $validation = true;
      }

    return $validation;

    }
    
}

?>