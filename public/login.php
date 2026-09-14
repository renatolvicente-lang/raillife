<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>

<header class="header">
        <img src="../assets/logo.png" alt="Logo do site">

</header>

<main class="pagina-usuario">

    <section class="formulario-container">

        <h2>LOGIN</h2>
        <p class="subtitulo">Acesse sua conta</p>

        <form method="POST">

            <div class="campo">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>

            <div class="campo">
                <input type="password" id="senha" name="senha" placeholder="Senha" required>
            </div>

            <button type="submit">ENTRAR</button>

        </form>

    </section>



    <a href="../index.php" class="voltar">← Voltar</a>

</main>

</body>
</html>