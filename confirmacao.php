<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] !== "POST"){
    header("Location: agendamento.php");
    exit;
}

/* RECEBENDO DADOS */
$quantidade = (int) $_POST['quantidade'];
$tipo_refeicao = $_POST['tipo_refeicao']; // prato ou marmita
$tipo_data = $_POST['tipo_data'];
$pagamento = $_POST['pagamento']; // online ou retirada
$suco = isset($_POST['suco']) ? 2 : 0;

/* DATA */
if($tipo_data == 'hoje'){
    $data_formatada = date('d/m/Y');
} else {
    $data_formatada = date('d/m/Y', strtotime($_POST['data_agendamento']));
}

/* CÁLCULO */
$preco = 12;
$total = ($preco + $suco) * $quantidade;

/* SENHA */
$senha = rand(100,999);

// Criar array se não existir
if(!isset($_SESSION['pedidos'])){
    $_SESSION['pedidos'] = [];
}

// Salvar pedido
$_SESSION['pedidos'][] = [
    "data" => $data_formatada,
    "tipo" => $tipo_refeicao, // prato ou marmita
    "quantidade" => $quantidade,
    "total" => $total, // salva número puro
    "status" => "Agendado"
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmado - IFBA</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="agenda.css?v=<?php echo time(); ?>">
</head>
<body>

<header class="topo">
    <div class="logo">
        <span>IFBA -</span>
        <span>Comprovante</span>
    </div>
    <nav class="menu">
        <ul>
            <li><a href="painel.php">Painel</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>
</header>

<main class="conteudo-app">
    <div class="card-delivery">
        <div class="conteudo-sucesso">

            <div class="circulo-sucesso">
                <span class="check-icon">✓</span>
            </div>

            <h2 style="color: #1b5e20;">Seu almoço foi agendado!</h2>
            <p style="color:#666; margin-bottom:20px;">Confira os detalhes abaixo.</p>

            <div class="ticket-box">

                <div class="destaque-senha">
                    <span>SENHA</span><br>
                    <strong>#<?php echo $senha; ?></strong>
                </div>

                <div class="ticket-linha">
                    <span>Cliente:</span>
                    <strong><?php echo $_SESSION['usuario']; ?></strong>
                </div>

                <div class="ticket-linha">
                    <span>Data:</span>
                    <strong><?php echo $data_formatada; ?></strong>
                </div>

                <div class="ticket-linha">
                    <span>Tipo:</span>
                    <strong><?php echo ucfirst($tipo_refeicao); ?></strong>
                </div>

                <div class="ticket-linha">
                    <span>Quantidade:</span>
                    <strong><?php echo $quantidade; ?></strong>
                </div>

                <div class="ticket-linha">
                    <span>Pagamento:</span>
                    <strong><?php echo ucfirst($pagamento); ?></strong>
                </div>

                <?php if($suco > 0): ?>
                <div class="ticket-linha">
                    <span>Bebida:</span>
                    <strong>Suco Natural</strong>
                </div>
                <?php endif; ?>

                <div class="ticket-linha">
                    <span>Total:</span>
                    <strong style="color: #1b5e20;">
                        R$ <?php echo number_format($total,2,',','.'); ?>
                    </strong>
                </div>

            </div>

            <?php if($pagamento == 'online'): ?>
            <div class="box-pix">
                <div style="margin-bottom:10px; font-weight:bold; color:#1b5e20">
                    Pagamento via Pix
                </div>

                <div class="qr-area">
                    QR CODE AQUI
                </div>

                <div class="copia-cola">
                    <input type="text"
                           class="input-chave"
                           value="chave-pix-exemplo@ifba.edu.br"
                           readonly
                           id="chavePix">
                    <button class="btn-copiar" onclick="copiar()">Copiar</button>
                </div>
            </div>
            <?php endif; ?>

            <br>

            <a href="painel.php" class="btn verde">
                Voltar ao Painel
            </a>

        </div>
    </div>
</main>

<script>
function copiar() {
    var chave = document.getElementById("chavePix");
    chave.select();
    document.execCommand("copy");
    alert("Chave Pix copiada!");
}
</script>

</body>
</html>