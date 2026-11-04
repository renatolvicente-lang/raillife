<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "raillife1";

<<<<<<< HEAD
$conn = new mysqli($host, $user, $password, $database, 3309);
=======
$conn = new mysqli($host, $user, $password, $database, 3307);
>>>>>>> d215a656e4297b0f0b051206d1c27430315e3a61

if(!$conn){
    die("Falha na conexão: ". $conn->connect_error());
}


?>