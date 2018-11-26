<?php

require './Conexion/QueryConsults.php';

if (($_SERVER["REQUEST_METHOD"] == "POST") && $_POST["form"] == "reactivate") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $ctrlConexion = new QueryConsults();

  $unBan = $ctrlConexion->validateUserData($username, $email, $password);

  if ($unBan = true) {
    $ctrlConexion->unBanUser($username);
    echo "<script>
    alert('Desbaneado papá ;)');
    window.location= index.php;
    location.href = index.php;
       </script>;";
    header("refresh:0; url=index.php");
  } else {
    echo "<script>
    alert('Biri biri ban ban everylife');
    window.location= index.php;
    location.href = index.php;
       </script>;";
    header("refresh:0; url=index.php");
  }


}

?>