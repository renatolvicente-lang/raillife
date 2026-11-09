<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "raillife1";

<<<<<<< HEAD
$conn = new mysqli($host, $user, $password, $database, 3309);
=======
$conn = new mysqli($host, $user, $password, $database);
>>>>>>> 4490d907b72c7903ed9279816b26c30a0baa082b

if(!$conn){
    die("Falha na conexão: ". $conn->connect_error());
}


?>