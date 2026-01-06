<?php
include 'config.php';

function cadastrar_usuario($nome, $email, $senha){
    $conn = conectar();
    $sql= "INSERT INTO usuarios (nome, email, senha, role) VALUES (:NOME, :EMAIL, :SENHA, 'Cliente')";
   
    $senhaHash= password_hash($senha, PASSWORD_DEFAULT);

    $instrucao= $conn -> prepare ($sql);
    $instrucao -> bindparam(":NOME",$nome);
    $instrucao -> bindparam(":EMAIL",$email);
    $instrucao -> bindparam(":SENHA",$senhaHash);
    $instrucao -> execute();

}

?>