<?php

include "../infra/conn.php";
session_start();
  if (!isset($_SESSION["usuario"]) || $_SESSION["atuacao"] != "adm") {
        header("Location: home.php");
         exit();
    }



if(isset($_GET["id"])){
    $id_exclusao = $_GET["id"];
    $id_sessao = $_SESSION["id"];

    if($id_exclusao != $id_sessao){

        $sql = "DELETE FROM usuarios WHERE id = $id_exclusao";
    
        $conn->query($sql);
    }
}





header("Location: adm_usuarios.php");
exit();

?>