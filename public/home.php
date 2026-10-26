<?php
session_start();

include("../infra/conn.php");


if(!isset($_SESSION["usuario"])){
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RailLife - Sensores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
</head>

<img class="fixa2" src="../assets/listras vermelho e cinza.png">

<body>

   

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample">
        <div class="offcanvas-header">
            <h3 class="offcanvas-title" id="offcanvasExampleLabel"> <img src="../assets/logo.png" alt="logo site"><strong>MENU</strong></h3>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

    <div class="dropdown mt-3">
            <div class="textinhex">
                <strong>
                    Em um mundo onde cada segundo conta, o RailLife é o cérebro que mantém a malha ferroviária viva, pontual e segura.
            </strong>
        </div>
    </div>

            <div class="dropdown mt-3">
                    <a href="adm_usuarios.php">cadastrar</a>
                    <br>
                    <a href="logout.php">desconectar</a>
            </div>
        </div>
    </div>

    <header class="hd_home">

        <div class="logo_home">
            <a href="../index.php">
                <img src="../assets/logo.png" alt="logo site">
            </a>
        </div>

        <nav class="nav_home">
            <a href="home.php" class="ativado">Inicio</a>
            <a href="adm_sensores.php">Sensores</a>
            <a href="adm_trens.php">Trens</a>
            <a href="#">Relatorios</a>
            <a href="adm_rotas.php">Rotas</a>
             
        </nav>

        <div class="margin_header">
            <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
        aria-controls="offcanvasExample">
        <img src="../assets/menu button.png" alt="Menu">
    </a>
    </div>

    </header>

    <main class="mn_home">
        <section class="">
            <h1>Dashboard RAILLIFE</h1>
            <p>Acompanhe os principais dados da operação ferroviária em tempo real.</p>
            <div class="hm_flex">
                <div class='hm_card trens_ativos'>
                    <div>
                        <img src="../assets/icon_trem.png" alt="" class="icon_trem">
                    </div>
                    <div>
                        <div class="">
                            <h3>Trens Ativos</h3>
                        </div>
                        <div class=""></div>
                    </div>
                </div>

                <div class="hm_card sensores">
                    <div>
                        <img src="../assets/sensor_icon.png" alt="" class="icon_trem">
                    </div>
                    <div>
                        <div class="">
                            <h3>Sensores Ativos</h3>
                        </div>
                        <div class=""></div>
                    </div>
                </div>
                <div class="hm_card rotas_ativas">
                    <div>
                        <img src="../assets/rotas_icon.png" alt="" class="icon_trem">
                    </div>
                    <div>
                        <div class="">
                            <h3>Rotas Ativas</h3>
                        </div>
                        <div class=""></div>
                    </div>
                </div>
                <div class="hm_card relatorios">
                    <div>
                        <img src="../assets/relatorios_icon.png" alt="a" class="icon_trem">
                    </div>
                    <div>
                        <div class="">
                            <h3>Relatórios</h3>
                        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>