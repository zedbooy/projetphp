<?php

require_once 'Connection.php';

$connection = new Connection();

$connection->createDatabase("usersemsihub");

$connection->selectDatabase("usersemsihub");

$query = "
CREATE TABLE Clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(80),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
";

$connection->createTable($query);

?>
