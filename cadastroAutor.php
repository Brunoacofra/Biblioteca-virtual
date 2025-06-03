<?php 
include_once './includes/classes/autor.php';
$autor = new autor();
$autores = $autor->listarTodos();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_SPECIAL_CHARS);
	$autor->setNome($name);
	$autor->cadastro();
	header("Location: cadastroAutor.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="./includes/estilos/style.css">
		 <title> █ Biblioteca Virtual █ </title>
	</head>
	<style>
		table, th, td {
  			border: 1px solid black;
  			border-collapse: collapse;
		}
	</style>
	<body>
		<nav>
            <ul>
                <li><a href="./index.php">Index</a></li>
                <li><a href="./cadastroAutor.php">Autor</a></li>
                <li><a href="./cadastroGenero.php">Genero</a></li>
                <li><a href="./cadastroLivro.php">Livro</a></li>
            </ul>
        </nav>
		<div id="body">
			<form method="POST">
				<label>Nome do autor : </label>
				<input type="text" name="name" required>
				<button type="submit" id="btn">Enviar</button>
			</form>
			<table>
					<thead>
						<tr>
							<th> Nome </th>
							<th> Editar </th>
							<th> Excluir </th>
						</tr>
					</thead>
					<tbody>
						<?php
						for($i = 0;$i <= count($autores)-1;$i++){
							print'<tr>
							<td>'.$autores[$i]['aut_nome'].'</td><td><a href="#s">Edit</a></td><td><a href="#">Excluir</a></td>
							</tr>';
						}
						?>
					</tbody>
				</table>
		</div>
	</body>
</html>