<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "raillife";
$conn = new mysqli($host, $user, $password, $database);

if(!$conn){
    die("Falha na conexão: ". mysqli_connect_error());
}


?>