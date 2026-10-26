<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "raillife";
<<<<<<< HEAD
$conn = new mysqli($host, $user, $password, $database, 3373);
=======
<<<<<<< HEAD
$conn = new mysqli($host, $user, $password, $database, 3309);
=======
$conn = new mysqli($host, $user, $password, $database);
>>>>>>> 272974d7e162d7f66b1ea55cce6d4a8aa6dd9139
>>>>>>> 7a2757157b87d2b7d30862be299d2086216549be

if(!$conn){
    die("Falha na conexão: ". $conn->connect_error());
}


?>