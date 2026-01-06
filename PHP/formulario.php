<?php
include 'banco.php';

if(isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha= $_POST['senha'];
cadastrar_usuario($nome,$email,$senha);
}
?>