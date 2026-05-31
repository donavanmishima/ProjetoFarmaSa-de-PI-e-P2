<?php
    session_start();

    if (!isset($_SESSION["csrf_token"])) {
        $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
    }

    require("../conexao.php");
    require("../funcoes.php");

    $sql = "SELECT * FROM produtos ORDER BY id";
    $comando = $pdo->query($sql);
    $resultado = $comando->fetchAll();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Listagem de Produtos</title>
    </head>
    <body>
        <h1>FarmaSaúde - Área Administrativa</h1>
        <h2>Listagem de Produtos Cadastrados</h2>
        <p><a href="index.php">Voltar ao menu</a></p>
        <table border="1">
            <tr>
                <th>AÇÕES</th>
                <th>ID</th><th>NOME</th><th>DESCRIÇÃO</th><th>PREÇO</th>
                <th>OFERTA?</th><th>REMÉDIO?</th><th>SUPLEMENTO?</th><th>BELEZA?</th>
            </tr>
            <?php foreach($resultado as $produto) { ?>
            <tr>
                <td>
                    <form action="excluir_produto.php" method="POST" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $produto["id"] ?>">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
                        <button type="submit">Excluir</button>
                    </form>
                    |
                    <a href="form_alterar_produto.php?id=<?= $produto["id"] ?>">Alterar</a>
                </td>
                <td><?= $produto["id"] ?></td>
                <td><?= paraTexto($produto["nome"]) ?></td>
                <td><?= paraTexto($produto["descricao"]) ?></td>
                <td><?= formatar_preco($produto["preco"]) ?></td>
                <td><?= $produto["oferta"] == 1 ? "Sim" : "Não" ?></td>
                <td><?= $produto["remedio"] == 1 ? "Sim" : "Não" ?></td>
                <td><?= $produto["suplemento"] == 1 ? "Sim" : "Não" ?></td>
                <td><?= $produto["beleza"] == 1 ? "Sim" : "Não" ?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>
