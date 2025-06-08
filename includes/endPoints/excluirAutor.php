<?php
include_once '../classes/autor.php';
$autor = new autor();
$codigo = filter_input(INPUT_GET,'cod');
$autor->excluir($codigo);