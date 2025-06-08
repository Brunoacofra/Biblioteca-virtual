<?php
	include_once './includes/classes/genero.php';
	include_once './includes/classes/livro.php';
	include_once './includes/classes/autor.php';
	$aut = new autor();
	$autores = $aut->listarTodos();

	if($_SERVER['REQUEST_METHOD'] === "POST"){
		$liv = new livro();
		$conta = count($_POST)-2;
		$gender = [];
		$liv->setName(filter_input(INPUT_POST, 'nomeliv'));
		$liv->setAutor(filter_input(INPUT_POST, 'autor', FILTER_VALIDATE_INT));
		for($x = 0; $x < $conta; $x++){
			$gender[$x] = filter_input(INPUT_POST, 'select_' . ($x+1), FILTER_VALIDATE_INT);
		}
		$liv->setGenero($gender);
		$liv->cadastrar();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>█ Biblioteca Virtual █</title>

		<!-- Bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="./includes/estilos/style.css">

		<style>
			nav ul {
				display: flex;
				gap: 1rem;
				list-style: none;
				padding: 1rem;
				background-color: #f8f9fa;
				margin: 0;
			}
			nav ul li a {
				text-decoration: none;
				font-weight: bold;
				color: #0d6efd;
			}
		</style>
	</head>
	<body class="bg-light">

		<nav>
			<ul>
				<li><a href="./index.php">Index</a></li>
				<li><a href="./cadastroAutor.php">Autor</a></li>
				<li><a href="./cadastroGenero.php">Genero</a></li>
				<li><a href="./cadastroLivro.php">Livro</a></li>
			</ul>
		</nav>

		<div class="container mt-4">
			<h2 class="mb-4">Cadastro de Livro</h2>

			<form method="POST" class="row g-3">
				<div class="col-md-6">
					<label for="nomeliv" class="form-label">Nome do Livro:</label>
					<input type="text" name="nomeliv" class="form-control" required>
				</div>

				<div class="col-md-6">
					<label class="form-label">Autor:</label>
					<select name="autor" class="form-select" required>
						<option value="default">Selecione...</option>
						<?php
							for($i = 0; $i < count($autores); $i++){
								print '<option value="'.$autores[$i]['aut_codigo'].'">'.$autores[$i]['aut_nome'].'</option>';
							}
						?>
					</select>
				</div>

				<div class="col-md-12">
					<label class="form-label">Gênero:</label>
					<div class="mb-2">
						<button id="adc" type="button" class="btn btn-sm btn-success">+</button>
						<button id="remove" type="button" class="btn btn-sm btn-danger">-</button>
					</div>
					<div id="Gender" class="row g-2"></div>
				</div>

				<div class="col-12">
					<button type="submit" class="btn btn-primary" id="btn" disabled>Cadastrar</button>
				</div>
			</form>
		</div>

		<script>
			document.addEventListener("DOMContentLoaded", function(){
				document.getElementById('adc').addEventListener("click", adicionar);
				document.getElementById('remove').addEventListener("click", remover);
			});
		</script>
		<script src="./includes/functions/funcoes.js"></script>
	</body>
</html>
