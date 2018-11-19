<?php

include 'config.php';
global $host, $user, $password, $database;

// Create connection
$conn = new mysqli($host, $user, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE writes (
  id_profile INT(6) NOT NULL,
  FOREIGN KEY (id_profile) REFERENCES profile(id),
  id_comment INT(6) NOT NULL,
  FOREIGN KEY (id_comment) REFERENCES comments(id),
  reg_date TIMESTAMP
  )";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();



?>