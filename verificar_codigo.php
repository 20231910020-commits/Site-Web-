<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Código - IFBA</title>
    
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
            <h2>Código de Verificação</h2>
            
            <p style="color: #666; margin-bottom: 25px; font-size: 14px; line-height: 1.5;">
                Enviamos um código de 6 dígitos para o seu e-mail. Digite-o abaixo para continuar.
            </p>
            
            <form action="redefinir_senha.php" method="POST">
                
                <div class="input-group">
                    <input type="text" name="codigo" placeholder="000000" maxlength="6" required
                           style="text-align: center; letter-spacing: 8px; font-size: 22px; font-weight: bold; color: #1b5e20;">
                </div>
                
                <button type="submit" class="btn login" style="width: 100%; border: none; cursor: pointer; margin-top: 15px;">
                    Verificar
                </button>
                
                <div class="links-auxiliares">
                    <p>Não recebeu? <a href="enviar_recuperacao.php" style="font-weight: bold;">Reenviar Código</a></p>
                </div>
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