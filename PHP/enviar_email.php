<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

function enviar_email($email, $token) {

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                          
    $mail->Host       = 'smtp-relay.brevo.com';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = '9fda0f001@smtp-brevo.com';                    
    $mail->Password   = 'Xv52rTQqIa73kZnD';                               
    $mail->SMTPSecure = 'tls';           
    $mail->Port = 587;                                        
    $mail->setFrom('cantina994@gmail.com', 'Cantina IFBA');
    $mail->addAddress($email);
   
    $mail->Subject = 'Resetar Senha';
    $mail->Body = 'Clique no link para redefinir sua senha: 
<a href="http://localhost/Site-Web-/redefinir_senha.php?token='.$token.'">
Redefinir Senha</a>';
    $mail->isHTML(true);                                  
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



}
?>