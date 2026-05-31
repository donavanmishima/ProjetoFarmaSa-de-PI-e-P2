<?php
    session_start();
    require("../conexao.php");

    if (
        !isset($_POST["csrf_token"]) ||
        !isset($_SESSION["csrf_token"]) ||
        !hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])
    ) {
        exit("<h1 style='color: red'>REQUISIÇÃO INVÁLIDA</h1>");
    }

    $id = intval($_POST["id"]);

    $sql = "DELETE FROM produtos WHERE id = :id";
    $comando = $pdo->prepare($sql);
    $comando->bindParam(":id", $id);
    $sucesso = $comando->execute();

    if ($sucesso) {
        header("Location: listar_produtos.php");
        exit();
    }
?>
<h1 style="color: red">FALHA NA EXCLUSÃO DO PRODUTO</h1>
