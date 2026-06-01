<?php
    session_start();

    if (!isset($_SESSION["csrf_token"])) {
        $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
    }

    require("../conexao.php");
    require("../funcoes.php");

    if (!isset($_GET["id"])) {
        exit("<h1 style='color: red'>ID DO PRODUTO NÃO INFORMADO</h1>");
    }

    $id = intval($_GET["id"]);
    if ($id <= 0) {
        exit("<h1 style='color: red'>ID DO PRODUTO INVÁLIDO</h1>");
    }

    $sql = "SELECT * FROM produtos WHERE id = :id";
    $comando = $pdo->prepare($sql);
    $comando->bindParam(":id", $id);
    $comando->execute();
    $produto = $comando->fetch();

    if (!$produto) {
        exit("<h1 style='color: red'>PRODUTO NÃO ENCONTRADO</h1>");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Alterar Produto</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <h1>FarmaSaúde - Área Administrativa</h1>
        <h2>Alterar produto</h2>
        <p><a href="listar_produtos.php">Voltar para a listagem</a></p>
        <form action="alterar_produto.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
            <div>
                <label for="nome">Nome do produto:</label>
                <input type="text" id="nome" value="<?= paraTexto($produto["nome"]) ?>"
                    name="nome" size="50" maxlength="50" required>
                <input type="hidden" name="id" value="<?= $id ?>">
            </div>
            <div>
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" rows="5" cols="50" maxlength="255" required><?= paraTexto($produto["descricao"]) ?></textarea>
            </div>
            <div>
                <label for="preco">Preço: R$ </label>
                <input type="number" value="<?= $produto["preco"] ?>" id="preco" name="preco" step="any" min="0.01" required>
            </div>
            <div>
                <label><input type="checkbox" name="oferta" value="1" <?= $produto["oferta"] ? "checked" : "" ?>> Em ofertas e lançamentos</label>
            </div>
            <div>
                <label><input type="checkbox" name="remedio" value="1" <?= $produto["remedio"] ? "checked" : "" ?>> Categoria remédios</label>
            </div>
            <div>
                <label><input type="checkbox" name="suplemento" value="1" <?= $produto["suplemento"] ? "checked" : "" ?>> Categoria suplementos</label>
            </div>
            <div>
                <label><input type="checkbox" name="beleza" value="1" <?= $produto["beleza"] ? "checked" : "" ?>> Categoria beleza e cuidados</label>
            </div>
            <div id="divbotao">
                <button>Alterar</button>
            </div>
        </form>
    </body>
</html>
