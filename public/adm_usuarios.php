<?php

    include("../infra/conn.php");

    $result = $conn->query("SELECT * FROM usuarios");

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Pagina do administrador</title>
</head>
<body>

<img class="fixa2" src="../assets/listras vermelho e cinza.png">

   <header class="hd_home">

        <div class="logo_home">
            <img src="../assets/logo.png" alt="logo site">
        </div>

        <nav class="nav_home">
            <a href="#">Inicio</a>
            <a href="#">Sensores</a>
            <a href="#">Trens</a>
            <a href="#">Relatorios</a>
            <a href="#">Rotas</a>
        </nav>

        <button class="menu_btn_home">
            <span>Gerenciamento de cadastros</span>
            <span>Logout</span>
            
        </button>

    </header>
    
        <main class="mn_apresentacao">
        <div class="card_sensores">
         
        <div>
        <div class="flex">
            <div class="espaco"></div>
            <div class="escrita_sensor">
                <h1>Lista de sensores:</h1>
            </div>

                <div class="padding">
                </div>

                    <div>
                        <a href="login.php"><button type="button" class="btn btn-danger">Novo sensor</button></a>
                    </div>
        </div>

        <div>

        <table  class="tabela">
                <thead>
                    <tr>
                        <th class="tb_id">ID</th>
                        <th>nome</th>
                        <th>Rota</th>
                        <th>Tipo</th>
                        <th>Data de Cadastro</th>
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
                                <?php echo $linha["nome"];?>
                            </td>
                        
                            <td>
                                <?php echo $linha["localizacao"];?>
                            </td>
                        
                            <td>
                                <?php echo $linha["tipo"];?>
                            </td>
                      
                            <td>
                                <?php echo $linha["data_instalacao"]?>
                            </td>
                       
                            <td>
                                <a href="editar_sensor.php?id=<?php echo $linha["id"]?>">Editar</a>
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

</body>
</html>
