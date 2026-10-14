<?php
 session_start();
    
    include("../infra/conn.php");

    $result = $conn->query("SELECT * FROM trens INNER JOIN rotas ON trens.id_rotas = rotas.id INNER JOIN usuarios ON trens.id_usuarios = usuarios.id");

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Pagina de gerenciamento de sensores</title>
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
            <a href="adm_trens.php" class="ativado">Trens</a>
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
        <div class="card_sensores">
         
        <div>
        <div class="flex">
            <div class="espaco"></div>
            <div class="escrita_sensor">
                <h1>Lista de trens:</h1>
            </div>

                <div class="padding2">
                </div>

                    <div class="btn_trem">
                        <a href="cadastro_trens.php"><button type="button" class="btn btn-danger">Novo trem</button></a>
                    </div>
        </div>

        <div>

        <table  class="tabela">
                <thead>
                    <tr>
                        <th class="tb_id">ID</th>
                        <th>Rota</th>
                        <th>Nome</th>
                        <th>Usuario</th>
                        <th class="tb_acoes">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($linha  = $result->fetch_assoc()){?>
                        <tr>
                            <td>
                                <?php echo $linha["id"];?>
                            </td>
                        
                            <td>
                                <?php echo $linha["nome_trens"];?>
                            </td>
                        
                            <td>
                                <?php echo $linha["nome_rotas"];?>
                            </td>
                        
                            <td>
                                <?php echo $linha["nome_usuarios"];?>
                            </td>
                       
                            <td>
                                <button id="btnAbrir">Editar</button>
                                <a href="excluir_sensor.php?id=<?php echo $linha["id"]?>">Excluir</a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>


        </div>

        </div>

    </div>
        
        
        
    </main>

    <footer></footer>

   <img class="fixa" src="../assets/listras vermelho e cinza.png">
    <script src="../scripts/popup_up.js"></script>
</body>
</html>
