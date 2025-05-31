<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Biblioteca Virtual</title>
	</head>
	<body>
		<form method="POST">
			<label>Nome do autor : </label>
			<input type="text" name="name" required>
			<button type="submit" id="btn">Enviar</button>
		</form>
	</body>
</html>
<?php
include_once './includes/classes/autor.php';
//ob_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_SPECIAL_CHARS);
	$autor = new autor();
	$autor->setNome($name);
	$autor->cadastro();
	header("Location: cadastroAutor.php");
	exit;
}
//ob_end_flush();