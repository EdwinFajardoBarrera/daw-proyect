<?php
  unset($_COOKIE['user']);
  session_start();
  unset($_SESSION['username']);
  session_destroy();
  echo '<script>alert("Se ha cerrado la sesión");</script>';
  header("refresh:0; url=Index.php");
  exit;