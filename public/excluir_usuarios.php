<?php

include "../infra/conn.php";

$id = $_GET["id"];

$sql = "DELETE FROM usuarios WHERE id = $id";

$conn->query($sql);

header("Location: adm_usuarios.php")

?>