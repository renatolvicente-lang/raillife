<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "raillife1";
$conn = new mysqli($host, $user, $password, $database, 3306);

if(!$conn){
    die("Falha na conexão: ". $conn->connect_error());
}


?>