<?php?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/style.css">
    <title>Página de apresentação</title>
</head>
<body>
    <header class="hd_apresentacao">
            <div>
                <img src="assets/logo.png" alt="" class="img_apresentacao">
            </div>
            <nav class="nav_apresentacao">
                <a href="public/login.php" onclick="selectTab(this)">Login</a>
                <a href="public/cadastro.php" onclick="selectTab(this)">Cadastro</a>
            </nav>
    </header>

    <main class="mn_apresentacao">
        <div class="card_apresentacao">
            
        <div>
        
    
            <br>

            <h1>Monitoramento inteligente em tempo real</h1>

            <br>

            <h5>
                Nosso sistema foi desenvolvido para facilitar o
                monitoramento e o gerenciamento de informações de uma
                operação ferroviária. Através de sensores IoT, os dados
                são coletados em tempo real e apresentados de forma
                organizada em um painel de controle.
            </h5>
        </div>
            
            <img src="assets/trem.png" alt="trem" class="trem">

            

        </div>
        
    </main>



    <footer>
        <img class="fixa" src="assets/detalhe-listras-removebg-preview.png" alt="Detalhe da página">
    </footer>

        

</body>
</html>