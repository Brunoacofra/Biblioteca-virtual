<?php
	include_once './includes/classes/genero.php';
	include_once './includes/classes/autor.php';
	$aut = new autor();
	$autores = $aut->listarTodos();
	//var_dump($autores);
	if($_SERVER['REQUEST_METHOD'] ==="POST"){
		$liv = new livro();
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
			<label>Nome livro:</label>
			<input type="text" required>
			<br>
			<label>Autor:</label>
			<select>
				<option value="default">Selecione...</option>
				<?php
					for($i = 0;$i <= count($autores)-1;$i++){
						print '<option value="'.$autores[$i]['aut_codigo'].'">'.$autores[$i]['aut_nome'].'</option>';
					}
				?>
			</select>
			<br>
			<label>Genero:</label><button id="adc" type="button">+</button><button id="remove" type="button">-</button>
			<br>
			<div id="Gender"></div>
			<button type="submit" id="btn" disabled>Cadastrar</button>
		</form>
		<script>
			document.addEventListener("DOMContentLoaded",function(){
				let btn = document.getElementById('btn');
				document.getElementById('adc').addEventListener("click",adicionar);
				document.getElementById('remove').addEventListener("click",remover);
			});
		</script>
		<script src="./includes/functions/funcoes.js"></script>
	</body>
</html>