<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>

    <header class="header">
        <img src="../assets/logo.png" alt="Logo do site">
    </header>

    <main class="pagina-usuario">

        <section class="formulario-container">

            <h2>LOGIN</h2>

            <form method="POST">

                <div class="campo">
                    <label for="email">Email:</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Ex.: user@gmail.com" 
                        required
                    >
                </div>

                <div class="campo">
                    <label for="senha">Senha:</label>
                    <input 
                        type="password" 
                        id="senha" 
                        name="senha" 
                        placeholder="*************" 
                        required
                    >
                </div>

                <button type="submit">Conectar</button>

            </form>

        </section>

        <a href="../index.php" class="voltar">← Voltar</a>

    </main>

</body>
</html>