<?php
include_once '../classes/genero.php';
$genero = new genero();
$codigo = filter_input(INPUT_GET,'cod');
$genero->excluir($codigo);