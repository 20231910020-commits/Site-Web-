<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'banco.php';

if(isset($_POST['salvar'])){

    $token = trim($_POST['token']);
    $nova_senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];
    
    if($nova_senha !== $confirmar_senha) {
        die("As senhas não coincidem.");
    }

    if (strlen($nova_senha) < 6) {
        die("A senha deve ter no mínimo 6 caracteres.");
    }

    $token_hash = hash('sha256', $token);

    $resultado = redefinir_senha($token_hash, $nova_senha);

    if($resultado){
        header("Location: ../cardapio.php");
        exit;
    } else {
        die("Token inválido ou expirado.");
    }
}
?>