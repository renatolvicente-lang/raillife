<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "raillife1";

<<<<<<< HEAD
$conn = new mysqli($host, $user, $password, $database, 3309);
=======
$conn = new mysqli($host, $user, $password, $database, 3373);
>>>>>>> f02ab2bef545ed6a55b90631e928113668a800fd

if(!$conn){
    die("Falha na conexão: ". $conn->connect_error());
}


?>