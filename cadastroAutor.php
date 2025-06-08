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
    <title> █ Biblioteca Virtual █ </title>
    
    <!-- Bootstrap -->
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

    <!-- Navegação -->
    <nav>
      <ul>
        <li><a href="./index.php">Index</a></li>
        <li><a href="./cadastroAutor.php">Autor</a></li>
        <li><a href="./cadastroGenero.php">Genero</a></li>
        <li><a href="./cadastroLivro.php">Livro</a></li>
      </ul>
    </nav>

    <!-- Conteúdo principal -->
    <div class="container mt-4">
      <h2 class="mb-4">Cadastro de Autor</h2>

      <form method="POST" id="formulario" class="mb-4 row g-3">
        <div class="col-md-6">
          <label class="form-label">Nome do autor:</label>
          <input type="text" name="name" id="nome" class="form-control" required>
        </div>
        <div class="col-md-6 d-flex align-items-end gap-2">
          <button type="submit" class="btn btn-success" id="btn" disabled>Enviar</button>
          <button type="button" class="btn btn-primary" id="btnedit">Editar</button>
          <button type="button" class="btn btn-secondary" id="cancel">Cancelar</button>
        </div>
      </form>

      <table id="tabela" class="table table-striped table-bordered">
        <thead class="table-dark">
          <tr>
            <th>Nome</th>
            <th>Editar</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <tbody>
          <?php
          for ($i = 0; $i <= count($autores) - 1; $i++) {
            print '
              <tr>
                <td>' . $autores[$i]['aut_nome'] . '</td>
                <td><a href="#s" data-id="' . $autores[$i]['aut_codigo'] . '" data-nome="' . $autores[$i]['aut_nome'] . '" class="btn btn-sm btn-warning editarAutor">Editar</a></td>
                <td><a href="#" class="btn btn-sm btn-danger excluir" data-id="' . $autores[$i]['aut_codigo'] . '" data-nome="' . $autores[$i]['aut_nome'] . '">Excluir</a></td>
              </tr>';
          }
          ?>
        </tbody>
      </table>
    </div>

    <!-- JS -->
    <script src="./includes/functions/funcoes.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('btn').addEventListener("click", function (event) {
          event.preventDefault();
          cadastroAutor();
        });

        document.getElementById('btnedit').addEventListener('click', () => {
          let nome = document.getElementById('nome').value;
          editarAutor(cod, nome);
        });

        document.getElementById('nome').addEventListener("input", anulabtnCad);

        document.querySelectorAll('.editarAutor').forEach(btn => {
          btn.addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('tabela').style.display = 'none';
            document.getElementById('btn').style.display = 'none';
            document.getElementById('btnedit').style.display = 'table-cell';
            document.getElementById('cancel').style.display = 'table-cell';
            document.getElementById('nome').value = this.dataset.nome;
            window.cod = this.dataset.id;
          });
        });

        document.querySelectorAll('.excluir').forEach(btn => {
          btn.addEventListener('click', function (e) {
            e.preventDefault();
            if (confirm('Deseja realmente excluir o registro "' + this.dataset.nome + '"')) {
              excluirAutor(this.dataset.id);
            }
          });
        });

        document.getElementById('cancel').addEventListener('click', () => {
          document.getElementById('btn').style.display = 'table-cell';
          document.getElementById('btnedit').style.display = 'none';
          document.getElementById('cancel').style.display = 'none';
          document.getElementById('tabela').style.display = 'table-cell';
          document.getElementById('formulario').reset();
          anulabtnCad();
        });
      });
    </script>
  </body>
</html>
