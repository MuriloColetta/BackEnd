<?php
require_once __DIR__ . '/../Controller/LivroController.php';

$controller = new LivroController();
$editar = null;

// Ações da página
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['acao'] === 'salvar') {
        $controller->criar($_POST['titulo'], $_POST['autor'], $_POST['ano_publicacao'], $_POST['genero'], $_POST['qtde']);
    } elseif ($_POST['acao'] === 'deletar') {
        $controller->deletar($_POST['titulo']);
    } elseif ($_POST['acao'] === 'editar') {
        $livros = $controller->ler();
        $editar = $livros[$_POST['titulo']] ?? null;
    } elseif ($_POST['acao'] === 'atualizar') {
        $controller->atualizar($_POST['titulo'] ?? null, $_POST['novoTitulo'] ?? null, $_POST['autor'] ?? null, $_POST['ano_publicacao'] ?? null, $_POST['genero'] ?? null, $_POST['qtde']) ?? null;
        }
    }

$lista = $controller->ler();
?>

<!-- Formulário em HTML -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Livros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }
        h1, h2 {
            color: black;
        }
        form {
            margin-bottom: 20px;
        }
        input, select, button {
            margin: 5px 0;
            padding: 8px;
            font-size: 14px;
            border-radius: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Sistema de Gerenciamento de Livros</h1>
    <br>
    <hr>
    <?php if ($editar): ?>
    <h2>Editar livro</h2>
    <form method="POST">
        <input type="hidden" name="acao" value="atualizar">
        <input type="hidden" name="titulo" value="<?= $editar->getTitulo(); ?>">
        <input type="text" name="novoTitulo" value="<?= $editar->getTitulo(); ?>" required>
        <input type="text" name="autor" value="<?= $editar->getAutor(); ?>" required>
        <input type="number" name="ano_publicacao" value="<?= $editar->getAno_publicacao(); ?>" required>
        <input type="text" name="genero" step="0.01" value="<?= $editar->getGenero(); ?>" required>
        <input type="number" name="qtde" value="<?= $editar->getQtde(); ?>" required>
        <button type="submit">Salvar Alterações</button>
    </form>
    <?php else: ?>
        <h2>Cadastrar livro</h2>
        <form method="POST">
            <input type="hidden" name="acao" value="salvar">
            <input type="text" name="titulo" placeholder="Título" required>
            <input type="text" name="autor" placeholder="Autor" required>
            <input type="number" name="ano_publicacao" placeholder="Ano de publicação" required>
            <input type="text" name="genero" placeholder="Gênero literário" required>
            <input type="number" name="qtde" placeholder="Quantidade" required>
            <button type="submit">Cadastrar</button>
        </form>
    <?php endif; ?>

    <h2>Catálogo de Livros</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano de publicação</th>
            <th>Gênero literário</th>
            <th>Quantidade disponível</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($lista as $livro): ?>
            <tr>
                <td><?= $livro->getTitulo(); ?></td>
                <td><?= $livro->getAutor(); ?></td>
                <td><?= $livro->getAno_publicacao(); ?></td>
                <td><?= $livro->getGenero(); ?></td>
                <td><?= $livro->getQtde(); ?></td>

                <td>
                    <form method="POST" style="display:inline">
                        <input type="hidden" name="acao" value="editar">
                        <input type="hidden" name="titulo" value="<?= $livro->getTitulo()?>">
                        <button type="submit">Editar</button>
                    </form>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="acao" value="deletar">
                        <input type="hidden" name="titulo" value="<?= $livro->getTitulo(); ?>">
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>