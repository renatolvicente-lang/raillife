<?php 
    
    include("../infra/conn.php");
    session_start();

    
        if (!isset($_SESSION["usuario"]) || $_SESSION["atuacao"] == "adm") {
        header("Location: home.php");
        exit();
    }


    $id = $_GET["id"] ?? null;

    $sql = "SELECT * FROM rotas";
    $result = $conn->query($sql);
    
    $result_usuario = $conn->query("SELECT * FROM usuarios");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["nome"];
        $rota = $_POST["rota"];
        $usuario = $_POST["usuario"];
        $fabricacao = $_POST["fabricacao"];
        $capacidade = $_POST["capacidade"];
        $modelo = $_POST["modelo"];


        if($id){
            $sql = "UPDATE trens SET nome_trens=?, modelo=?, capacidade=?, ano_fabricacao=?, id_rotas=? , id_usuarios=? WHERE id = $id";
            $stmt = $conn->prepare($sql);
            $stmt-> bind_param("ssisii", $nome, $modelo, $capacidade, $fabricacao, $rota, $usuario);
            $stmt->execute();

            header("Location: adm_trens.php");
            exit();
            
        }else{

            $sql = "INSERT INTO trens (nome_trens, modelo, capacidade, ano_fabricacao, id_rotas, id_usuarios)VALUES (?,?,?,?,?)";
    
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssisii", $nome,$modelo, $capacidade, $fabricacao, $rota, $usuario);
            $stmt->execute();
    
            header("Location: adm_trens.php");
            exit();
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Trens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">

</head>
<body>
    <img class="fixa2" src="../assets/listras vermelho e cinza.png">

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample">
        <div class="offcanvas-header">
            <h3 class="offcanvas-title" id="offcanvasExampleLabel"> <img src="../assets/logo.png" alt="logo site"><strong>MENU</strong></h3>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <?php if (!empty($_SESSION["usuario"])) { ?>
                <div class="identificacao-usuario">
                    <?php echo "Bem vindo(a), " . htmlspecialchars($_SESSION["nome_usuarios"], ENT_QUOTES, 'UTF-8') . "!"; ?>
                </div>
            <?php } ?>
            <div class="dropdown mt-3">
                    <a href="cadastro_usuarios.php">cadastrar</a>
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
            <a href="adm_sensores.php" >Sensores</a>
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
    
    <main class="cadastro-pagina">
        
        <div class="container_titulo">
            <img src="../assets/logo.png" alt="logo site">
        </div>

        <section class="cadastro-formulario">
        <form class="grid" method="POST">
                <div class="cadastro-campo campo-nome">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" placeholder="Nome do trem">
                </div>
                <div class="cadastro-campo campo-capacidade">
                    <label for="capacidade">Capacidade(Kg):</label>
                    <input type="number" name="capacidade" id="capacidade" placeholder="Capacidade do trem">
                </div>
                <div class="cadastro-campo campo-rota">
                    <label for="rota">Rota:</label>
                    <select name="rota" id="rota">

                        <?php if($result->num_rows > 0){?>
                            <?php while($linha = $result->fetch_assoc()){?>
                                <option value="<?php echo $linha["id"]?>">
                                    <?php echo $linha["nome_rotas"]?>
                                </option>
                            <?php }?>
                        <?php }else{ echo "<option>Nenhuma rota cadastrada</option>";}?>

                    </select>
                </div>
                <div class="cadastro-campo campo-usuario">
                    <label for="usuario">Usuário:</label>
                    <select name="usuario" id="usuario">

                        <?php if($result_usuario->num_rows > 0){?>
                            <?php while($linha = $result_usuario->fetch_assoc()){?>
                                <option value="<?php echo $linha["id"]?>">
                                    <?php echo $linha["nome_usuarios"]?>
                                </option>
                            <?php }?>
                        <?php }else{ echo "<option>Nenhuma rota cadastrada</option>";}?>

                    </select>
                </div>
                <div class="cadastro-campo campo-modelo">
                    <label for="modelo">Modelo:</label>
                    <input type="text" name="modelo" id="modelo" placeholder="Modelo do trem">
                </div>
                <div class="cadastro-campo campo-data">
                    <label for="fabricacao">Data de fabricação:</label>
                    <input type="date" name="fabricacao" id="fabricacao">
                </div>
                <button type="submit" name="cadastrar">Cadastrar</button>
            </form>
                
        </form>
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