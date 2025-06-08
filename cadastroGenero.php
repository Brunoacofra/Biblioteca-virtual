<?php
include_once __DIR__.'/includes/classes/genero.php';
$gender = new genero();
$generos = $gender->listarTodos();

if(isset($_POST['genero'])){
	$nome = filter_input(INPUT_POST,'genero',FILTER_SANITIZE_SPECIAL_CHARS);
	$gender->setGenero($nome);
	print $gender->cadastro();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>█ Biblioteca Virtual █</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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
			<h2 class="mb-4">Cadastro de Gênero</h2>

			<form method="post" id="formulario" class="row g-3 mb-4">
				<div class="col-md-6">
					<label class="form-label">Gênero:</label>
					<input type="text" name="genero" id="nome" class="form-control" required>
				</div>
				<div class="col-md-6 d-flex align-items-end gap-2">
					<button type="submit" class="btn btn-success" id="btn" disabled>Enviar</button>
					<button type="button" class="btn btn-primary" id="btnedit">Editar</button>
					<button type="button" class="btn btn-secondary" id="cancel">Cancelar</button>
				</div>
			</form>

			<table id="tabela" class="table table-bordered table-striped">
				<thead class="table-dark">
					<tr>
						<th>Nome</th>
						<th>Editar</th>
						<th>Excluir</th>
					</tr>
				</thead>
				<tbody>
					<?php
					for($i = 0; $i <= count($generos)-1; $i++) {
						print '
						<tr>
							<td>'.$generos[$i]['gen_nome'].'</td>
							<td><a href="#" class="btn btn-sm btn-warning editar" data-id="'.$generos[$i]['gen_codigo'].'" data-nome="'.$generos[$i]['gen_nome'].'">Editar</a></td>
							<td><a href="#" class="btn btn-sm btn-danger excluir" data-id="'.$generos[$i]['gen_codigo'].'" data-nome="'.$generos[$i]['gen_nome'].'">Excluir</a></td>
						</tr>';
					}
					?>
				</tbody>
			</table>
		</div>

		<script src="./includes/functions/funcoes.js"></script>
		<script>
			document.querySelectorAll('.excluir').forEach(btn => {
				btn.addEventListener('click', function(e) {
					e.preventDefault();
					if(confirm('Deseja realmente excluir o registro "'+this.dataset.nome+'"')) {
						excluirGenero(this.dataset.id);
					}
				})
			});

			document.getElementById('nome').addEventListener("input", anulabtnCad);

			document.getElementById('btnedit').addEventListener('click', () => {
				let nome = document.getElementById('nome').value;
				editarGenero(cod, nome);
			});

			document.querySelectorAll('.editar').forEach(btn => {
				btn.addEventListener('click', function(e) {
					e.preventDefault();
					document.getElementById('tabela').style.display = 'none';
					document.getElementById('btn').style.display = 'none';
					document.getElementById('btnedit').style.display = 'inline';
					document.getElementById('cancel').style.display = 'inline';
					document.getElementById('nome').value = this.dataset.nome;
					window.cod = this.dataset.id;
				});
			});

			document.getElementById('cancel').addEventListener('click', () => {
				document.getElementById('btn').style.display = 'inline';
				document.getElementById('btnedit').style.display = 'none';
				document.getElementById('cancel').style.display = 'none';
				document.getElementById('tabela').style.display = 'inline';
				document.getElementById('formulario').reset();
				anulabtnCad();
			});
		</script>
	</body>
</html>
