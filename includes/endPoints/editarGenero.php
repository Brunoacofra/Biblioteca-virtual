<?php
include_once '../classes/genero.php';
$genero = new genero();
$cod = filter_input(INPUT_GET,'cod',FILTER_VALIDATE_INT);
$genero->setGenero(filter_input(INPUT_GET,'nome'));
$genero->editar($cod);