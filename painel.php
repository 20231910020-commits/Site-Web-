<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit;
}

if($_SESSION['role'] !== 'Cliente') {
    header("Location: login.php");
    exit;
}
?>
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Usuário - IFBA</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="painel.css?v=<?php echo time(); ?>">
</head>
<body>

<header class="topo">
    <div class="logo">
        <span>IFBA - Painel</span>
    </div>

    <nav class="menu">
        <ul>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>
</header>

<main class="conteudo-painel">
    <div class="card-painel">
        <h2>O que deseja fazer?</h2>

        <a href="agendamento.php" class="btn-opcao btn-agendar">
            <span class="icone">📅</span>
            Fazer Agendamento
        </a>

        <a href="historico.php" class="btn-opcao btn-historico">
            <span class="icone">📜</span>
            Ver Histórico de Pedidos
        </a>
    </div>
</main>

</body>
</html>