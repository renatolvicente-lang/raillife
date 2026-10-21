<?php 
    
    include("../infra/conn.php");
session_start();

    if(!isset($_SESSION["usuario"])){
        header("Location: login.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Trens</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <img class="fixa2" src="../assets/listras vermelho e cinza.png">
    <header class="hd_home">

        <div class="logo_home">
            <a href="../index.php">
            <img src="../assets/logo.png" alt="logo site">
            </a>
        </div>

       <nav class="nav_home">
            <a href="home.php" >Inicio</a>
            <a href="adm_sensores.php" >Sensores</a>
            <a href="adm_trens.php">Trens</a>
            <a href="#">Relatorios</a>
            <a href="adm_rotas.php">Rotas</a>
        </nav>

        <button class="menu_btn_home" img src="../assets/menu button.png">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </header>
    
    <main class="cadastro-pagina">
        <section class="cadastro-formulario">
        <form class="grid" method="POST">
                <div class="cadastro-campo campo-nome">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" placeholder="Nome do trem">
                </div>
                <div class="cadastro-campo campo-modelo">
                    <label for="modelo">Modelo:</label>
                    <input type="text" name="modelo" id="modelo">
                </div>
                <div class="cadastro-campo campo-modelo">
                    <label for="modelo">Modelo:</label>
                    <input type="text" name="modelo" id="modelo">
                </div>
        </form>
        </section>
    </main>

    <img class="fixa" src="../assets/listras vermelho e cinza.png">
</body>
</html>