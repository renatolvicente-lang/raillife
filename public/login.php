<?php

include "../infra/conn.php";

session_start();



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //Sem prepared Statement
    /* $nome = $_POST[""];
     $email = $_POST["email"];
     $senha = $_POST["senha"];

     $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

     $resultado = $conn -> query($sql);

     if(mysqli_num_rows($resultado)> 0 ){
         $_SESSION["usuario"] = $nome;
         header("Location: home.php");
     }else{
         echo "O usuario não existe";
     }*/
    //com prepared

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $email, $senha);

        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $_SESSION['usuario'] = $nome;
            header("Location: home.php");
            exit();
        } else {
            echo "Usuario não existe";
        }
        $stmt->close();
    } else {
        echo "erro na preparação da consulta" . $conn->error;
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Login</title>
</head>

<body>

    <header class="hd_home">

        <div class="logo_home">
            <img src="../assets/logo.png" alt="logo site">
        </div>

        <nav class="nav_home">
            <a href="#" class="ativado">Inicio</a>
            <a href="#" >Sensores</a>
            <a href="#">Trens</a>
            <a href="#">Relatorios</a>
            <a href="#">Rotas</a>
        </nav>

        <button class="menu_btn_home">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </header>

    <main class="login-pagina">

        <section class="login-formulario">
        <div class="login-logo">
        <img src="../assets/Logo.png" alt="Logo do site">
        </div>

            <form class="grid" method="POST">
            
                <div class="login-campo campo-nome">
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome" id="nome" placeholder="nome completo" required>
                </div>

                <div class="login-campo campo-email">
                    <label for="email">Email:</label>

                    <input type="email" id="email" name="email" placeholder="Ex.: user@gmail.com" required>

                </div>

                <div class="login-campo campo-senha">
                    <label for="senha">Senha:</label>

                    <input type="password" id="senha" name="senha" placeholder="*************" required>
                </div>

                <button type="submit">Conectar</button>

                <h6></h6>

            </form>

        </section>

    </main>

    <img class="fixa" src="../assets/listras vermelho e cinza.png">
    <img class="fixa2" src="../assets/listras vermelho e cinza.png">

</body>

</html>