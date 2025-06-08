<?php
include_once './includes/classes/livro.php';
$liv = new livro();
$livros = $liv->listarTodos();
?>
<html>
  <head>
    <title>█ Biblioteca Virtual █</title>
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

      table {
        margin-top: 2rem;
      }
    </style>
  </head>
  <body class="bg-light">

    <!-- Menu de navegação -->
    <nav>
      <ul>
        <li><a href="./index.php">Index</a></li>
        <li><a href="./cadastroAutor.php">Autor</a></li>
        <li><a href="./cadastroGenero.php">Genero</a></li>
        <li><a href="./cadastroLivro.php">Livro</a></li>
      </ul>
    </nav>

    <div class="container mt-4">
      <h2 class="mb-4">📚 Lista de Livros Cadastrados</h2>
      <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <th>Nome</th>
            <th>Autor</th>
            <th>Genero(s)</th>
            <th>Editar</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $str = '';
          $tamanho = count($livros);
          for ($x = 0; $x < $tamanho; $x++) {
              $str .= $livros[$x]['genero'];
              if ($x < $tamanho - 1 && $livros[$x]['livro'] == $livros[$x + 1]['livro']) {
                  $str .= ', ';
                  continue;
              }
              print '
              <tr>
                  <td>' . $livros[$x]['livro'] . '</td>
                  <td>' . $livros[$x]['autor'] . '</td>
                  <td>' . $str . '</td>
                  <td><a href="#" class="btn btn-sm btn-primary" data-nome="'.$livros[$x]['livro'].'" data-id="'.$livros[$x]['cod'].'">Editar</a></td>
                  <td><a href="#" class="btn btn-sm btn-danger excluir" data-nome="'.$livros[$x]['livro'].'" data-id="'.$livros[$x]['cod'].'">Excluir</a></td>
              </tr>';
              $str = '';
          }
          ?>
        </tbody>
      </table>
    </div>

    <script src="./includes/functions/funcoes.js"></script>
    <script>
      document.querySelectorAll('.excluir').forEach(btn => {
        btn.addEventListener('click', function (e) {
          e.preventDefault();
          if (confirm('Deseja realmente excluir o registro "' + this.dataset.nome + '"')) {
            excluirLivro(this.dataset.id);
          }
        });
      });
    </script>
  </body>
</html>
