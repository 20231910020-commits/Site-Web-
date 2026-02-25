<?php
session_start();

if(isset($_SESSION['mensagem'])){
    echo "<p style='color:green; text-align:center;'>" . $_SESSION['mensagem'] . "</p>";
    unset($_SESSION['mensagem']);
}

if(isset($_SESSION['erro'])){
    echo "<p style='color:red; text-align:center;'>" . $_SESSION['erro'] . "</p>";
    unset($_SESSION['erro']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Esqueceu a Senha</title>
    <link rel="stylesheet" href="esqueceuSenha.css">
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

            <form method="POST" action="./PHP/enviar_token.php">
                <input type="email" placeholder="E-mail" name="email" id="email" required >
                <button type="submit" class="btn cadastro" name="salvar"> Enviar</button>
            </form>
        </div>
    </main>

</div>

</body>
</html>