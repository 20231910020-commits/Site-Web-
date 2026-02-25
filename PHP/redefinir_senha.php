<?php
session_start();
include 'banco.php';

if(isset($_POST['salvar'])){

    $token = trim($_POST['token']);
    $nova_senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if($nova_senha !== $confirmar_senha) {
        $_SESSION['erro_redefinir'] = "As senhas não coincidem.";
        header("Location: ../redefinir_senha.php?token=".$token);
        exit;
    }

    if(strlen($nova_senha) < 6) {
        $_SESSION['erro_redefinir'] = "A senha deve ter no mínimo 6 caracteres.";
        header("Location: ../redefinir_senha.php?token=".$token);
        exit;
    }

    $token_hash = hash('sha256', $token);

    $resultado = redefinir_senha($token_hash, $nova_senha);

    if($resultado){
        $_SESSION['sucesso'] = "Senha redefinida com sucesso!";
        header("Location: ../login.php");
        exit;
    } else {
        $_SESSION['erro_redefinir'] = "Token inválido ou expirado.";
        header("Location: ../esqueceu_senha.php");
        exit;
    }
}
?>