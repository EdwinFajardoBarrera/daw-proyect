<?php
  session_start();
  Setcookie ('user', "", 0);
  unset($_SESSION['username']);
  session_destroy();
  echo '<script>alert("Se ha cerrado la sesión");</script>';
  header("refresh:0; url=index.php");
  exit;