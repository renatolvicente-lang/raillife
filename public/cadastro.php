<?php
require_once('../infra/conn.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $CPF = $_POST['CPF'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $CEP = $_POST['CEP'];
    $data_nascimento = $_POST['data_nascimento'];

    $cpf_limpo = preg_replace('/\D/', '', $CPF);
    $quantidade_digitos_cpf = strlen($cpf_limpo);

    if ($quantidade_digitos_cpf > 11) {
        exit;
    } elseif ($quantidade_digitos_cpf < 11) {
        exit;
    }

    $cep_limpo = preg_replace('/\D/', '', $CEP);
    $quantidade_digitos_cep = strlen($cep_limpo);

    if ($quantidade_digitos_cep > 8) {
        exit;
    } elseif ($quantidade_digitos_cep < 8) {
        exit;
    }

    $sql = "INSERT INTO usuarios (nome, email, CPF, endereco, cidade, CEP, data_nascimento) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $comando = $conn->prepare($sql);

    $comando->bind_param(
        "sssssss",
        $nome,
        $email,
        $CPF,
        $endereco,
        $cidade,
        $CEP,
        $data_nascimento
    );

    $comando->execute();

    header("Location: ../public/login.php");
    exit;
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

   <header><div></div></header>

    <main class="cadastro-pagina">
        <div class="container_titulo">
                <img src="../assets/Mockup_RAILLIFE-removebg-preview.png" alt="Logo do site">
        </div>
        <section class="cadastro-formulario">

           

            <form class="grid" method="POST">

                <div class="cadastro-campo campo-nome">
                    <label for="nome">Nome completo:</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo">
                </div>

                <div class="cadastro-campo campo-email">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" placeholder="Digite seu E-mail">
                </div>

                <div class="cadastro-campo campo-cpf">
                    <label for="CPF">CPF:</label>
                    <input type="text" id="CPF" name="CPF" placeholder="Digite seu CPF">
                </div>

                <div class="cadastro-campo campo-endereco">
                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereço">
                </div>

                <div class="cadastro-campo campo-cidade">
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" placeholder="Digite sua cidade">
                </div>

                <div class="cadastro-campo campo-cep">
                    <label for="CEP">CEP:</label>
                    <input type="text" id="CEP" name="CEP" placeholder="Digite seu Código de Endereçamento Postal">
                </div>

                <div class="cadastro-campo campo-data">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" id="data_nascimento" name="data_nascimento" placeholder="Digite sua data de nascimento">
                </div>

                <div class="cadastro-campo campo-senha">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
                </div>

                <button type="submit">Cadastrar</button>

            </form>

        </section>

    </main>

    <img class="fixa" src="../assets/listras vermelho e cinza.png">
    <img class="fixa2" src="../assets/listras vermelho e cinza.png">

    <footer></footer>

</body>

</html>