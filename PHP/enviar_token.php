<?php
include 'banco.php';
include 'enviar_email.php';
if(isset($_POST['salvar'])) {
$email = $_POST['email'];
$token = bin2hex(random_bytes(16));
$token_hash =hash('sha256', $token);
$expirar = date("Y-m-d H:i:s", time() + 60 * 30);

if(inserir_token($email, $token_hash, $expirar)){
    enviar_email($email, $token);
}

 header('Location:../verificar_email.php');
        exit;
   


}
?>