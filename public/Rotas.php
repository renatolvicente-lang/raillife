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
$id = $_POST['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($nome === '' || $origem === '' || $destino === '' || $distancia === '' || $duracao === '') {
        $erro = "Preencha todos os campos para cadastrar a rota.";
    } elseif (filter_var($distancia, FILTER_VALIDATE_INT) === false || (int) $distancia <= 0) {
        $erro = "Informe uma distância inteira maior que zero.";
    }

    if (empty($erro)) {
        if ($id) {
            // Atualizar rota existente
            $sql = "UPDATE rotas SET nome_rotas = ?, origem = ?, destino = ?, distancia = ?, tempo = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssisi', $nome, $origem, $destino, $distancia, $duracao, $id);
            $stmt->execute();

            header("Location: adm_rotas.php");
            exit();
        } else {
            // Inserir nova rota
            $sql = "INSERT INTO rotas (nome_rotas, origem, destino, distancia, tempo) VALUES (?, ?, ?, ?, ?)";
            $comando = $conn->prepare($sql);
            $comando->bind_param("sssis", $nome, $origem, $destino, $distancia, $duracao);
            $comando->execute();

            header("Location: adm_rotas.php");
            exit();
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
                    <input type="number" step="1" min="1" id="distancia" name="distancia"
                        placeholder="Digite a distância da rota"
                        value="<?php echo htmlspecialchars((string) $distancia); ?>" required>
                </div>

                <div class="cadastro-campo">
                    <label for="duracao">Duração da rota:</label>
                    <input type="time" id="duracao" name="duracao"
                        value="<?php echo htmlspecialchars($duracao); ?>" required>
                </div>

                <button type="submit">Cadastrar Rota</button>

            </form>

        </section>

    </main>

    <footer></footer>

    <img class="fixa" src="../assets/listras vermelho e cinza.png">

</body>

</html>