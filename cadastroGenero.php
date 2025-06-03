<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="./includes/estilos/style.css">
		 <title> █ Biblioteca Virtual █ </title>
	</head>
	<body>
		<nav>
            <ul>
                <li><a href="./index.php">Index</a></li>
                <li><a href="./cadastroAutor.php">Autor</a></li>
                <li><a href="./cadastroGenero.php">Genero</a></li>
                <li><a href="./cadastroLivro.php">Livro</a></li>
            </ul>
        </nav>
		<form method="post">
			<label>Genero:</label>
			<input type="text" name="genero">
			<button type="submit">Enviar</button>
		</form>
	</body>
</html>
<?php
include_once __DIR__.'/includes/classes/genero.php';
if(isset($_POST['genero'])){
	$nome = filter_input(INPUT_POST,'genero',FILTER_SANITIZE_SPECIAL_CHARS);
	$gender = new genero();
	$gender->setGenero($nome);
	//print htmlspecialchars($gender->cadastro());
	print $gender->cadastro();
}
?>