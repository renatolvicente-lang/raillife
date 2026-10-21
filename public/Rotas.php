<?php
    include("../infra/conn.php");
    session_start();

    if(!isset($_SESSION["usuario"]) || $_SESSION["atuacao"] != "adm"){
        header("Location: home.php");

    }


$erro = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if ($id) {
        $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ?, cpf = ?, endereco = ?, cidade = ?, CEP = ?, data_nascimento = ?, atuacao = ? WHERE id = ?";
        

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('sssssssssi', $nome, $email, $senhaHash, $CPF, $endereco, $cidade, $CEP, $data_nascimento, $area_atuacao, $id);
        $stmt->execute();
        header("Location: ../public/adm_usuarios.php");
        exit();
    } else {
        if ($erro == "") {
            $sql = "INSERT INTO usuarios (nome, email, senha, CPF, endereco, cidade, CEP, data_nascimento, atuacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $comando = $conn->prepare($sql);

            $comando->bind_param("sssssssss", $nome, $email, $senhaHash, $CPF, $endereco, $cidade, $CEP, $data_nascimento, $area_atuacao);
            $comando->execute();

            header("Location: ../public/adm_usuarios.php");
            exit();
        }
    }
    if (empty($id) && $erro == "") {
        $comando = $conn->prepare("SELECT id FROM usuarios WHERE email = ? OR CPF = ?");
        $comando->bind_param("ss", $email, $CPF);
        $comando->execute();
        if ($comando->get_result()->num_rows > 0) {
            $erro = "E-mail ou CPF já cadastrado.";
        }
        header("Location: ../public/adm_usuarios.php");
        exit();
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
            <a href="home.php" >Inicio</a>
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
                    <label for="nome">Nome rotas:</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite o nome da rota"
                        value="<?php echo htmlspecialchars($nome ?? ''); ?>">
                </div>

                <div class="cadastro-campo">
                    <label for="origem">Origem:</label>
                    <input type="text" id="origem" name="origem" placeholder="Digite a origem da rota"
                        value="<?php echo htmlspecialchars($origem ?? ''); ?>">
                </div>

                 <div class="cadastro-campo">
                    <label for="destino">Destino:</label>
                    <input type="text" id="destino" name="destino" placeholder="Digite o destino da rota"
                        value="<?php echo htmlspecialchars($destino ?? ''); ?>">
                </div>

                <div class="cadastro-campo">
                    <label for="distancia">Distância:</label>
                    <input type="number" id="distancia" name="distancia"
                        placeholder="Digite a distância da rota"
                        value="<?php echo htmlspecialchars($distancia ?? ''); ?>">
                </div>

                <div class="cadastro-campo">
                    <label for="duracao">Duração da rota:</label>
                    <input type="time" id="duracao" name="duracao"
                        placeholder="Digite a duração da rota"
                        value="<?php echo htmlspecialchars($duracao ?? ''); ?>">
                </div>

                <button type="submit">Cadastrar Rota</button>

            </form>

        </section>

    </main>


    <footer></footer>

    <img class="fixa" src="../assets/listras vermelho e cinza.png">

</body>

</html>