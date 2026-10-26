<?php
session_start();

include("../infra/conn.php");

// Verifica se existe usuário logado na sessão. Se não houver, redireciona para o login.
// Isso evita acessar a página sem autenticação e impede o erro de tentar mostrar dados de alguém não logado.
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

// Busca o ID do usuário logado na sessão. O nome está em $_SESSION['usuario'], mas o ID está em $_SESSION['id'].
// Essa linha corrige o problema de tentar usar o nome como identificador para buscar o registro no banco.
$id = $_SESSION['id'] ?? null;
$usuario = false;

// Consulta o usuário pelo ID para recuperar o nome completo do cadastro.
// Isso é necessário porque a sessão guarda o nome do usuário em uma variável separada e a página precisa do registro completo.
if ($id !== null) {
    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
}

// Garante que o nome será exibido com escaping para evitar problemas com caracteres especiais.
// Também define um fallback para segurança caso o usuário não seja encontrado no banco.
$nome = $usuario !== false && !empty($usuario['nome']) ? htmlspecialchars($usuario['nome'], ENT_QUOTES, 'UTF-8') : 'Usuário';

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RailLife - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
</head>

<img class="fixa2" src="../assets/listras vermelho e cinza.png">

<body>



    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample">
        <div class="offcanvas-header">
            <h3 class="offcanvas-title" id="offcanvasExampleLabel"> <img src="../assets/logo.png"
                    alt="logo site"><strong>MENU</strong></h3>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

        <div class="flex">

        <img src="../assets/frifas.webp" alt="fotodeperfil" class="fotodeperfil">

                    <?php if ($usuario !== false) { ?>
                <div class="identificacao-usuario">
                    <?php echo "Bem vindo(a), " . htmlspecialchars($usuario['nome_usuarios'], ENT_QUOTES, 'UTF-8') . "!"; ?>
                    <!-- Exibe o nome do usuário autenticado. A condição verifica se o registro foi encontrado no banco, evitando erros ao tentar imprimir dados vazios. -->
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
            <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <img src="../assets/menu button.png" alt="Menu">
            </a>
        </div>

    </header>

    <main class="mn_home">

        <div class="repar1hm">
            <h1><strong>Dashboard RAILLIFE</strong></h1>
            
            <h5>Acompanhe os principais dados da operação ferroviária em tempo real.</h5>

            <div class="padding3"></div>

            <div class="quadadofofo">
                    <h2>Trens em operação</h2>
                    
            </div>

                        <div class="padding3"></div>

            <div class="quadadofofo">
                    <h2>Sensores em operação</h2>
                    
                </div>


                        <div class="padding3"></div>

            <div class="quadadofofo">
                    <h2>Rotas em operação</h2>
                    
            </div>  

        </div>

        <div class="repar2hm">

            <div class="circuito-container">
    <!-- Linha visível do circuito feita com SVG -->
    <svg class="trilho" viewBox="0 0 500 300">
      <path 
        d="M 50,150 C 150,50 350,250 450,150 C 350,50 150,250 50,150 Z" 
        fill="none" 
        stroke="#444466" 
        stroke-width="4" 
        stroke-dasharray="6 6"
      />
    </svg>

    <!-- Bolinha que percorre o circuito -->
    <div class="bolinha"></div>
  </div>

        </div>
            

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