<?php
include("../infra/conn.php");

session_start();

if (!isset($_SESSION["usuario"]) || $_SESSION["atuacao"] == "adm") {
    header("Location: home.php");
        exit();
}
if(isset($_GET["id"])){


    $sql = "DELETE FROM trens WHERE id = ?";
    $comando = $conn->prepare($sql);
    $comando->bind_param("i", $_GET["id"]);
    $comando->execute();
    
}



?>