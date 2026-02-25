<?php
session_start();
require_once "banco.php";

if(!isset($_SESSION['usuario'])){
    header("Location: ../login.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] !== "POST"){
    header("Location: ../agendamento.php");
    exit;
}

/* RECEBENDO DADOS */
$quantidade = (int) $_POST['quantidade'];
$tipo_refeicao = $_POST['tipo_refeicao'];
$tipo_data = $_POST['tipo_data'];
$pagamento = $_POST['pagamento'];
$suco = isset($_POST['suco']) ? 2 : 0;

/* DATA */
if($tipo_data == 'hoje'){
    $data_formatada = date('Y-m-d');
} else {
    $data_formatada = date('Y-m-d', strtotime($_POST['data_agendamento']));
}

/* CÁLCULO */
$preco = 12;
$total = ($preco + $suco) * $quantidade;

/* SENHA */
$senha = rand(100,999);

/* SALVAR NA SESSION */
$_SESSION['confirmacao'] = [
    "senha" => $senha,
    "usuario" => $_SESSION['usuario'],
    "data" => $data_formatada,
    "tipo" => $tipo_refeicao,
    "quantidade" => $quantidade,
    "pagamento" => $pagamento,
    "suco" => $suco,
    "total" => $total
];

/* CHAMANDO FUNÇÃO DO BANCO */
$id_usuario = $_SESSION['id_usuario'];

inserir_pedido(
    $id_usuario,
    $data_formatada,
    $tipo_refeicao,
    $quantidade,
    $total
);

/* REDIRECIONA */
header("Location: ../confirmacao.php");
exit;