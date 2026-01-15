<?php 
include 'banco.php';
if(isset($_POST['salvar'])){
    $token = $_POST['token'];
    $nova_senha = $_POST['senha'];
    $token_hash = hash('sha256', $token);
    $confirmar_senha= $_POST['confirmar_senha'];
    
    if($nova_senha !== $confirmar_senha) {
        die("As senhas não coincidem.");
    }

    if (strlen($nova_senha) < 6) {
        die("A senha deve ter no mínimo 6 caracteres.");
    }

    redefinir_senha($token_hash, $nova_senha);
    header('Location:../login.php');
    exit;
}


?>