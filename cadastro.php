<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Agendamento de Almoço IFBA</title>
    <link rel="stylesheet" href="/cardapio/cardapiocss/cad.css">
    <link rel="stylesheet" href="/cardapio/cardapiocss/style.css">
</head>
<body>

    <header class="header-full">
        <div class="logo-wrapper">
            <span class="if-logo"><h1>IFBA</h1></span>
            <h1>Agendamento de Almoço</h1>
        </div>
        <nav class="menu" id="main-menu">
            <ul>
                <li><a href="/cardapio/cardapio.php" class="sair">Tela inicial</a></li>
                <li><a href="/cardapio/cardapiophp/login.php" class="sair">Login</a></li>
                <li><a href="#" class="sair">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main class="content-full">
        <div class="form-container">
            <h2>Cadastro</h2>
            <form action="processar.php" method="POST">
                <input type="text" name="nome" placeholder="Nome Completo" size ="300" id="nome" required>
                <input type="email" name="email" placeholder="E-mail" size ="300" id="email" required>
                <input type="password" name="senha" placeholder="Senha" size ="300" id="senha" required>
                <input type="password" name="confirmar_senha" placeholder="Confirmar Senha" size ="300" id="senha" required>
                <button type="submit" class="btn-laranja">CADASTRAR</button>
            </form>
        </div>
    </main>

     <footer>
        <div class="tudo">
            <div class="t1">
                <h4>Mais informação</h4>
                <h5>Para que serve:</h5>
                <P>O site da Cantina do IFBA serve para permitir que alunos e servidores agendem o almoço online,<br>
                 de forma prática e organizada, evitando filas e facilitando o controle da cantina.</P>
                <h5>Como usar:</h5>
                <p>O usuário acessa o site, faz login ou cadastro, escolhe o dia e a refeição disponível e confirma o agendamento.<br>
                 Depois, basta comparecer à cantina no horário informado.</p>
            </div>
            <div clas="t2">
                <p>&copy;Turma de Informática 731 2025/2026. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

</body>
</html>