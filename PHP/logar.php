<?php
include 'banco.php';

if(isset($_POST['salvar'])) {
    $email = $_POST['email'];
    $senha= $_POST['senha'];

    login($email, $senha);

  
}
?>