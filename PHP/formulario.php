<?php
include 'banco.php';

if(isset($_POST['salvar'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];
    
    if($senha !== $confirmar_senha) {
        die("As senhas não coincidem.");
    }

    if(strlen($senha) < 6) {
        die("A senha deve ter no mínimo 6 caracteres.");
    }

    cadastrar_usuario($nome,$email,$senha);

    header("Location: ../login.php");
    exit;
}
?>