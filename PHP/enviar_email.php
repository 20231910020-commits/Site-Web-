<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                          
    $mail->Host       = 'smtp-relay.brevo.com';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = '9fda0f001@smtp-brevo.com';                    
    $mail->Password   = 'Xv52rTQqIa73kZnD';                               
    $mail->SMTPSecure = 'tls';           
    $mail->Port     = 587;                                    
    $mail->setFrom('cantina994@gmail.com', 'Cantina IFBA');
    $mail->addAddress('20231910017@ifba.edu.br');

    

    
    $mail->isHTML(true);                                  
    $mail->Subject = 'Isso é um teste';
    $mail->Body    = 'Testando o envio de email com <b>PHPMailer</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}