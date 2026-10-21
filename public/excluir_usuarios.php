<?php

include "../infra/conn.php";
session_start();

$id = $_GET["id"];

$sql = "DELETE FROM usuarios WHERE id = $id";

$conn->query($sql);

header("Location: adm_usuarios.php");
exit();

?>