<?php
function conectar(){
$server="localhost";
$nomedb="LP";
$username="root";
$senha="root";

$conexao = new PDO("mysql:host=$server;dbname=$nomedb",$username,$senha);
return $conexao;
}
?>
