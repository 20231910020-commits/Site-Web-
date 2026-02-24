<?php
session_start();
include 'banco.php';

if(isset($_POST['salvar'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = login($email, $senha);

    if($usuario) {
    $_SESSION['id_usuario'] = $usuario['id_usuario'];
    $_SESSION['usuario'] = $usuario['nome'];
    $_SESSION['role'] = $usuario['ROLE'];
    

    if($_SESSION['role'] === 'Admin') {
        header("Location: ../admin.php");
    } else {
        header("Location: ../painel.php");
    }

    exit;
}
}
?>