<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Esqueceu a Senha</title>
    <link rel="stylesheet" href="esqueceuSenha.css?v=2">
</head>
<body>

<div class="container">

    <!-- TOPO -->
    <header class="topo">
        <div class="logo">
            <span>IFBA Agendamento de Almoço</span>
        </div>

        <nav class="menu">
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="cadastro.php">Cadastrar</a></li>
            </ul>
        </nav>
    </header>

    <!-- CONTEÚDO -->
    <main class="conteudo">
        <div class="card-recuperacao">
            <h1>Esqueceu a senha?</h1>
            <p class="subtitulo">Redefina a senha em duas etapas</p>

            <?php
            if(isset($_SESSION['erro_email'])){
                echo "<p class='msg-erro'>".$_SESSION['erro_email']."</p>";
                unset($_SESSION['erro_email']);
            }
            ?>


            <form method="POST" action="./PHP/enviar_token.php">
                <input type="email" placeholder="E-mail" name="email" id="email" required>
                <button type="submit" class="btn cadastro" name="salvar">Enviar</button>
            </form>
        </div>
    </main>

</div>

</body>
</html>