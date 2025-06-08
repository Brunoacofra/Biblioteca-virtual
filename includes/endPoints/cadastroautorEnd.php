<?php 
include_once '../classes/autor.php';
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$autor = new autor();
$autor->setNome($nome);
$autor->cadastro();