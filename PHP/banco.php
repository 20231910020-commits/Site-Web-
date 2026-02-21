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
    $check = $conn->prepare("SELECT * FROM usuarios WHERE email = :EMAIL");
    $check->bindParam(":EMAIL", $email);
    $check->execute();

    if($check->rowCount() == 0) {
        die("E-mail não encontrado.");
    }

    $sql = "UPDATE usuarios SET reset_token_hash = :TOKEN, token_expirar= :EXPIRAR WHERE email = :EMAIL";
    $instrucao = $conn->prepare($sql);
    $instrucao->bindParam(":EMAIL", $email);
    $instrucao->bindParam(":TOKEN", $token_hash);
    $instrucao->bindParam(":EXPIRAR", $expirar);
    $instrucao->execute();
}   

function login($email, $senha) {
    $conn = conectar();
    $sql = "SELECT * FROM usuarios WHERE email = :EMAIL";
    $instrucao = $conn->prepare($sql);
    $instrucao->bindParam(":EMAIL", $email);
    $instrucao->execute();
    $usuario = $instrucao->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
         header('Location:../cardapio.php');
        exit;
    } else {
        // Falha no login
        die("E-mail ou senha incorretos.");
    }
    exit;

    
}

 function token_ainda_valido($email){
    $conn = conectar();

    $sql = "SELECT token_expirar FROM usuarios 
            WHERE email = :EMAIL AND token_expirar > NOW()";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":EMAIL",$email);
    $stmt->execute();

    return $stmt->rowCount() > 0;

 }
?>

