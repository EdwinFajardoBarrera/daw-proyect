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
$sql = "CREATE TABLE datosPerfil (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
lastname VARCHAR(50) NOT NULL,
email VARCHAR(150) NOT NULL,
password VARCHAR(150) NOT NULL,
description VARCHAR(5000) NOT NULL,
id_profile INT(6) NOT NULL,
FOREIGN KEY (id_profile) REFERENCES profile(id),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();


?>