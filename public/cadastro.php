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



        $sql = "INSERT INTO usuarios (nome, email, CPF, endereco, cidade, CEP, data_nascimento) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $comando = $conn->prepare($sql);

        $comando->bind_param("ssssssss", $nome, $email, $CPF, $endereco, $cidade, $CEP, $data_nascimento);

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

    <header class="cadastro-header">
        <nav>
            <img src="../assets/logo.png" alt="Logo do site">
        </nav>
    </header>

    <main class="cadastro-pagina">
        <section class="cadastro-formulario">
            <form>
                <div class="container_titulo">
                <h2>CADASTRO</h2>
                </div>

                <form method="POST">

                    <div class="container_esquerda">

                    <div class="cadastro-campo">
                        <label for="">Nome completo:</label>
                        <br>
                        <input type="text" name="nome" placeholder="Digite seu nome completo">
                    </div>
                    <br>
                    <br>
                    <div class="cadastro-campo">
                        <label for="">E-mail:</label>
                        <br>
                        <input type="email" name="email" placeholder="Digite seu E-mail">
                    </div>
                    <br>
                    <br>
                    <div class="cadastro-campo">
                        <label for="">CPF:</label>
                        <br>
                        <input type="text" name="CPF" placeholder="Digite seu CPF">
                    </div>
                    <br>
                    <br>
                    <div class="cadastro-campo">
                        <label for="">Endereço:</label>
                        <br>
                        <input type="text" name="endereco" placeholder="Digite seu endereço">
                    </div>
                    <br>

                    </div>

                    <div class="container_direita">

                    <br>
                    <div class="cadastro-campo">
                        <label for="">Cidade:</label>
                        <br>
                        <input type="text" name="cidade" placeholder="Digite sua cidade">
                    </div>
                    <br>
                    <br>
                    <div class="cadastro-campo">
                        <label for="">CEP:</label>
                        <br>
                        <input type="text" name="CEP" placeholder="Digite seu Código de Endereçamento Postal">
                    </div>
                    <br>
                    <br>
                    <div class="cadastro-campo">
                        <label for="">Data de Nascimeto:</label>
                        <br>
                        <input type="date" name="data_nascimento" placeholder="Digite sua data de nascimeto">
                        <br>
                        <br>
                        
                    </div>

                </div>
                <button type="submit">Cadastrar</button>
                </form>
        </section>
    </main>

    <img class="fixa" src="../assets/detalhe_pagina.png" alt="Detalhe da página">

    <footer></footer>

</body>

</html>