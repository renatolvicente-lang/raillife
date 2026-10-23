<?php

include "../infra/conn.php";
 
session_start();
 if(!isset($_SESSION["usuario"]) || $_SESSION["atuacao"] != "adm"){
          header("Location: home.php");
        exit();
     }







header("Location: adm_rotas.php");
exit();

?>