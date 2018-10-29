<?php
  require './User.php';

  $instancia = new User();

  $instancia->setName("Edwin");
  $instancia->setLastName("Fajardo");
  $instancia->setUsername("Fajardini");
  $instancia->setEmail("erofaba@gmail.com");
  $instancia->setPassword("11Locos.");

  $instancia->keepData();

  //$nombre = $instancia->getName();
  //$instancia->setCriticsScore("90%");
        
  //echo ("Creé una instancia y le puse de nombre: " . $nombre);
  //echo ("Critics score: " . $instancia->getCriticsScore());
?>