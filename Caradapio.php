<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cantina IFBA</title>
    <link rel="stylesheet" href="cardapiocss/style.css">
</head>
<body>

<div class="container">

    <!-- Topo -->
    <header class="topo">
        <div class="logo">
            <span class="logo-icon">IFBA</span>
            <span>Campus Barreiras</span>
        </div>
        <nav class="menu" id="main-menu">
            <ul>
                <li><a href="#" class="sair">Cadastrar</a></li>
                <li><a href="#" class="sair">Login</a></li>
                <li><a href="#" class="sair">Sair</a></li>
            </ul>
        </nav>
    </header>

    <!-- Conteúdo -->
    <main class="conteudo">

        <div class="cont">
            <h1>Bem-vindo à<br>Cantina do IFBA!</h1>
            <p class="subtitulo">
                Agende seu almoço online de forma prática
            </p>

            <div class="imagem-prato">
                <img src="https://lh3.googleusercontent.com/sitesv/AAzXCkd380HjLTrGyazspJwytJdFG63o_TUgcuZWUNsVfb7vio63YXP0O8T4dNpJvcvDT7o1f-F9vm1OcqF0rBjO6EzwHzu7QyA89EdfRBSC1Ij__yeY_ZfeyUMT9Yu9HqdTUFfxae_AMsq5ZENXR7SQ73KJ5t6hbtXjcLu8fajfQxid7I-HC1RqgQVzl8nMk2WBgN7dY-b0iR3QinLt9ZgKEXzmA2T2IbB-SKbdXcQ=w1280" alt="Prato de comida">
            </div>
        </div>
        <p class="texto-login">
            Faça login ou cadastre-se para começar
        </p>

        <div class="botoes">
            <a href="login.php" class="btn login">
                Login
            </a>
            <a href="cadastro.php" class="btn cadastro">
                Cadastro
            </a>
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
