<?php
session_start();

if(!isset($_SESSION['confirmacao'])){
    header("Location: agendamento.php");
    exit;
}

$dados = $_SESSION['confirmacao'];
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
                    <strong>#<?php echo $dados['senha']; ?></strong>
                </div>

                <div class="ticket-linha">
                    <span>Cliente:</span>
                    <strong><?php echo $dados['usuario']; ?></strong>
                </div>

                <div class="ticket-linha">
                    <span>Data:</span>
                    <strong><?php echo $dados['data']; ?></strong>
                </div>

                <div class="ticket-linha">
                    <span>Tipo:</span>
                    <strong><?php echo ucfirst($dados['tipo']); ?></strong>
                </div>

                <div class="ticket-linha">
                    <span>Quantidade:</span>
                    <strong><?php echo $dados['quantidade']; ?></strong>
                </div>

                <div class="ticket-linha">
                    <span>Pagamento:</span>
                    <strong><?php echo ucfirst($dados['pagamento']); ?></strong>
                </div>

                <?php if($dados['suco'] > 0): ?>
                <div class="ticket-linha">
                    <span>Bebida:</span>
                    <strong>Suco Natural</strong>
                </div>
                <?php endif; ?>

                <div class="ticket-linha">
                    <span>Total:</span>
                    <strong style="color: #1b5e20;">
                        R$ <?php echo number_format($dados['total'],2,',','.'); ?>
                    </strong>
                </div>

            </div>

            <?php if($dados['pagamento'] == 'online'): ?>
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