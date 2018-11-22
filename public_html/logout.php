<?php
  session_start();
  if(isset($_COOKIE['user'])){
    unset($_COOKIE['user']);
  }
  unset($_SESSION['username']);
  session_destroy();
  echo '<script>alert("Se ha cerrado la sesión");</script>';
  header("refresh:0; url=logout.php");
  exit;