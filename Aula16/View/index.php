<?php
require_once __DIR__ . '/../Controller/bebidaController.php';

$controller = new BebidaController();
$editar = null;

// Ações da página
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['acao'] === 'salvar') {
        $controller->criar($_POST['nome'], $_POST['categoria'], $_POST['volume'], $_POST['valor'], $_POST['qtde']);
    } elseif ($_POST['acao'] === 'deletar') {
        $controller->deletar($_POST['nome']);
    } elseif ($_POST['acao'] === 'editar') {
        $bebidas = $controller->ler();
        $editar = $bebidas[$_POST['nome']] ?? null;
    } elseif ($_POST['acao'] === 'atualizar') {
        $controller->atualizar($_POST['nome'] ?? null, $_POST['novoNome'] ?? null, $_POST['categoria'] ?? null, $_POST['volume'] ?? null, $_POST['valor'] ?? null, $_POST['qtde']) ?? null;
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
    <title>Formulário de bebidas</title>
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
    <h1>Gerenciamento de bebidas</h1>
    <br>
    <hr>
    <?php if ($editar): ?>
    <h2>Editar bebida</h2>
    <form method="POST">
        <input type="hidden" name="acao" value="atualizar">
        <input type="hidden" name="nome" value="<?= $editar->getNome(); ?>">
        <input type="text" name="novoNome" value="<?= $editar->getNome(); ?>" required>
        <select name="categoria" required>
            <option value="">Selecione</option>
            <option>Refrigerante</option>
            <option>Cerveja</option>
            <option>Vinho</option>
            <option>Destilado</option>
            <option>Água</option>
            <option>Suco</option>
            <option>Energético</option>
        </select>
        <input type="text" name="volume" value="<?= $editar->getVolume(); ?>" required>
        <input type="number" name="valor" step="0.01" value="<?= $editar->getValor(); ?>" required>
        <input type="number" name="qtde" value="<?= $editar->getQtde(); ?>" required>
        <button type="submit">Salvar Alterações</button>
    </form>
    <?php else: ?>
        <h2>Cadastrar bebida</h2>
        <form method="POST">
            <input type="hidden" name="acao" value="salvar">
            <input type="text" name="nome" placeholder="Nome" required>
            <select name="categoria" required>
                <option value="">Selecione</option>
                <option>Refrigerante</option>
                <option>Cerveja</option>
                <option>Vinho</option>
                <option>Destilado</option>
                <option>Água</option>
                <option>Suco</option>
                <option>Energético</option>
            </select>
            <input type="text" name="volume" placeholder="Volume (ex: 300ml)" required>
            <input type="number" name="valor" step="0.01" placeholder="Valor (R$)" required>
            <input type="number" name="qtde" placeholder="Quantidade" required>
            <button type="submit">Cadastrar</button>
        </form>
    <?php endif; ?>

    <h2>Bebidas cadastradas</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Volume</th>
            <th>Valor (R$)</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($lista as $bebida): ?>
            <tr>
                <td><?= $bebida->getNome(); ?></td>
                <td><?= $bebida->getCategoria(); ?></td>
                <td><?= $bebida->getVolume(); ?></td>
                <td><?= $bebida->getValor(); ?></td>
                <td><?= $bebida->getQtde(); ?></td>

                <td>
                    <form method="POST" style="display:inline">
                        <input type="hidden" name="acao" value="editar">
                        <input type="hidden" name="nome" value="<?= $bebida->getNome()?>">
                        <button type="submit">Editar</button>
                    </form>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="acao" value="deletar">
                        <input type="hidden" name="nome" value="<?= $bebida->getNome(); ?>">
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>