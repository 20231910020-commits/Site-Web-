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

    header('Location:../login.php');
    exit;
}

function buscar_usuario($email){
    $conn = conectar();
    $sql= "INSERT INTO usuarios (email) VALUES (:EMAIL)";
    $instrucao= $conn -> prepare ($sql);
    $instrucao -> bindparam(":EMAIL",$email);
    $instrucao -> execute();

    return $instrucao->fetch(PDO::FETCH_ASSOC);

}

function redefinir_senha($token_hash, $nova_senha){
    $conn = conectar();
    $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
    $sql = "UPDATE usuarios SET senha = :SENHA WHERE reset_token_hash = :TOKEN";
    $instrucao = $conn->prepare($sql);
    $instrucao->bindParam(":TOKEN", $token_hash);
    $instrucao->bindParam(":SENHA", $nova_senha_hash);
    $instrucao->execute();
}

function inserir_token($email,$token_hash, $expirar){
    $conn = conectar();
    $sql = "UPDATE usuarios SET reset_token_hash = :TOKEN, token_expirar= :EXPIRAR WHERE email = :EMAIL";
    $instrucao = $conn->prepare($sql);
    $instrucao->bindParam(":EMAIL", $email);
    $instrucao->bindParam(":TOKEN", $token_hash);
    $instrucao->bindParam(":EXPIRAR", $expirar);
    $instrucao->execute();
}   



?>

