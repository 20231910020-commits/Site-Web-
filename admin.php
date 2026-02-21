<?php
session_start();
// if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - IFBA</title>
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
</head>
<body>
    <header class="topo">
        <div class="logo">
            <span class="logo-icon">IFBA -</span>
            <span>Painel Administrativo</span>
        </div>
        <nav class="menu">
            <ul>
                <li><span class="nome-campus">Campus Barreiras</span></li>
                <li><a href="logout.php" class="btn-sair">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main class="conteudo-admin">
        
        <div class="card-painel">
            
            <div class="painel-header">
                <h2>Agendamentos do Dia - <?php echo date('d/m'); ?></h2>
            </div>

            <div class="tabela-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Suco</th>
                            <th>Observações</th>
                            <th>Pagamento</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Nome">Ana Silva</td>
                            <td data-label="Suco" class="texto-verde">Sim</td>
                            <td data-label="Obs" class="obs-texto">Sem cebola, bem passado.</td>
                            <td data-label="Pagamento">Pago Online</td>
                            <td data-label="Status"><span class="badge retirado">Retirado</span></td>
                        </tr>

                        <tr>
                            <td data-label="Nome">João Santos</td>
                            <td data-label="Suco">Não</td>
                            <td data-label="Obs" class="obs-texto">-</td>
                            <td data-label="Pagamento">Pagar na Retirada</td>
                            <td data-label="Status"><span class="badge pendente">Pendente</span></td>
                        </tr>

                        <tr>
                            <td data-label="Nome">Mariana Costa</td>
                            <td data-label="Suco" class="texto-verde">Sim</td>
                            <td data-label="Obs" class="obs-texto">Pouco sal na salada.</td>
                            <td data-label="Pagamento">Pago Online</td>
                            <td data-label="Status"><span class="badge retirado">Retirado</span></td>
                        </tr>
                        
                         <tr>
                            <td data-label="Nome">Carlos Eduardo</td>
                            <td data-label="Suco">Não</td>
                            <td data-label="Obs" class="obs-texto">Tirar o feijão.</td>
                            <td data-label="Pagamento">Pago Online</td>
                            <td data-label="Status"><span class="badge pendente">Pendente</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="painel-resumo">
                <div class="resumo-item">
                    Total de Almoços: <strong>45</strong>
                </div>
                <div class="resumo-item">
                    Total de Sucos: <strong>28</strong>
                </div>
            </div>

        </div>
    </main>

</body>
</html>