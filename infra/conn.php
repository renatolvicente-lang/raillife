<?php

$host = "localhost";
$user = "root";
$password = "";
<<<<<<< HEAD
$database = "raillife1";
$conn = new mysqli($host, $user, $password, $database, 3309);
=======
$database = "raillife";
$conn = new mysqli($host, $user, $password, $database,3307);
>>>>>>> beae042464d2c625fd33bd91efe6e3ff1c505bfb

if(!$conn){
    die("Falha na conexão: ". $conn->connect_error());
}


?>