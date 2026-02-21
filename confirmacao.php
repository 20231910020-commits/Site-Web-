<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmado - IFBA</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="agenda.css?v=<?php echo time(); ?>">
</head>
<body>
    <header class="topo">
        <div class="logo"><span>IFBA -</span><span>Comprovante</span></div>
        <nav class="menu"><ul><li><a href="logout.php">Sair</a></li></ul></nav>
    </header>

    <main class="conteudo-app">
        <div class="card-delivery">
            <div class="conteudo-sucesso">
                <div class="circulo-sucesso"><span class="check-icon">✓</span></div>
                <h2 style="color: #1b5e20;">Seu almoço foi agendado!</h2>
                <p style="color:#666; margin-bottom:20px;">Confira os detalhes abaixo.</p>

                <div class="ticket-box">
                    <div class="destaque-senha"><span>SENHA</span><br><strong>#402</strong></div>
                    <div class="ticket-linha"><span>Data:</span><strong>13/02/2026</strong></div>
                    <div class="ticket-linha"><span>Refeição:</span><strong>Almoço Tradicional</strong></div>
                    <div class="ticket-linha"><span>Total:</span><strong style="color: #1b5e20;">R$ 12,00</strong></div>
                </div>

                <div class="box-pix">
                    <div style="margin-bottom:10px; font-weight:bold; color:#1b5e20">Pagamento via Pix</div>
                    <div class="qr-area">QR CODE AQUI</div>
                    <div class="copia-cola">
                        <input type="text" class="input-chave" value="chave-pix-exemplo" readonly id="chavePix">
                        <button class="btn-copiar" onclick="copiar()">Copiar</button>
                    </div>
                </div>
                <a href="cardapio.php" class="btn verde" style="width: auto;">Voltar ao Início</a>
            </div>
        </div>
    </main>
    <script>
        function copiar() {
            var c = document.getElementById("chavePix"); c.select(); navigator.clipboard.writeText(c.value);
            alert("Chave copiada!");
        }
    </script>
</body>
</html>