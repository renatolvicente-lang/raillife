<?php
require_once('../infra/conn.php');
require_once('validar_cpf.php');
session_start();

    if (!isset($_SESSION["usuario"]) || $_SESSION["atuacao"] != "adm") {
          header("Location: home.php");
          exit();
     }    

$erro = "";
$id = $_GET["id"] ?? null;
$area_atuacao = "comum"; // Valor padrão para o campo de atuação

function formatarCpf($cpf)
{
    $cpf = preg_replace('/\D/', '', (string) $cpf);

    if (strlen($cpf) !== 11) {
        return $cpf;
    }

    return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
}

if ($id && $_SERVER['REQUEST_METHOD'] === 'GET') {

    $sql = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
    $sql->bind_param("i", $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($usuario = $result->fetch_assoc()) {
        $nome = $usuario['nome_usuarios'];
        $email = $usuario['email'];
        $CPF = preg_replace('/\D/', '', $usuario['cpf']);
        $endereco = $usuario['endereco'];
        $cidade = $usuario['cidade'];
        $data_nascimento = $usuario['data_nascimento'];
        $area_atuacao = $usuario['atuacao'];
        $CEP = preg_replace('/\D/', '', $usuario['cep']);
    } else {
        $erro = "Usuário não encontrado.";
    }






}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //Verificando se tem um id na url
    $usuario = null;

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $CPF = preg_replace('/\D/', '', $_POST['CPF']);
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $CEP = preg_replace('/\D/', '', $_POST['CEP']);
    $data_nascimento = $_POST['data_nascimento'];
    $area_atuacao = $_POST['atuacao'];

    $cpf_limpo = $CPF;




    //Validação do nome
    if (empty($nome)) {
        $erro = "O campo nome é obrigatório.";
    } elseif (mb_strlen($nome) < 5) {
        $erro = "O campo nome deve ter no mínimo 5 caracteres.";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ\s]+$/", $nome)) {
        $erro = "O campo nome deve conter apenas letras e espaços.";
    } else {
        $partes_nome = explode(" ", $nome);
        $partes_nome = array_filter($partes_nome);

        if (count($partes_nome) < 2) {
            $erro = "O campo nome deve conter nome e sobrenome.";
        }
    }

    //Validação do email
    if (empty($email)) {
        $erro = "O campo email é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "O campo email é inválido.";
    } elseif (strpos($email, " ") !== false) {
        $erro = "O campo email não pode conter espaços.";
    }

    // Validação do CPF
    if (strlen($cpf_limpo) !== 11) {
        $erro = "CPF inválido 1";
    } elseif (preg_match('/(\d)\1{10}/', $cpf_limpo)) {
        $erro = "CPF inválido 2";
    } else {

        if (!validarCPF($cpf_limpo)) {
            $erro = "CPF inválido 3";
        }
    }

    $cep_limpo = preg_replace('/\D/', '', $CEP);
    if (strlen($cep_limpo) !== 8) {
        $erro = "CEP inválido";
    }

    // Validação do CEP
    if ($erro == "") {
        if (strlen($cep_limpo) !== 8) {
            $erro = "CEP inválido";
        }
    }

    //validação de endereço
    if (empty($endereco)) {
        $erro = "O campo endereço é obrigatório.";
    } elseif (mb_strlen($endereco) < 5) {
        $erro = "O campo endereço deve ter pelo menos 5 caracteres.";
    }

    //Validação de cidade
    if (empty($cidade)) {
        $erro = "O campo cidade é obrigatório.";
    } elseif (mb_strlen($cidade) < 3) {
        $erro = "O campo cidade deve ter no mínimo 3 caracteres.";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ\s-]+$/", $cidade)) {
        $erro = "O campo cidade deve conter apenas letras, hífens e espaços.";
    }

    //validação de senha
    if (empty($senha)) {
        $erro = "O campo senha é obrigatório.";
    } else if (strlen($senha) < 8) {
        $erro = "A senha deve ter no mínimo 8 caracteres.";
    } elseif (!preg_match('/[A-Z]/', $senha)) {
        $erro = "A senha deve conter pelo menos uma letra maiúscula.";
    } elseif (!preg_match('/[a-z]/', $senha)) {
        $erro = "A senha deve conter pelo menos uma letra minúscula.";
    } elseif (!preg_match('/[0-9]/', $senha)) {
        $erro = "A senha deve conter pelo menos um número.";
    } elseif (!preg_match('/[\W_]/', $senha)) {
        $erro = "A senha deve conter pelo menos um caractere especial.";
    } else {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    }

    if (empty($erro)) {
        if ($id) {
            $stmtCheck = $conn->prepare("SELECT id FROM usuarios WHERE (email = ? OR CPF = ?) AND id != ?");
            $stmtCheck->bind_param("ssi", $email, $CPF, $id);
        } else {
            $stmtCheck = $conn->prepare("SELECT id FROM usuarios WHERE email = ? OR CPF = ?");
            $stmtCheck->bind_param("ss", $email, $CPF);
        }

        $stmtCheck->execute();
        if ($stmtCheck->get_result()->num_rows > 0) {
            $erro = "E-mail ou CPF já cadastrado por outro usuário.";
        }
    }

    if ($id) {
        $sql = "UPDATE usuarios SET nome_usuarios = ?, email = ?, senha = ?, cpf = ?, endereco = ?, cidade = ?, cep = ?, data_nascimento = ?, atuacao = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssssssi', $nome, $email, $senhaHash, $CPF, $endereco, $cidade, $CEP, $data_nascimento, $area_atuacao, $id);
        $stmt->execute();
        header("Location: ../public/adm_usuarios.php");
        exit();
    } else {
        if ($erro == "") {
            $sql = "INSERT INTO usuarios (nome_usuarios, email, senha, CPF, endereco, cidade, cep, data_nascimento, atuacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $comando = $conn->prepare($sql);

            $comando->bind_param("sssssssss", $nome, $email, $senhaHash, $CPF, $endereco, $cidade, $CEP, $data_nascimento, $area_atuacao);
            $comando->execute();

            header("Location: adm_usuarios.php");
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
        header("Location: adm_usuarios.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cadastro</title>
</head>

<body class="bd_cad">

    <img class="fixa2" src="../assets/listras vermelho e cinza.png">

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample">
        <div class="offcanvas-header">
            <h3 class="offcanvas-title" id="offcanvasExampleLabel"> <img src="../assets/logo.png" alt="logo site"><strong>MENU</strong></h3>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="flex">
                <img src="../assets/frifas.webp" alt="fotodeperfil" class="fotodeperfil">

                <?php if ($usuarioLogado !== false) { ?>
                    <div class="identificacao-usuario">
                        <?php echo "Bem vindo(a), " . htmlspecialchars($usuarioLogado['nome_usuarios'], ENT_QUOTES, 'UTF-8') . "!"; ?>
                    </div>
                <?php } ?>
            </div>

                <div class="dropdown mt-3">
            <div class="textinhex">
                <br>
                <strong>
                    Em um mundo onde cada segundo conta, o RailLife é o cérebro que mantém a malha ferroviária viva, pontual e segura.
            </strong>
            <br>
            <br>
            <p>Cuidar de uma malha ferroviária vai muito além de ajustar horários. O RailLife previne falhas antes que elas aconteçam, otimiza rotas em tempo real e economiza energia, transformando a complexidade dos trilhos em uma experiência leve, pontual e segura para todos. Sem um gerenciamento atento, a rotina para. Com o RailLife, a vida segue o seu trilho sem interrupções.</p>
        </div>
    </div>

            <div class="dropdown mt-3">
                    <a href="cadastro_usuarios.php">cadastrar</a>
                    <br>
                    <a href="logout.php">desconectar</a>
            </div>
        </div>
    </div>

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

        <div class="margin_header">
            <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
        aria-controls="offcanvasExample">
        <img src="../assets/menu button.png" alt="Menu">
    </a>
    </div>

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

                <div class="cadastro-campo campo-nome">
                    <label for="nome">Nome completo:</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo"
                        value="<?php echo htmlspecialchars($nome ?? ''); ?>">
                </div>

                <div class="cadastro-campo campo-email">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" placeholder="Digite seu E-mail"
                        value="<?php echo htmlspecialchars($email ?? ''); ?>">
                </div>

                <div class="cadastro-campo campo-cpf">
                    <label for="CPF">CPF:</label>
                    <input type="text" id="CPF" name="CPF" placeholder="Digite seu CPF"
                        value="<?php echo htmlspecialchars($CPF ?? ''); ?>">
                </div>

                <div class="cadastro-campo campo-endereco">
                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereço"
                        value="<?php echo htmlspecialchars($endereco ?? ''); ?>">
                </div>

                <div class="cadastro-campo campo-cidade">
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" placeholder="Digite sua cidade"
                        value="<?php echo htmlspecialchars($cidade ?? ''); ?>">
                </div>

                <div class="cadastro-campo campo-cep">
                    <label for="CEP">CEP:</label>
                    <input type="text" id="CEP" name="CEP" placeholder="Digite seu Código de Endereçamento Postal"
                        value="<?php echo htmlspecialchars($CEP ?? ''); ?>">
                </div>

                <div class="cadastro-campo campo-data">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" id="data_nascimento" name="data_nascimento"
                        placeholder="Digite sua data de nascimento"
                        value="<?php echo htmlspecialchars($data_nascimento ?? ''); ?>">
                </div>

                <div class="cadastro-campo campo-senha">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
                </div>

                <div class="cadastro-campo campo-atuacao">
                    <label for="atuacao">Área de atuação:</label>
                    <select id="atuacao" name="atuacao">
                        <option value="comum" <?php echo ($area_atuacao === 'comum') ? 'selected' : ''; ?>>Usuário Comum</option>
                        <option value="adm" <?php echo ($area_atuacao === 'adm') ? 'selected' : ''; ?>>ADM</option>
                    </select>
                </div>

                
                <button type="submit">
                    <?php echo $id ? 'Salvar Alterações' : 'Cadastrar'; ?>
                </button>

            </form>

        </section>

    </main>


    <footer></footer>

    <img class="fixa" src="../assets/listras vermelho e cinza.png">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</body>

</html>