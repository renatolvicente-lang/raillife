<?php

include "../infra/conn.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST[""];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

    $resultado = $conn -> query($sql);

    if(mysqli_num_rows($resultado)> 0 ){
        $_SESSION["usuario"] = $nome;
        header("Location: home.php");
    }else{
        echo "O usuario não existe";
    }
}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>

    <header class="login-header">
        <img src="../assets/logo.png" alt="Logo do site">
    </header>

    <main class="login-pagina">

        <section class="login-formulario">

            <h2>LOGIN</h2>

            <form method="POST">

                <div class="login-campo">
                    <label for="nome">Nome: </label>

                    <input type="text" name="nome" id="nome" placeholder="nome completo" required>
                </div>

                <div class="login-campo">
                    <label for="email">Email:</label>

                    <input type="email" id="email" name="email" placeholder="Ex.: user@gmail.com" required>

                </div>

                <div class="login-campo">
                    <label for="senha">Senha:</label>

                    <input type="password" id="senha" name="senha" placeholder="*************" required>
                </div>

                <button type="submit">Conectar</button>

            </form>

        </section>

    </main>

    <img class="fixa" src="../assets/detalhe_pagina.png" alt="Detalhe da página">

</body>
</html>