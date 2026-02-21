<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento - IFBA</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="agenda.css?v=<?php echo time(); ?>">
</head>
<body>

    <header class="topo">
        <div class="logo">
            <span class="logo-icon">IFBA -</span>
            <span>Agendamento</span>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="cardapio.php">Início</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main class="conteudo-app">
        <div class="card-delivery">
            <form action="confirmar_agendamento.php" method="POST">
                
                <div class="prato-header">
                    <h2>Almoço Tradicional</h2>
                    <p>Refeição completa balanceada (Proteína, Arroz, Feijão e Salada).</p><br>
                    <span class="preco-destaque">A partir de R$ 12,00</span>
                </div>

                <div class="secao-lista">
                    <div class="secao-titulo">
                        <h3>Para quando?</h3>
                        <span class="badge-obrigatorio">OBRIGATÓRIO</span>
                    </div>
                    
                    <label class="item-linha">
                        <div class="texto-item">
                            <span class="nome">Hoje</span>
                            <span class="desc">Almoço imediato</span>
                        </div>
                        <input type="radio" name="tipo_data" value="hoje" id="opt-hoje" checked>
                    </label>

                    <label class="item-linha">
                        <div class="texto-item">
                            <span class="nome">Outro Dia</span>
                            <span class="desc">Agendar data futura</span>
                        </div>
                        <input type="radio" name="tipo_data" value="outro" id="opt-outro">
                    </label>

                    <div id="div-data" class="area-data-extra" style="display: none;">
                        <input type="date" name="data_agendamento" class="input-data-app">
                    </div>
                </div>

                <div class="secao-lista">
                    <div class="secao-titulo">
                        <h3>Quantidade</h3>
                        <span class="badge-obrigatorio">OBRIGATÓRIO</span>
                    </div>
                    <div class="controle-qtd">
                        <button type="button" class="btn-qtd" onclick="alterarQtd(-1)">-</button>
                        <input type="number" name="quantidade" id="qtd" value="1" min="1" max="5" readonly>
                        <button type="button" class="btn-qtd" onclick="alterarQtd(1)">+</button>
                    </div>
                </div>

                <div class="secao-lista">
                    <div class="secao-titulo">
                        <h3>Como vai comer?</h3>
                        <span class="badge-obrigatorio">OBRIGATÓRIO</span>
                    </div>
                    <label class="item-linha">
                        <div class="texto-item">
                            <span class="nome">Prato</span>
                            <span class="desc">Comer no refeitório</span>
                        </div>
                        <input type="radio" name="tipo_refeicao" value="prato" checked>
                    </label>
                    <label class="item-linha">
                        <div class="texto-item">
                            <span class="nome">Marmita</span>
                            <span class="desc">Levar para viagem</span>
                        </div>
                        <input type="radio" name="tipo_refeicao" value="marmita">
                    </label>
                </div>

                <div class="secao-lista">
                    <div class="secao-titulo">
                        <h3>Bebida</h3>
                        <span class="badge-opcional">OPCIONAL</span>
                    </div>
                    <label class="item-linha">
                        <div class="texto-item">
                            <span class="nome">Adicionar Suco</span>
                            <span class="desc">Suco natural da fruta (+ R$ 2,00)</span>
                        </div>
                        <div class="check-plus-wrapper">
                            <input type="checkbox" name="suco" id="chk-suco" value="sim">
                            <span class="plus-custom"></span>
                        </div>
                    </label>
                </div>

                <div class="secao-lista">
                    <div class="secao-titulo">
                        <h3>Observações</h3>
                        <span class="badge-opcional">OPCIONAL</span>
                    </div>
                    <div class="area-texto">
                        <textarea name="observacao" placeholder="Ex: Sem salada..."></textarea>
                    </div>
                </div>

                <div class="secao-lista">
                    <div class="secao-titulo">
                        <h3>Pagamento</h3>
                        <span class="badge-obrigatorio">OBRIGATÓRIO</span>
                    </div>
                    <label class="item-linha">
                        <div class="texto-item">
                            <span class="nome">Pagar Online</span>
                        </div>
                        <input type="radio" name="pagamento" value="online" checked>
                    </label>
                    <label class="item-linha">
                        <div class="texto-item">
                            <span class="nome">Pagar na Retirada</span>
                        </div>
                        <input type="radio" name="pagamento" value="retirada">
                    </label>
                </div>

                <div class="espaco-final"></div>

                <div class="barra-total">
                    <div class="info-preco">
                        <span>Total</span>
                        <strong id="valor-total">R$ 12,00</strong>
                    </div>
                    <button type="submit" class="btn-confirmar">Confirmar</button>
                </div>

            </form>
        </div>
    </main>

    <nav class="bottom-nav">
        <a href="agendamento.php" class="nav-item ativo">Início</a>
        <a href="historico.php" class="nav-item">Pedidos</a>
        <a href="logout.php" class="nav-item">Sair</a>
    </nav>

    <script>
        const qtdInput = document.getElementById('qtd');
        const sucoCheck = document.getElementById('chk-suco');
        const totalDisplay = document.getElementById('valor-total');
        const optHoje = document.getElementById('opt-hoje');
        const optOutro = document.getElementById('opt-outro');
        const divData = document.getElementById('div-data');

        function alterarQtd(valor) {
            let atual = parseInt(qtdInput.value);
            let novo = atual + valor;
            if(novo >= 1 && novo <= 5) {
                qtdInput.value = novo;
                calcular();
            }
        }

        function calcular() {
            let q = parseInt(qtdInput.value);
            let preco = 12;
            let extra = sucoCheck.checked ? 2 : 0;
            let total = (preco + extra) * q;
            totalDisplay.innerText = "R$ " + total.toFixed(2).replace('.', ',');
        }

        if(sucoCheck) sucoCheck.addEventListener('change', calcular);
        if(optHoje) optHoje.addEventListener('change', () => divData.style.display = 'none');
        if(optOutro) optOutro.addEventListener('change', () => divData.style.display = 'block');
    </script>
</body>
</html>