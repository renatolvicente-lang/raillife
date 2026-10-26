<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "raillife";
<<<<<<< HEAD
$conn = new mysqli($host, $user, $password, $database, 3309);
=======
$conn = new mysqli($host, $user, $password, $database);
>>>>>>> 272974d7e162d7f66b1ea55cce6d4a8aa6dd9139

if(!$conn){
    die("Falha na conexão: ". $conn->connect_error());
}


?>