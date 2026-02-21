<?php
session_start();
include __DIR__ . '/php/banco.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Usuários - IFBA</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="usuarios.css?v=<?php echo time(); ?>">
</head>
<body>

    <header class="topo">
        <div class="logo">
            <span class="logo-icon">IFBA -</span>
            <span>Painel Administrativo</span>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="admin.php">Agendamentos</a></li>
                <li><span style="opacity: 0.5;">|</span></li>
                <li><a href="usuarios.php" style="font-weight: bold;">Usuários</a></li>
                <li><a href="logout.php" style="margin-left: 15px;">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main class="conteudo-admin">
        
        <div class="card-painel">
            
            <div class="top-bar">
                <h2>Usuários Cadastrados</h2>
                <a href="php/forms.php" class="btn-novo">+ Novo Usuário</a>
            </div>

            <div class="tabela-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Sexo</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (function_exists('get_usuarios')) {
                            $result = get_usuarios();
                            if ($result) {
                                foreach ($result as $linha) {
                                    $id = $linha["id_usuario"];
                                    echo '<tr>';
                                    echo '<td data-label="Código">#'.$id.'</td>';
                                    echo '<td data-label="Nome">'.$linha["nome"].'</td>';
                                    echo '<td data-label="Sexo">'.$linha["sexo"].'</td>';
                                    echo '<td data-label="E-mail">'.$linha["email"].'</td>';
                                    echo '<td data-label="Ações">
                                            <div class="acoes">
                                                <a class="btn-acao btn-editar" href="php/editar_usuarios.php?id_usuario='.$id.'">Editar</a>
                                                <a class="btn-acao btn-excluir" href="php/excluir_usuario.php?id_usuario='.$id.'" onclick="return confirm(\'Tem certeza que deseja excluir?\')">Excluir</a>
                                            </div>
                                          </td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="5" style="text-align:center; padding: 20px;">Nenhum usuário encontrado.</td></tr>';
                            }
                        } else {
                            echo '<tr><td colspan="5" style="text-align:center; padding: 20px; color: red;">Erro: Função de banco de dados não encontrada. Verifique o arquivo php/banco.php</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="painel-resumo">
                <div class="resumo-item">
                    Total de Usuários: <strong><?php echo isset($result) ? count($result) : 0; ?></strong>
                </div>
            </div>

        </div>
    </main>

</body>
</html>