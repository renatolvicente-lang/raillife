<?php
require_once('../infra/conn.php');
session_start();


$erro = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //Verificando se tem um id na url
    $id = $_GET['id'] ?? null;

    $usuario = null;
    
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $CPF = $_POST['CPF'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $CEP = $_POST['CEP'];
    $data_nascimento = $_POST['data_nascimento'];
    $area_atuacao = $_POST['atuacao'];

    $cpf_limpo = preg_replace('/\D/', '', $CPF);

    


    //Validação do nome
     if(empty($nome)){
        $erro = "O campo nome é obrigatório.";
        } elseif (mb_strlen($nome) < 5){
            $erro = "O campo nome deve ter no mínimo 5 caracteres.";
        }elseif(!preg_match("/^[a-zA-ZÀ-ÿ\s]+$/", $nome)){
            $erro = "O campo nome deve conter apenas letras e espaços.";
        }else{
            $partes_nome = explode(" ", $nome);
            $partes_nome = array_filter($partes_nome);

            if (count($partes_nome) < 2) {
                $erro = "O campo nome deve conter nome e sobrenome.";
            }
        }

        //Validação do email
        if(empty($email)){
            $erro = "O campo email é obrigatório.";
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erro = "O campo email é inválido.";
        } elseif (strpos($email," ") !== false){
            $erro = "O campo email não pode conter espaços.";
        }

        // Validação do CPF
    if (strlen($cpf_limpo) !== 11) {
        $erro = "CPF inválido 1";
    }elseif (preg_match('/(\d)\1{10}/', $cpf_limpo)) {
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

    //Validação de cidade
        if(empty($cidade)){
            $erro = "O campo cidade é obrigatório.";
        } elseif (mb_strlen($cidade) < 3){
            $erro = "O campo cidade deve ter no mínimo 3 caracteres.";
        } elseif(!preg_match("/^[a-zA-ZÀ-ÿ\s-]+$/", $cidade)){
            $erro = "O campo cidade deve conter apenas letras, hífens e espaços.";
        }

    //validação de senha
        if(empty($senha)){
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

    if($id){
        $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ?, cpf = ?, endereco = ?, cidade = ?, CEP = ?, data_nascimento = ?, atuacao = ? WHERE id = ?"; ;

        $stmt = $conn->prepare($sql);

        $stmt ->bind_param('sssssssssi',$nome, $email, $senha, $CPF, $endereco, $cidade, $CEP, $data_nascimento, $area_atuacao, $id);
        $stmt ->execute();
         header("Location: ../public/adm_usuarios.php");
         exit();
    }else{  
        if ($erro == "") {
        $sql = "INSERT INTO usuarios (nome, email, senha, CPF, endereco, cidade, CEP, data_nascimento, atuacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $comando = $conn->prepare($sql);

        $comando->bind_param("sssssssss",$nome, $email, $senha, $CPF, $endereco, $cidade, $CEP, $data_nascimento, $area_atuacao);
        $comando->execute();

        header("Location: ../public/adm_usuarios.php");
        exit();
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
            <img src="../assets/logo.png" alt="logo site">
        </div>

        <nav class="nav_home">
            <a href="#" class="ativado">Inicio</a>
            <a href="#" >Sensores</a>
            <a href="#">Trens</a>
            <a href="#">Relatorios</a>
            <a href="#">Rotas</a>
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

           <?php if ($erro != ""){ ?>
        <div class="mensagem-erro">
            <?php echo $erro; ?>
        </div>
    <?php } ?>

            <form class="grid" method="POST">

                <div class="cadastro-campo campo-nome">
                    <label for="nome">Nome completo:</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" value="<?php echo htmlspecialchars($nome ?? '');?>">
                </div>

                <div class="cadastro-campo campo-email">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" placeholder="Digite seu E-mail" value="<?php echo htmlspecialchars($email ?? ''); ?>">
                </div>

                <div class="cadastro-campo campo-cpf">
                    <label for="CPF">CPF:</label>
                    <input type="text" id="CPF" name="CPF" placeholder="Digite seu CPF" value="<?php echo htmlspecialchars($CPF ?? ''); ?>">
                </div>

                <div class="cadastro-campo campo-endereco">
                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereço" value="<?php echo htmlspecialchars($endereco ?? ''); ?>">
                </div>

                <div class="cadastro-campo campo-cidade">
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" placeholder="Digite sua cidade" value="<?php echo htmlspecialchars($cidade ?? ''); ?>">
                </div>

                <div class="cadastro-campo campo-cep">
                    <label for="CEP">CEP:</label>
                    <input type="text" id="CEP" name="CEP" placeholder="Digite seu Código de Endereçamento Postal" value="<?php echo htmlspecialchars($CEP ?? ''); ?>">
                </div>

                <div class="cadastro-campo campo-data">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" id="data_nascimento" name="data_nascimento" placeholder="Digite sua data de nascimento" value="<?php echo htmlspecialchars($data_nascimento ?? ''); ?>">
                </div>

                <div class="cadastro-campo campo-senha">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
                </div>

                <div class="cadastro-campo campo-atuacao">
                    <label for="atuacao">Área de atuação:</label>
                    <select id="atuacao" name="atuacao"">
                     <option value="Usuário Comum" <?php echo (isset($area_atuacao) && $area_atuacao === 'Usuário Comum') ? 'selected' : ''; ?>>Usuário Comum</option>
                        <option value="ADM" <?php echo (isset($area_atuacao) && $area_atuacao === 'ADM') ? 'selected' : ''; ?>>ADM</option>
                    </select>
                </div>

                <button type="submit">Cadastrar</button>

            </form>

        </section>

    </main>


    <footer></footer>

   <img class="fixa" src="../assets/listras vermelho e cinza.png">

</body>

</html>