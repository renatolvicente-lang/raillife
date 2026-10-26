<?php
require_once('../infra/conn.php');
session_start();

if (!isset($_SESSION["usuario"]) || $_SESSION["atuacao"] == "adm") {
    header("Location: home.php");
    exit();
}

$erro = "";
$id = $_GET["id"] ?? null;
$nome = $_POST['nome'] ?? '';
$tipo = $_POST['tipo'] ?? '';
$data_instalacao = $_POST['data_instalacao'] ?? '';
$status_sensor = $_POST['status_sensor'] ?? 'ativo';
$id_rotas = $_POST['id_rotas'] ?? null;
$routeResult = $conn->query("SELECT id, nome_rotas FROM rotas ORDER BY nome_rotas");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($nome) || empty($tipo) || empty($data_instalacao) || empty($id_rotas)) {
        $erro = "Preencha nome, tipo, data de instalação e rota.";
    } else {
        if ($id) {
            $sql = "UPDATE sensores SET nome = ?, tipo = ?, data_instalacao = ?, status_sensor = ?, id_rotas = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssis', $nome, $tipo, $data_instalacao, $status_sensor, $id_rotas, $id);
            $stmt->execute();
            header("Location: adm_sensores.php");
            exit();
        } else {
            $comando = $conn->prepare("SELECT id FROM sensores WHERE nome = ?");
            $comando->bind_param("s", $nome);
            $comando->execute();

            if ($comando->get_result()->num_rows > 0) {
                $erro = "Sensor já cadastrado.";
            } else {
                $sql = "INSERT INTO sensores (nome, tipo, data_instalacao, status_sensor, id_rotas) VALUES (?, ?, ?, ?, ?)";
                $insert = $conn->prepare($sql);
                $insert->bind_param("ssssi", $nome, $tipo, $data_instalacao, $status_sensor, $id_rotas);
                $insert->execute();
                header("Location: adm_sensores.php");
                exit();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Cadastro</title>
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
            <a href="adm_sensores.php" >Sensores</a>
            <a href="adm_trens.php">Trens</a>
            <a href="#">Relatorios</a>
            <a href="adm_rotas.php">Rotas</a>
        </nav>

        <button class="menu_btn_home" img src="../assets/menu button.png">
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
                    <?php echo $erro; ?>
                </div>
            <?php } ?>

            <form class="grid" method="POST">

                <div class="cadastro-campo ">
                    <label for="nome">Nome sensor:</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite o nome do sensor"
                        value="<?php echo htmlspecialchars($nome ?? ''); ?>">
                </div>

                <div class="cadastro-campo">
                    <label for="tipo">Tipo do sensor:</label>
                    <input type="text" id="tipo" name="tipo" placeholder="Digite o tipo do sensor"
                        value="<?php echo htmlspecialchars($tipo ?? ''); ?>">
                </div>
                <div class="cadastro-campo">
                    <label for="data_instalacao">Data de Instalação:</label>
                    <input type="date" id="data_instalacao" name="data_instalacao"
                        placeholder="Digite a data de instalação"
                        value="<?php echo htmlspecialchars($data_instalacao ?? ''); ?>">
                </div>

                <div class="cadastro-campo">
                    <label for="rota">Rota:</label>
                    <select id="rota" name="id_rotas" required>
                        <option value="" disabled <?php echo empty($id_rotas) ? 'selected' : ''; ?>>
                            <?php echo $routeResult->num_rows > 0 ? 'Selecione uma rota' : 'Nenhuma rota cadastrada'; ?>
                        </option>
                        <?php while ($rota = $routeResult->fetch_assoc()) { ?>
                            <option value="<?php echo (int) $rota['id']; ?>"
                                <?php echo $id_rotas == $rota['id'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($rota['nome_rotas']); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="cadastro-campo">
                    <label for="status">Status:</label>
                    <select id="status" name="status" placeholder="digite o status do sensor">
                        <option value="Ativo" <?php echo (isset($status) && $status === 'Ativo') ? 'selected' : ''; ?>>Ativo</option>
                        <option value="Inativo" <?php echo (isset($status) && $status === 'Inativo') ? 'selected' : ''; ?>>Inativo</option>
                        <option value="Manutenção" <?php echo (isset($status) && $status === 'Manutenção') ? 'selected' : ''; ?>>Manutenção</option>
                    </select>
                </div>

                <button type="submit">Cadastrar Sensor</button>

            </form>

        </section>

    </main>


    <footer></footer>

    <img class="fixa" src="../assets/listras vermelho e cinza.png">

</body>

</html>