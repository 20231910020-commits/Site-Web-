,?php
if(!isset($_SESSION['pedidos'])){
    $_SESSION['pedidos'] = [];
}

$_SESSION['pedidos'][] = [
    "senha" => $senha,
    "data" => $data,
    "prato" => "Almoço Tradicional",
    "tipo" => $tipo_refeicao_texto,
    "quantidade" => $quantidade,
    "pagamento" => $pagamento_texto,
    "observacao" => $observacao,
    "total" => number_format($total,2,',','.')
];
?>

<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pedidos - IFBA</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="historico.css?v=<?php echo time(); ?>">
</head>
<body>
    <header class="topo">
        <div class="logo"><span>IFBA -</span><span>Histórico</span></div>
        <nav class="menu"><ul><li><a href="cardapio.php">Início</a></li><li><a href="logout.php">Sair</a></li></ul></nav>
    </header>

    <main class="conteudo-app">
        <div class="card-delivery">
            <div class="titulo-pag"><h2>Meus Pedidos</h2></div>
            <div class="lista-pedidos">
                <div class="pedido-item">
                    <div class="linha-topo"><span class="data">Hoje, 12:30</span><span class="status verde">Agendado</span></div>
                    <div class="linha-detalhe"><strong>Almoço Tradicional</strong><span>R$ 12,00</span></div>
                </div>
                <div class="pedido-item">
                    <div class="linha-topo"><span class="data">10/02/2026</span><span class="status cinza">Concluído</span></div>
                    <div class="linha-detalhe"><strong>Marmita</strong><span>R$ 12,00</span></div>
                </div>
            </div>
        </div>
    </main>

    <nav class="bottom-nav">
        <a href="agendamento.php" class="nav-item"><span class="nav-icon">🏠</span><span>Início</span></a>
        <a href="historico.php" class="nav-item ativo"><span class="nav-icon">📜</span><span>Pedidos</span></a>
        <a href="logout.php" class="nav-item"><span class="nav-icon">👤</span><span>Sair</span></a>
    </nav>
</body>
</html>