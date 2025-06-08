<?php 
include_once './includes/classes/autor.php';
$autor = new autor();
$autores = $autor->listarTodos();
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
		<div id="body">
			<form method="POST" id="formulario">
				<label>Nome do autor : </label>
				<input type="text" name="name" id="nome" required>
				<button type="submit" id="btn" disabled>Enviar</button>
				<button type="button" id="btnedit">Editar</button>
				<button type="button" id="cancel">Cancelar</button>
			</form>
			<table id="tabela">
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
							<td>'.$autores[$i]['aut_nome'].'</td><td><a href="#s" data-id="'.$autores[$i]['aut_codigo'].'" data-nome="'.$autores[$i]['aut_nome'].'" class="editarAutor">Edit</a></td><td><a href="#" class="excluir" data-id="'.$autores[$i]['aut_codigo'].'" data-nome="'.$autores[$i]['aut_nome'].'">Excluir</a></td>
							</tr>';
						}
						?>
					</tbody>
				</table>
		</div>
		<script>
			document.addEventListener("DOMContentLoaded",function(){
				document.getElementById('btn').addEventListener("click",function(event){
					event.preventDefault();
					cadastroAutor();
				});
				document.getElementById('nome').addEventListener("input",anulabtnCad);
				document.querySelectorAll('.editarAutor').forEach(btn=>{
					btn.addEventListener('click',function(e){
						e.preventDefault();
						document.getElementById('tabela').style.display = 'none';
						document.getElementById('btn').style.display = 'none';
						document.getElementById('btnedit').style.display = 'inline';
						document.getElementById('cancel').style.display = 'inline';
						document.getElementById('nome').value = this.dataset.nome;
					});
				});
				document.querySelectorAll('.excluir').forEach(btn =>{
					btn.addEventListener('click',function(e){
						e.preventDefault();
						if(confirm('Deseja realmente excluir o registro "'+this.dataset.nome+'"')){
							excluirAutor(this.dataset.id);
						}
					})
				});
				document.getElementById('cancel').addEventListener('click',()=>{
					document.getElementById('btn').style.display = 'inline';
					document.getElementById('btnedit').style.display = 'none';
					document.getElementById('cancel').style.display = 'none';
					document.getElementById('tabela').style.display = 'inline';
					document.getElementById('formulario').reset();
        			anulabtnCad();
				});
			});
		</script>
		<script src="./includes/functions/funcoes.js"></script>
	</body>
</html>