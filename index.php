<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <title>Página de apresentação - RailLife</title>
</head>

<body>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample">
        <div class="offcanvas-header">
            <h3 class="offcanvas-title" id="offcanvasExampleLabel"> <img src="./assets/logo.png"
                    alt="logo site"><strong>MENU</strong></h3>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            <div class="dropdown mt-3">
                <div class="textinhex">
                    <br>
                    <strong>
                        Em um mundo onde cada segundo conta, o RailLife é o cérebro que mantém a malha ferroviária viva,
                        pontual e segura.
                    </strong>
                    <br>
                    <br>
                    <p>Cuidar de uma malha ferroviária vai muito além de ajustar horários. O RailLife previne falhas
                        antes que elas aconteçam, otimiza rotas em tempo real e economiza energia, transformando a
                        complexidade dos trilhos em uma experiência leve, pontual e segura para todos. Sem um
                        gerenciamento atento, a rotina para. Com o RailLife, a vida segue o seu trilho sem interrupções.
                    </p>
                </div>
            </div>

            <div class="dropdown mt-3">
                <!-- <a href="public/cadastro_usuarios.php">cadastrar</a>
                    <br>
                    <a href="logout.php">desconectar</a> -->
            </div>
        </div>
    </div>

    <img class="fixa2" src="assets/listras vermelho e cinza.png">

    <header class="hd_home">

        <div class="logo_home">
            <img src="assets/logo.png" alt="logo site">
        </div>

        <nav class="nav_home">
            <a href="public/home.php">Inicio</a>
            <a href="public/adm_sensores.php">Sensores</a>
            <a href="public/adm_trens.php">Trens</a>
            <a href="public/relatorios.php">Relatórios</a>
            <a href="public/adm_rotas.php">Rotas</a>
        </nav>

        <button class="menu_btn_home">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="margin_header">
            <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <img src="./assets/menu button.png" alt="Menu">
            </a>

        </div>

    </header>

    <main class="mn_apresentacao">
        <div class="card_apresentacao">

            <div class="texto-apresentacao">
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

    
               
                <div class="idx_flex">
                    <?php
                    $weatherUrl = "https://api.open-meteo.com/v1/forecast?latitude=-26.3044&longitude=-48.8456&current=temperature_2m,relative_humidity_2m,apparent_temperature&timezone=America%2FSao_Paulo";
                    $weatherContext = stream_context_create(['http' => ['timeout' => 5, 'header' => "Accept: application/json\r\nUser-Agent: RailLife/1.0\r\n"]]);
                    $weatherResponse = @file_get_contents($weatherUrl, false, $weatherContext);
                    $weather = $weatherResponse !== false ? json_decode($weatherResponse, true) : null;
                    $current = is_array($weather) ? ($weather['current'] ?? null) : null;
                    $weatherUnits = is_array($weather) ? ($weather['current_units'] ?? []) : [];
                    $weatherReady = is_array($current) && isset($current['temperature_2m'], $current['relative_humidity_2m']);
                    $weatherUpdated = $weatherReady ? substr((string) $current['time'], 11, 5) : '';
                    ?>
                    <section class="weather-box" aria-label="Condições climáticas em Joinville">
                        <div class="weather-header">
                            <span class="weather-tag">Clima agora</span>
                            <span class="weather-local">Joinville, SC</span>
                        </div>
                        <?php if ($weatherReady) { ?>
                            <p class="temp_atual">Clima: <?php echo htmlspecialchars((string) $current['temperature_2m'] . ($weatherUnits['temperature_2m'] ?? '°C'), ENT_QUOTES, 'UTF-8'); ?></p>
                            <div class="weather-details">
                                <span><b>Sensação:</b> <?php echo htmlspecialchars((string) ($current['apparent_temperature'] ?? '—') . ($weatherUnits['apparent_temperature'] ?? '°C'), ENT_QUOTES, 'UTF-8'); ?></span><br>
                                <span><b>Umidade:</b> <?php echo htmlspecialchars((string) $current['relative_humidity_2m'] . '%', ENT_QUOTES, 'UTF-8'); ?></span>
                            </div>
                            <p class="weather-note">Estimativa meteorológica · atualizado às <?php echo htmlspecialchars($weatherUpdated, ENT_QUOTES, 'UTF-8'); ?></p>
                        <?php } else { ?>
                            <p class="temp_atual">Não foi possível obter as condições atuais.</p>
                        <?php } ?>
                    </section>
                </div>
            </div>
                <img src="assets/Trem.png" alt="trem" class="trem">
            </div>
            
            
            
            
            


    </main>

    <footer>



    </footer>

    <img class="fixa" src="assets/listras vermelho e cinza.png">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</body>

</html>