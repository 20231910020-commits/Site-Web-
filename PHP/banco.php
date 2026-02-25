<?php
require_once 'config.php';

function cadastrar_usuario($nome, $email, $senha){
    $conn = conectar();

    $sql = "INSERT INTO usuarios (nome, email, senha, role) 
            VALUES (:NOME, :EMAIL, :SENHA, 'Cliente')";
   
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $instrucao = $conn->prepare($sql);
    $instrucao -> bindParam(":NOME",$nome);
    $instrucao -> bindParam(":EMAIL",$email);
    $instrucao -> bindParam(":SENHA",$senhaHash);
    $instrucao -> execute();

    return true;
}

function buscar_usuario($email){
    $conn = conectar();
    $sql = "SELECT * FROM usuarios WHERE email = :EMAIL";
    $instrucao= $conn -> prepare ($sql);
    $instrucao -> bindparam(":EMAIL",$email);
    $instrucao -> execute();

    return $instrucao->fetch(PDO::FETCH_ASSOC);

} 

function redefinir_senha($token_hash, $nova_senha){

    $conn = conectar();

    // Verifica se o token existe e não expirou
    $sql = "SELECT email FROM usuarios 
            WHERE reset_token_hash = :token 
            AND token_expirar > NOW()";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":token", $token_hash);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$usuario){
        return 0; // Token inválido
    }

    // Gera hash da nova senha
    $nova_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

    // Atualiza senha e limpa token
    $sql = "UPDATE usuarios 
            SET senha = :senha,
                reset_token_hash = NULL,
                token_expirar = NULL
            WHERE email = :email";

    $update = $conn->prepare($sql);
    $update->bindParam(":senha", $nova_hash);
    $update->bindParam(":email", $usuario['email']);
    $update->execute();

    return $update->rowCount(); // retorna 1 se deu certo
}


function inserir_token($email,$token_hash,$expirar){
    $conn = conectar();

    // Verifica se o email existe
    $check = $conn->prepare("SELECT * FROM usuarios WHERE email = :EMAIL");
    $check->bindParam(":EMAIL", $email);
    $check->execute();

    if($check->rowCount() == 0) {
        return false; // Email não cadastrado
    }

    // Atualiza token
    $sql = "UPDATE usuarios
            SET reset_token_hash = :TOKEN,
                token_expirar = :EXPIRAR
            WHERE email = :EMAIL";

    $instrucao = $conn->prepare($sql);
    $instrucao->bindParam(":EMAIL",$email);
    $instrucao->bindParam(":TOKEN",$token_hash);
    $instrucao->bindParam(":EXPIRAR",$expirar);
    $instrucao->execute();

    return true;
}


function login($email, $senha) {

    $conn = conectar();

    $sql = "SELECT * FROM usuarios WHERE email = :EMAIL";
    $instrucao = $conn->prepare($sql);
    $instrucao->bindParam(":EMAIL", $email);
    $instrucao->execute();

    $usuario = $instrucao->fetch(PDO::FETCH_ASSOC);

     if ($usuario && password_verify($senha, $usuario['senha'])) {
        return $usuario;
    }

    return false; 
}


function token_ainda_valido($email){
    $conn = conectar();

    $sql = "SELECT 1
            FROM usuarios
            WHERE email = :EMAIL
            AND token_expirar IS NOT NULL
            AND token_expirar > NOW()
            LIMIT 1";

    $instrucao = $conn->prepare($sql);
    $instrucao->bindParam(":EMAIL", $email);
    $instrucao->execute();

    return $instrucao->fetch() !== false;
} 
?>

