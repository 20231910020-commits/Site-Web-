<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Agendamentos - IFBA</title>
    <link rel="stylesheet" href="/cardapio/cardapiocss/list.css">
    <script src="script_atualizar.js" defer></script>
</head>
<body>

    <header class="header-full">
        <div class="logo-wrapper">
            <span>IFBA</span>
            <span class="logo-texto">Agendamento de Almoço</span>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="sair.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main class="content-full">
        <div class="card-lista">
            <div class="card-header-interno">
                <h2>Lista de Agendamentos do Dia</h2>
                <div class="badge-total">
                    Total de pessoas agendadas: <span id="contador-topo">0</span>
                </div>
            </div>

            <div class="lista-corpo">
                <table id="tabela-nomes">
                    <tbody id="lista-usuarios">
                        </tbody>
                </table>
            </div>

            <div class="card-footer-interno">
                <p>Total de pessoas agendadas: <span id="contador-rodape">0</span></p>
                <button class="btn-agendar-final" onclick="location.href='confirmar_pedido.php'">Agendar Almoço</button>
            </div>
        </div>
    </main>

</body>
</html>