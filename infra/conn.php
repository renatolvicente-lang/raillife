<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "raillife";
$conn = new mysqli($host, $user, $password, $database, 3373);

if(!$conn){
    die("Falha na conexão: ". $conn->connect_error());
}


?>