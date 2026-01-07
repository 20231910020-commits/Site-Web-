<?php
include 'banco.php';

if(isset($_POST['salvar'])) {
    $email = $_POST['email'];
    $senha= $_POST['senha'];

    $usuario = buscar_usuario($email);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Login bem-sucedido
        header('Location:../cardapio.php');
        exit;
    } else {
        // Falha no login
        die("E-mail ou senha incorretos.");
    }
    exit;
}
?>