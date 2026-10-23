<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "raillife1";
$conn = new mysqli($host, $user, $password, $database, 3309);

if(!$conn){
    die("Falha na conexão: ". $conn->connect_error());
}


?>