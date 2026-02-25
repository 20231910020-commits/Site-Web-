<?php
session_start();

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

/* BANCO DE DADOS */
require_once "config.php";
$con = conectar();

$id_usuario = $_SESSION['id_usuario'];

$sql = "INSERT INTO pedidos
        (id_usuario, data_pedido, tipo_refeicao, quantidade, total, status)
        VALUES (:id_usuario, :data_pedido, :tipo, :quantidade, :total, 'Agendado')";

$stmt = $con->prepare($sql);
$stmt->bindParam(":id_usuario", $id_usuario);
$stmt->bindParam(":data_pedido", $data_formatada);
$stmt->bindParam(":tipo", $tipo_refeicao);
$stmt->bindParam(":quantidade", $quantidade);
$stmt->bindParam(":total", $total);
$stmt->execute();

/* REDIRECIONA PARA CONFIRMAÇÃO */
header("Location: ../confirmacao.php");
exit;