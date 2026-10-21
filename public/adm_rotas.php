<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    <title>rotas</title>
</head>
<body>
    
<img class="fixa2" src="../assets/listras vermelho e cinza.png">

   <header class="hd_home">

        <div class="logo_home">
            <a href="home.php">
            <img src="../assets/logo.png" alt="logo site">
            </a>
        </div>

        <nav class="nav_home">
            <a href="home.php">Inicio</a>
            <a href="adm_sensores.php">Sensores</a>
            <a href="adm_trens.php">Trens</a>
            <a href="#">Relatorios</a>
            <a href="adm_rotas.php" class="ativado">Rotas</a>
        </nav>

        <button class="menu_btn_home">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </header>
    
        <main class="mn_apresentacao">
        <div class="card_sensores">
         
        <div>
        <div class="flex">
            <div class="espaco"></div>
            <div class="escrita_sensor">
                <h1>Lista de rotas:</h1>
            </div>

                <div class="padding3">
                </div>

                    <div>
                        <a href="sensores.php"><button type="button" class="btn btn-danger">Nova rota</button></a>
                    </div>
        </div>

        <div>

        <table  class="tabela">
                <thead>
                    <tr>
                        <th class="tb_id">ID</th>
                        <th>nome</th>
                        <th>Origem</th>
                        <th>Destino</th>
                        <th class="tb_acoes">Ações</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>


        </div>

        </div>

        </div>
        <!--  -->
        <div class="overlay" id="overlay">

        <!-- Popup -->
        <div class="popup">

            <div class="icone">
                📡
            </div>

            <h1>Adicionar rota</h1>

            <form>

                <div class="form-grid">

                    <div class="campo">
                        <label>Nome:</label>
                        <input type="text" placeholder="Ex.: Sensor Norte">
                    </div>

                    <div class="campo">
                        <label>Tipo:</label>
                        <input type="text" placeholder="Ex.: Temperatura">
                    </div>

                    <div class="campo">
                        <label>Rota:</label>
                        <input type="text" placeholder="Ex.: Trilho do Norte">
                    </div>

                    <div class="campo">
                        <label>Status:</label>
                        <input type="text" placeholder="Ex.: Para instalação">
                    </div>

                    <div class="campo">
                        <label>Data de instalação:</label>
                        <input type="text" placeholder="Ex.: 19/01/2009">
                    </div>

                </div>

                <button class="btnAdicionar" type="submit">
                    Adicionar
                </button>

            </form>

        </div>
    </div>
        
        
        
    </main>

    <footer></footer>

   <img class="fixa" src="../assets/listras vermelho e cinza.png">
    <script src="../scripts/popup_up.js"></script>  

</body>
</html>