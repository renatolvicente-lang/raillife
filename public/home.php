<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RailLife - Sensores</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<img class="fixa2" src="../assets/listras vermelho e cinza.png">

<body>

    <header class="hd_home">

        <div class="logo_home">
            <a href="home.php">
            <img src="../assets/logo.png" alt="logo site">
            </a>
        </div>

        <nav class="nav_home">
            <a href="home.php" class="ativado">Inicio</a>
            <a href="adm_sensores.php">Sensores</a>
            <a href="adm_trens.php">Trens</a>
            <a href="#">Relatorios</a>
            <a href="#">Rotas</a>
        </nav>

        <button class="menu_btn_home">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </header>

    <main class="mn_home">
        <section class="">
            <h1>Dashboard RAILLIFE</h1>
            <p>Acompanhe os principais dados da operação ferroviária em tempo real.</p>
            <div class="hm_flex">
                <div class='hm_card trens_ativos'>
                    <div>
                        <img src="../assets/icon_trem.png" alt="" class = "icon_trem">
                    </div>
                    <div>
                        <div class=""><h3>Trens Ativos</h3></div>
                        <div class=""></div>
                    </div>
                </div>

                <div class = "hm_card sensores">
                    <div>
                        <img src="../assets/sensor_icon.png" alt="" class = "icon_trem">
                    </div>
                    <div>
                        <div class=""><h3>Sensores Ativos</h3></div>
                        <div class=""></div>
                    </div>
                </div>
                <div class = "hm_card rotas_ativas">
                    <div>
                        <img src="../assets/rotas_icon.png" alt="" class = "icon_trem">
                    </div>
                    <div>
                        <div class=""><h3>Rotas Ativas</h3></div>
                        <div class=""></div>
                    </div>
                </div>
                <div class="hm_card relatorios">
                    <div>
                        <img src="../assets/relatorios_icon.png" alt="" class = "icon_trem">
                    </div>
                    <div>
                        <div class=""><h3>Relatórios</h3></div>
                        <div class=""></div>
                    </div>
                </div>
            </div>
            
        </section>
        <section>
            <div class="hm_flex">
                <div class="hm_status status_trem">
                </div>
                <div class="hm_status status_sensores">
                </div>
                <div class="hm_status atividades">
                </div>
            </div>
        </section>

    </main>

   <img class="fixa" src="../assets/listras vermelho e cinza.png">

</body>
</html>