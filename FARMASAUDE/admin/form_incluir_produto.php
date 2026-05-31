<?php
    session_start();

    if (!isset($_SESSION["csrf_token"])) {
        $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Incluir Produto</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <h1>FarmaSaúde - Área Administrativa</h1>
        <h2>Incluir produto</h2>
        <p><a href="index.php">Voltar ao menu</a></p>
        <form action="incluir_produto.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
            <div>
                <label for="nome">Nome do produto:</label>
                <input type="text" id="nome" name="nome" size="50" maxlength="50" required>
            </div>
            <div>
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" rows="5" cols="50" maxlength="255" required></textarea>
            </div>
            <div>
                <label for="preco">Preço: R$ </label>
                <input type="number" id="preco" name="preco" step="any" min="0.01" required>
            </div>
            <div>
                <label><input type="checkbox" name="oferta" value="1"> Em ofertas e lançamentos</label>
            </div>
            <div>
                <label><input type="checkbox" name="remedio" value="1"> Categoria remédios</label>
            </div>
            <div>
                <label><input type="checkbox" name="suplemento" value="1"> Categoria suplementos</label>
            </div>
            <div>
                <label><input type="checkbox" name="beleza" value="1"> Categoria beleza e cuidados</label>
            </div>
            <div id="divbotao">
                <button>Cadastrar</button>
            </div>
        </form>
    </body>
</html>
