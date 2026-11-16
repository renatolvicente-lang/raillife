<?php

include("../infra/conn.php");

session_start();

// if (!isset($_SESSION["usuario"]) || $_SESSION["atuacao"] == "adm"){
//     header("Location: home.php");
//     exit();

// }

if(isset($_GET["id_sensores"])){

$sql = "DELETE FROM sensores WHERE id_sensores = ?";

$comando = $conn->prepare($sql);
$comando->bind_param("i", $_GET["id_sensores"]);
$comando->execute();

header("Location: adm_sensores.php");
exit();


}





?>