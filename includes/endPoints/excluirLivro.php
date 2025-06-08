<?php
include_once '../classes/livro.php';
$livro = new livro();
$codigo = filter_input(INPUT_GET,'cod');
$livro->excluir($codigo);