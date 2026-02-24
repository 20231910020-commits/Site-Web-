<?php
$token = $_GET['token'] ?? '';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Nova Senha</title>
    <link rel="stylesheet" href="novaSenha.css">
</head>
<body>

<div class="container">

    <!-- TOPO -->
    <header class="topo">
        <div class="logo">
            <span>IFBA Agendamento de Almoço</span>
        </div>

        <nav class="menu">
            <ul>
                <li><a href="#">Login</a></li>
                <li><a href="#">Cadastrar</a></li>
            </ul>
        </nav>
    </header>

    <!-- CONTEÚDO -->
    <main class="conteudo">
        <div class="card-senha">
            <h1>Criar nova senha</h1>
            <p class="subtitulo">
                Escolha uma nova senha para sua conta
            </p>

            <form method="POST" action="PHP/redefinir_senha.php">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">            

            <input 
                    type="password"
                    name="senha"
                    placeholder="Nova senha"
                    required
                >

                <input 
                    type="password"
                    name="confirmar_senha"
                    placeholder="Confirmar nova senha"
                    required
                >

                <button type="submit" class="btn cadastro" name="salvar">
                    Salvar nova senha
                </button>
            </form>
        </div>
    </main>

</div>

</body>
</html>