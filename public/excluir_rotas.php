<?php

include "../infra/conn.php";
 
session_start();
 if (!isset($_SESSION["usuario"]) || $_SESSION["atuacao"] == "adm") {
        header("Location: home.php");
         exit();
    }


if (isset($_GET["id"])) {
        $idRota = filter_var($_GET["id"], FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);

        if ($idRota === false) {
                header("Location: adm_rotas.php?erro=rota_invalida");
                exit();
        }

        $verificaSensores = $conn->prepare("SELECT id FROM sensores WHERE id_rotas = ? LIMIT 1");
        $verificaSensores->bind_param("i", $idRota);
        $verificaSensores->execute();

        if ($verificaSensores->get_result()->num_rows > 0) {
                header("Location: adm_rotas.php?erro=rota_em_uso");
                exit();
        }

        $verificaTrens = $conn->prepare("SELECT id FROM trens WHERE id_rotas = ? LIMIT 1");
        $verificaTrens->bind_param("i", $idRota);
        $verificaTrens->execute();

        if ($verificaTrens->get_result()->num_rows > 0) {
            header("Location: adm_rotas.php?erro=rota_em_uso");
            exit();
        }

        $sql = "DELETE FROM rotas WHERE id = ?";
        $comando = $conn->prepare($sql);
        $comando->bind_param("i", $idRota);

        try {
                $comando->execute();
        } catch (mysqli_sql_exception $e) {
                header("Location: adm_rotas.php?erro=rota_em_uso");
                exit();
        }
}

header("Location: adm_rotas.php");
exit();

?>