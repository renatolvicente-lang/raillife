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
 

    <img class="fixa2" src="assets/listras vermelho e cinza.png">

   <header class="hd_home">

        <div class="logo_home">
            <img src="assets/logo.png" alt="logo site">
        </div>

        <nav class="nav_home">
            <a href="index.php" class="ativado">Inicio</a>
            <a href="public/adm_sensores.php" >Sensores</a>
            <a href="public/adm_trens.php">Trens</a>
            <a href="#">Relatorios</a>
            <a href="#">Rotas</a>
        </nav>

        <button class="menu_btn_home">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </header>

    <main class="mn_apresentacao">
        <div class="card_apresentacao">
            
        <div>
        
    
            <br>

            <h2><b>Monitoramento inteligente em tempo real</b></h2>

            <br>
                <div class="escrita_inicial">
            <h3>
                Nosso sistema foi desenvolvido para facilitar o
                monitoramento e o gerenciamento de informações de uma
                operação ferroviária. Através de sensores IoT, os dados
                são coletados em tempo real e apresentados de forma
                organizada em um painel de controle.
            </h3>
                </div>
        </div>
            
            <img src="assets/trem.png" alt="trem" class="trem">

            

        </div>
        
    </main>

    <footer></footer>

   <img class="fixa" src="assets/listras vermelho e cinza.png">

</body>
</html>