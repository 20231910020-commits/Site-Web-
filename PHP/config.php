<?php
function conectar(){
$server="localhost:3306";
$nomedb="LP";
$username="731";
$senha="turma731";

$conexao = new PDO("mysql:host=$server;dbname=$nomedb",$username,$senha);
return $conexao;
}
?>
