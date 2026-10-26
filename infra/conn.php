<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "raillife";
<<<<<<< HEAD
$conn = new mysqli($host, $user, $password, $database);
=======
$conn = new mysqli($host, $user, $password, $database, 3307);
>>>>>>> 162654e8a33fec7b625a779a819ae1e5379f60d0

if(!$conn){
    die("Falha na conexão: ". $conn->connect_error());
}


?>