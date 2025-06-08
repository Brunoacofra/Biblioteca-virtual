<?php
include_once './includes/classes/livro.php';
$liv = new livro();
$livros = $liv->listarTodos();
//var_dump($livros);
?>
<html>
    <head>
        <title> █ Biblioteca Virtual █ </title>
        <link rel="stylesheet" href="./includes/estilos/style.css">
    </head>
    <style>
        table{
            position:absolute;
            top:10%;
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
        <table>
            <thead>
                <th>Nome: </th>
                <th>Autor: </th>
                <th>Genero(s): </th>
                <th>Editar </th>
                <th>Excluir </th>
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

                        echo '
                        <tr>
                            <td>' . $livros[$x]['livro'] . '</td>
                            <td>' . $livros[$x]['autor'] . '</td>
                            <td>' . $str . '</td>
                            <td><a href="#" data-nome="'.$livros[$x]['livro'].'" data-id="'.$livros[$x]['cod'].'">XXXXX</a></td>
                            <td><a href="#" data-id="'.$livros[$x]['cod'].'">-------</a></td>
                        </tr>';

                        $str = ''; 
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>