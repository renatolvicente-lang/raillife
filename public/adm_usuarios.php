<?php
    include("../infra/conn.php");
    session_start();

     if(!isset($_SESSION["usuario"]) || $_SESSION["atuacao"] != "adm"){
          header("Location: home.php");
          exit();
     }

     $id = $_SESSION['id'] ?? null;
     $usuarioLogado = false;

     if ($id !== null) {
         $sql = "SELECT * FROM usuarios WHERE id = ?";
         $stmt = $conn->prepare($sql);
         $stmt->bind_param("i", $id);
         $stmt->execute();
         $resultUsuario = $stmt->get_result();
         $usuarioLogado = $resultUsuario->fetch_assoc();
     }

    function formatarCpf($cpf)
    {
        $cpf = preg_replace('/\D/', '', (string) $cpf);

        if (strlen($cpf) !== 11) {
            return $cpf;
        }

        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
    }

    $result = $conn->query("SELECT * FROM usuarios");



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Página do administrador</title>
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
    
        <main class="mn_apresentacao">
        <div class="card_sensores">
         
        <div>
        <div class="flex">
            <div class="espaco"></div>
                
                <div class="escrita_sensor">
                    <h1>Lista de Usuários:</h1>
                </div>

                <div class="padding">
            </div>
            
            <div>
                <a href="cadastro_usuarios.php"><button type="button" class="btn btn-danger">Novo Usuario</button></a>
            </div>
        </div>
        <div class="flex">
        <div class="espaco"></div>
        <p>Gerencie os usuários do sistema, edite informações ou remova acessos.</p>
        </div>

        <div>

        <div class="tabela-wrap">
            <table class="tabela">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>nome</th>
                        <th>Email</th>
                        <th>Atuação</th>
                        <th>CPF</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($linha  = $result->fetch_assoc()){?>
                        <tr>
                            <td>
                                <?php echo $linha["id"];?>
                            </td>
                        
                            <td>
                                <?php echo $linha["nome_usuarios"];?>
                            </td>
                        
                            <td>
                                <?php echo $linha["email"];?>
                            </td>
                        
                            <td>
                                <?php echo $linha["atuacao"];?>
                            </td>
                      
                            <td>
                                <?php echo formatarCpf($linha["cpf"]); ?>
                            </td>
                       
                            <td>
                                <a href="cadastro_usuarios.php?id=<?php echo $linha["id"]?>" >Editar</a>
                                <a href="excluir_usuarios.php?id=<?php echo $linha["id"]?>" onclick="return confirm('tem certeza que deseja apagar esse usuário?')">Excluir</a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>


        </div>

        </div>

        </div>
        
        
    </main>

    <footer></footer>

   <img class="fixa" src="../assets/listras vermelho e cinza.png">

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
