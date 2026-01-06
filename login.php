<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Agendamento IFBA</title>
    <link rel="stylesheet" href="/cardapio/cardapiocss/log.css">
    <link rel="stylesheet" href="/cardapio/cardapiocss/style.css">
</head>
<body>

    <header class="header-full">
        <div class="logo-wrapper">
            <span class="if-logo"><h1>IFBA</h1></span>
            <h1>Agendamento de Almoço</h1>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="/cardapio/cardapio.php">Tela inicial</a></li>
                <li><a href="/cardapio/cardapiophp/cadastro.php">Cadastrar</a></li>
            </ul>
        </nav>
    </header>

    <main class="content-full">
        <div class="login-container">
            <h2>Entrar</h2>
            
            <form action="logar.php" method="POST">
                <div class="input-group">
                    <input type="email" name="email" placeholder="E-mail" size ="300" id="email" required>
                </div>
                
                <div class="input-group">
                    <input type="password" name="senha" placeholder="Senha" size ="300" id="senha" required>
                </div>

                <button type="submit" class="btn-verde">Entrar</button>
                
                <div class="links-auxiliares">
                    <a href="#">Esqueceu a senha?</a>
                    <p>Não tem cadastro? <a href="cadastro.php">Cadastre-se</a></p>
                </div>
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