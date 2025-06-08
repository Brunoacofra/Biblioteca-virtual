<?php
include_once '../classes/genero.php';
header('Content-Type: application/json');
$gender = new genero();
$generos = $gender->listarTodos();
print JSON_encode($generos);