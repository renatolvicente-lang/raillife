<?php
include("../infra/conn.php");

session_start();

if (!isset($_SESSION["usuario"]) || $_SESSION["atuacao"] == "adm") {
    header("Location: home.php");
        exit();
}
$id = $_GET["id"];
if(isset($id)){


    $sql = "DELETE FROM trens WHERE id = ?";
    $comando = $conn->prepare($sql);
    $comando->bind_param("i", $id);
    $comando->execute();
    
    header("Location: adm_trens.php");
    exit();
}



?>