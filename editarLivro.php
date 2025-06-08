<?php
include_once './includes/classes/livro.php';
include_once './includes/classes/autor.php';
include_once './includes/classes/genero.php';

$livro = new livro();
$autor = new autor();
$genero = new genero();

$autores = $autor->listarTodos();
$generos = $genero->listarTodos();

// Se o ID vier por GET, carrega os dados
if (isset($_GET['id'])) {
    $livroSelecionado = $livro->buscarPorId($_GET['id']);
    $generosDoLivro = $livro->buscarGeneros($_GET['id']);
}

// Atualiza se for POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'livro_id', FILTER_VALIDATE_INT);
    $nome = filter_input(INPUT_POST, 'nomeliv', FILTER_SANITIZE_SPECIAL_CHARS);
    $autor_id = filter_input(INPUT_POST, 'autor', FILTER_VALIDATE_INT);

    $livro->setCodigo($id);
    $livro->setName($nome);
    $livro->setAutor($autor_id);

    $generosSelecionados = [];
    $conta = count($_POST) - 3;
    for ($i = 0; $i < $conta; $i++) {
        $generosSelecionados[$i] = filter_input(INPUT_POST, 'select_' . ($i + 1), FILTER_VALIDATE_INT);
    }

    $livro->setGenero($generosSelecionados);
    $livro->editar();

    header("Location: cadastroLivro.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="bg-white p-3 border-bottom mb-4">
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="./index.php">Index</a></li>
            <li class="nav-item"><a class="nav-link" href="./cadastroAutor.php">Autor</a></li>
            <li class="nav-item"><a class="nav-link" href="./cadastroGenero.php">Genero</a></li>
            <li class="nav-item"><a class="nav-link" href="./cadastroLivro.php">Livro</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2>Editar Livro</h2>
        <form method="POST" class="row g-3">
            <input type="hidden" name="livro_id" value="<?= $livroSelecionado['liv_codigo'] ?>">

            <div class="col-md-6">
                <label class="form-label">Nome do Livro:</label>
                <input type="text" name="nomeliv" class="form-control" value="<?= htmlspecialchars($livroSelecionado['liv_nome']) ?>" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Autor:</label>
                <select name="autor" class="form-select">
                    <?php foreach ($autores as $a): ?>
                        <option value="<?= $a['aut_codigo'] ?>" <?= $a['aut_codigo'] == $livroSelecionado['aut_codigo'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($a['aut_nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-12">
                <label class="form-label">Gêneros:</label>
                <div class="mb-2">
                    <button type="button" class="btn btn-sm btn-success" id="adc">+</button>
                    <button type="button" class="btn btn-sm btn-danger" id="remove">-</button>
                </div>
                <div id="Gender" class="row g-2">
                    <?php
                    $count = 1;
                    foreach ($generosDoLivro as $g):
                    ?>
                        <div class="col-md-4">
                            <select name="select_<?= $count ?>" class="form-select">
                                <?php foreach ($generos as $gen): ?>
                                    <option value="<?= $gen['gen_codigo'] ?>" <?= $gen['gen_codigo'] == $g['gen_codigo'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($gen['gen_nome']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php $count++; endforeach; ?>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let cont = <?= count($generosDoLivro) ?>;
            const genderDiv = document.getElementById("Gender");

            document.getElementById("adc").addEventListener("click", () => {
                cont++;
                const col = document.createElement("div");
                col.className = "col-md-4";
                col.innerHTML = `<select name="select_${cont}" class="form-select">
                    <?php foreach ($generos as $g): ?>
                        <option value="<?= $g['gen_codigo'] ?>"><?= htmlspecialchars($g['gen_nome']) ?></option>
                    <?php endforeach; ?>
                </select>`;
                genderDiv.appendChild(col);
            });

            document.getElementById("remove").addEventListener("click", () => {
                if (genderDiv.children.length > 1) {
                    genderDiv.removeChild(genderDiv.lastElementChild);
                    cont--;
                }
            });
        });
    </script>
</body>
</html>
