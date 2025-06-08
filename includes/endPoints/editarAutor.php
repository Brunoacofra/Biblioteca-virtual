<?php
include_once '../classes/autor.php';
$autor = new autor();
$cod = filter_input(INPUT_GET,'cod',FILTER_VALIDATE_INT);
$autor->setNome(filter_input(INPUT_GET,'nome'));
$autor->editarAutor($cod);