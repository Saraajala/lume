<?php

require_once 'C:\Turma2\xampp\htdocs\lume\controller\LumeController.php';
require_once 'C:/aluno2/xampp/htdocs/exercicios_com_banco_de_dados/agenda de eventos/controller/EventoController.php';

$eventoController = new LumeController($pdo);
$eventoController->listarUsuarios();


?>