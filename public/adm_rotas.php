<?php 
    include("../infra/conn.php");
    session_start();

    if(!isset($_SESSION["usuario"]) || $_SESSION["atuacao"] != "adm"){
        header("Location: home.php");
    }
    $result = $conn->query("SELECT id, nome_rotas, origem, destino, tempo AS duracao FROM rotas");


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
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample">
        <div class="offcanvas-header">
            <h3 class="offcanvas-title" id="offcanvasExampleLabel"> <img src="../assets/logo.png" alt="logo site"><strong>MENU</strong></h3>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="dropdown mt-3">
                    <a href="adm_usuarios.php">cadastrar</a>
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
            <a href="home.php">Inicio</a>
            <a href="adm_sensores.php">Sensores</a>
            <a href="adm_trens.php">Trens</a>
            <a href="#">Relatorios</a>
            <a href="adm_rotas.php" class="ativado">Rotas</a>
             
        </nav>

        <div class="margin_header">
            <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
        aria-controls="offcanvasExample">
        <img src="../assets/menu button.png" alt="Menu">
    </a>
    </div>

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
                        <a href="Rotas.php"><button type="button" class="btn btn-danger">Nova rota</button></a>
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
                        <th>Duração</th>
                        <th class="tb_acoes">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($linha = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo (int) $linha["id"]; ?></td>
                            <td><?php echo htmlspecialchars($linha["nome_rotas"]); ?></td>
                            <td><?php echo htmlspecialchars($linha["origem"]); ?></td>
                            <td><?php echo htmlspecialchars($linha["destino"]); ?></td>
                            <td><?php echo htmlspecialchars(substr($linha["duracao"], 0, 5)); ?></td>
                            <td>
                                <a href="Rotas.php?id=<?php echo $linha["id"]?>" class="btn btn-danger ">Editar</a>
                                <a href="excluir_rotas.php?id=<?php echo $linha["id"]; ?>" class="btn btn-danger">Excluir</a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>

        </div>

        </div>
    </div>
        
        
        
    </main>

    <footer></footer>

   <img class="fixa" src="../assets/listras vermelho e cinza.png">
    <script src="../scripts/popup_up.js"></script>  
        <script src="../scripts/popup_up.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</body>
</html>