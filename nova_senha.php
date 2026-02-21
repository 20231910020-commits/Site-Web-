<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Senha - IFBA</title>
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <header class="topo">
        <div class="logo">
            <span class="logo-icon">IFBA -</span>
            <span>Recuperação</span>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="login.php">Cancelar</a></li>
            </ul>
        </nav>
    </header>

    <main class="content-full">
        <div class="login-container">
            <h2>Criar Nova Senha</h2>
            
            <p style="color: #666; margin-bottom: 25px; font-size: 14px; line-height: 1.5;">
                Digite sua nova senha abaixo. Escolha uma senha forte com no mínimo 6 caracteres.
            </p>
            
            <form action="atualizar_senha.php" method="POST">
                
                <div class="input-group">
                    <input type="password" name="nova_senha" placeholder="Nova Senha" required minlength="6">
                </div>

                <div class="input-group">
                    <input type="password" name="confirma_senha" placeholder="Confirmar Nova Senha" required minlength="6">
                </div>
                
                <button type="submit" class="btn login" style="width: 100%; border: none; cursor: pointer; margin-top: 15px;">
                    Redefinir Senha
                </button>
                
            </form>
        </div>
    </main>

    <footer>
        <div class="tudo">
            <div class="t2">
                <p>&copy;Turma de Informática 731 2025/2026.</p>
            </div>
        </div>
    </footer>

</body>
</html>