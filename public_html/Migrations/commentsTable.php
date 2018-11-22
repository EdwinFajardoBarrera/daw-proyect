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
$sql = "CREATE TABLE comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
content VARCHAR(50) NOT NULL,
id_profileData INT(6) NOT NULL,
FOREIGN KEY (id_profileData) REFERENCES profileData(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

?>