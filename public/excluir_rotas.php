<?php

include "../infra/conn.php";
 
session_start();
 if(!isset($_SESSION["usuario"]) || $_SESSION["atuacao"] != "adm"){
          header("Location: home.php");
        exit();
     }


if(isset($_GET["id"])){



}

header("Location: adm_rotas.php");
exit();

?>