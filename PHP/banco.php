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

function redefinir_senha($email, $nova_senha){
    $conn = conectar();
    $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
    $sql = "UPDATE usuarios SET senha = :SENHA WHERE email = :EMAIL";
    $instrucao = $conn->prepare($sql);
    $instrucao->bindParam(":EMAIL", $email);
    $instrucao->bindParam(":SENHA", $nova_senha_hash);
    $instrucao->execute();
}
?>

