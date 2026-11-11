<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorios - RailLife</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" type="image/png" href="../assets/icon_trem.png">
</head>
<body>
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
<img class="fixa2" src="../assets/listras vermelho e cinza.png">

   <header class="hd_home">

        <div class="logo_home">
            <a href="../index.php">
                <img src="../assets/logo.png" alt="logo site">
            </a>
        </div>

        <nav class="nav_home">
            <a class="boom" href="home.php">Inicio</a>
            <a class="boom" href="adm_sensores.php">Sensores</a>
            <a class="boom" href="adm_trens.php">Trens</a>
            <a class="boom-ativado" href="relatorios.php">Relatórios</a>
            <a class="boom" href="adm_rotas.php">Rotas</a>

        </nav>

        <div class="margin_header">
            <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <img src="../assets/menu button.png" alt="Menu">
            </a>
        </div>

    </header>

     <main class="relatorios">
        <div class="volte_ct">
            <h1>Página em desenvolvimento!</h1>
            <h3>Esta página será lançada em <span class="ativado">breve</span>...</h3>
        </div>
        <div class="volte_ct">
            <img src="../assets/trilho_descontinuado.png" alt="Trilho descontinuado" class="trilho_descontinuado">
        </div>
        <div class="volte_ct">
            <p><b>Clique abaixo para voltar a página anterior</b></p>
            <a href="cadastro_usuarios.php"><button type="button" class="btn btn-secondary">Voltar</button></a>
        </div>
     </main>
     <script src="../scripts/popup_up.js"></script>  
        <script src="../scripts/popup_up.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <img class="fixa" src="../assets/listras vermelho e cinza.png">

     <img class="fixa" src="../assets/listras vermelho e cinza.png">
</body>
</html>