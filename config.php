<?php

//Configurações básicas

$host = 'localhost';
$dbname = 'lume';
$usarname = 'root';
$password = '';

//CONEXÃO PDO(PADRÃO DE FORMAS DE FAZER A CONEXÃO)

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usarname, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erro ao conectar:" . $e->getMessage());
}
?>