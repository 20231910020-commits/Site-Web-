<?php 
session_start();

require_once "PHP/config.php";

$con = conectar();
$id_usuario = $_SESSION['id_usuario'];

$sql = "SELECT * FROM pedidos 
        WHERE id_usuario = :id_usuario
        ORDER BY id_pedido DESC";

$stmt = $con->prepare($sql);
$stmt->bindParam(":id_usuario", $id_usuario);
$stmt->execute();

$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit;
}
?>
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
    <div class="logo">
        <span>IFBA -</span>
        <span>Histórico</span>
    </div>
    <nav class="menu">
        <ul>
            <li><a href="agendamento.php">Início</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>
</header>

<main class="conteudo-app">
    <div class="card-delivery">

        <div class="titulo-pag">
            <h2>Meus Pedidos</h2>
        </div>

        <div class="lista-pedidos">

        <?php
        if(count($pedidos) > 0){

            foreach($pedidos as $pedido){

                $valorFormatado = number_format($pedido['total'],2,',','.');

                $nomePrato = "Almoço Tradicional";
                if($pedido['tipo_refeicao'] == "marmita"){
                    $nomePrato .= " (Marmita)";
                }

                $nomePrato .= " x".$pedido['quantidade'];
        ?>

            <div class="pedido-item">

                <div class="linha-topo">
                    <span class="data"><?php echo date('d/m/Y', strtotime($pedido['data_pedido'])); ?></span>
                    <span class="status verde"><?php echo strtoupper($pedido['status']); ?></span>
                </div>

                <div class="linha-detalhe">
                    <strong><?php echo $nomePrato; ?></strong>
                    <span>R$ <?php echo $valorFormatado; ?></span>
                </div>

            </div>

        <?php
            }

        } else {
        ?>

            <div class="pedido-item">
                <div class="linha-detalhe">
                    <strong>Nenhum pedido realizado ainda.</strong>
                </div>
            </div>

        <?php } ?>

        </div>
    </div>
</main>

<nav class="bottom-nav">
    <a href="agendamento.php" class="nav-item">
        <span class="nav-icon">🏠</span>
        <span>Início</span>
    </a>
    <a href="historico.php" class="nav-item ativo">
        <span class="nav-icon">📜</span>
        <span>Pedidos</span>
    </a>
    <a href="logout.php" class="nav-item">
        <span class="nav-icon">👤</span>
        <span>Sair</span>
    </a>
</nav>

</body>
</html> 