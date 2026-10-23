<?php
include("../infra/conn.php");
session_start();

if (!isset($_SESSION["usuario"]) || $_SESSION["atuacao"] != "adm") {
    header("Location: home.php");
    exit();
}

$erro = "";
$nome = trim($_POST['nome'] ?? '');
$origem = trim($_POST['origem'] ?? '');
$destino = trim($_POST['destino'] ?? '');
$distancia = $_POST['distancia'] ?? '';
$duracao = $_POST['duracao'] ?? '';
$id = null;
$editando = false;
$podeSalvar = true;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['id'])) {
        $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
        if ($id === false || $id < 1) {
            $erro = "Identificador da rota inválido.";
            $podeSalvar = false;
        } else {
            $editando = true;
        }
    }

    $distanciaInt = filter_var($distancia, FILTER_VALIDATE_INT);
    if ($erro === '') {
        if ($nome === '' || $origem === '' || $destino === '' || $distancia === '' || $duracao === '') {
            $erro = "Preencha todos os campos da rota.";
        } elseif ($distanciaInt === false || $distanciaInt < 1 || $distanciaInt > 2147483647) {
            $erro = "Informe uma distância inteira entre 1 e 2.147.483.647 km.";
        }
    }

    if ($erro === '') {
        if ($editando) {
            $stmt = $conn->prepare("UPDATE rotas SET nome_rotas = ?, origem = ?, destino = ?, distancia = ?, tempo = ? WHERE id = ?");
            $stmt->bind_param('sssisi', $nome, $origem, $destino, $distanciaInt, $duracao, $id);
        } else {
            $stmt = $conn->prepare("INSERT INTO rotas (nome_rotas, origem, destino, distancia, tempo) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssis", $nome, $origem, $destino, $distanciaInt, $duracao);
        }
        $stmt->execute();
        header("Location: adm_rotas.php");
        exit();
    }
} elseif (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if ($id === false || $id < 1) {
        $erro = "Identificador da rota inválido.";
        $podeSalvar = false;
    } else {
        $editando = true;
        $stmt = $conn->prepare("SELECT nome_rotas, origem, destino, distancia, tempo FROM rotas WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $rota = $stmt->get_result()->fetch_assoc();

        if ($rota === null) {
            $erro = "Rota não encontrada.";
            $podeSalvar = false;
        } else {
            $nome = $rota['nome_rotas'];
            $origem = $rota['origem'];
            $destino = $rota['destino'];
            $distancia = $rota['distancia'];
            $duracao = substr($rota['tempo'], 0, 5);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Cadastro de Rotas</title>
</head>

<body>

    <img class="fixa2" src="../assets/listras vermelho e cinza.png">

    <header class="hd_home">

        <div class="logo_home">
            <a href="../index.php">
                <img src="../assets/logo.png" alt="logo site">
            </a>
        </div>

        <nav class="nav_home">
            <a href="home.php">Inicio</a>
            <a href="adm_sensores.php">Sensores</a>
            <a href="adm_trens.php">Trens</a>
            <a href="#">Relatorios</a>
            <a href="adm_rotas.php">Rotas</a>
        </nav>

        <button class="menu_btn_home">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </header>

    <main class="cadastro-pagina">
        <div class="container_titulo">
            <img src="../assets/logo.png" alt="logo site">
        </div>
        <section class="cadastro-formulario">

            <?php if ($erro != "") { ?>
                <div class="mensagem-erro">
                    <?php echo htmlspecialchars($erro); ?>
                </div>
            <?php } ?>

            <form class="grid" method="POST">
                <?php if ($editando) { ?>
                    <input type="hidden" name="id" value="<?php echo (int) $id; ?>">
                <?php } ?>

                <div class="cadastro-campo">
                    <label for="nome">Nome rotas:</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite o nome da rota"
                        value="<?php echo htmlspecialchars($nome); ?>" required>
                </div>

                <div class="cadastro-campo">
                    <label for="origem">Origem:</label>
                    <input type="text" id="origem" name="origem" placeholder="Digite a origem da rota"
                        value="<?php echo htmlspecialchars($origem); ?>" required>
                </div>

                <div class="cadastro-campo">
                    <label for="destino">Destino:</label>
                    <input type="text" id="destino" name="destino" placeholder="Digite o destino da rota"
                        value="<?php echo htmlspecialchars($destino); ?>" required>
                </div>

                <div class="cadastro-campo">
                    <label for="distancia">Distância (km):</label>
                    <input type="number" step="1" min="1" max="2147483647" id="distancia" name="distancia"
                        placeholder="Digite a distância da rota"
                        value="<?php echo htmlspecialchars((string) $distancia); ?>" required>
                </div>

                <div class="cadastro-campo">
                    <label for="duracao">Duração da rota:</label>
                    <input type="time" id="duracao" name="duracao"
                        value="<?php echo htmlspecialchars($duracao); ?>" required>
                </div>

                <button type="submit">
                    <?php echo $id ? 'Salvar Alterações' : 'Cadastrar'; ?>
                </button>


            </form>

        </section>

    </main>

    <footer></footer>

    <img class="fixa" src="../assets/listras vermelho e cinza.png">

</body>

</html>