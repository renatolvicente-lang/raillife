<?php

include "../infra/conn.php";

session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE email = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);

        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
            
            if(password_verify($senha, $usuario["senha"])){

                $_SESSION['id'] = $usuario["id"];   
                $_SESSION['usuario'] = $usuario["nome"];
                $_SESSION['atuacao'] = $usuario["atuacao"];
                

                if($usuario["atuacao"] == "adm") {
                    header("Location: adm_usuarios.php");
                    exit();
                }else{
                    header("Location: home.php");
                    exit();
                }
            }
            //redireciona para a página certa baseada na área de atuação
            
        }else {
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

    <header class="hd_home login-header">

         <div class="logo_home">
            <a href="../index.php">
                <img src="../assets/logo.png" alt="logo site">
            </a>
        </div>

        <nav class="nav_home">
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

            <form method="POST">

                <div class="login-campo campo-email">
                    <label for="email">Email:</label>

                    <input type="email" id="email" name="email" placeholder="Ex.: user@gmail.com" required>

                </div>

                <div class="login-campo campo-senha">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="*************" required>
                </div>

                <button type="submit">Conectar</button>
            </form>


        </section>

    </main>

    <img class="fixa" src="../assets/listras vermelho e cinza.png">
    <img class="fixa2" src="../assets/listras vermelho e cinza.png">

</body>

</html>