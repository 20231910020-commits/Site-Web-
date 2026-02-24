<?php
function conectar(){
    $server="localhost:3306";
    $nomedb="LP";
    $username="root";
    $senha="";

    $conn = new PDO ("mysql:dbname=LP;host=127.0.0.1:3306","root","root");
    return $conn;
}
?>
