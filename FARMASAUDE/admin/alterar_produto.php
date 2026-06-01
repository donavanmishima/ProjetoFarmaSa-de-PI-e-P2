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
    $nome = trim($_POST["nome"]);
    $descricao = trim($_POST["descricao"]);
    $preco = floatval($_POST["preco"]);
    $oferta = isset($_POST["oferta"]) ? 1 : 0;
    $remedio = isset($_POST["remedio"]) ? 1 : 0;
    $suplemento = isset($_POST["suplemento"]) ? 1 : 0;
    $beleza = isset($_POST["beleza"]) ? 1 : 0;

    if ($nome == "" || $descricao == "") {
        exit("<h1 style='color: red'>NOME E DESCRIÇÃO SÃO OBRIGATÓRIOS</h1>");
    }

    if ($preco <= 0) {
        exit("<h1 style='color: red'>O PREÇO DEVE SER MAIOR QUE ZERO</h1>");
    }

    $sql = "UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco,"
         . " oferta = :oferta, remedio = :remedio, suplemento = :suplemento, beleza = :beleza"
         . " WHERE id = :id";

    $comando = $pdo->prepare($sql);
    $comando->bindParam(":nome", $nome);
    $comando->bindParam(":descricao", $descricao);
    $comando->bindParam(":preco", $preco);
    $comando->bindParam(":oferta", $oferta);
    $comando->bindParam(":remedio", $remedio);
    $comando->bindParam(":suplemento", $suplemento);
    $comando->bindParam(":beleza", $beleza);
    $comando->bindParam(":id", $id);

    $sucesso = $comando->execute();
    if ($sucesso) {
        header("Location: listar_produtos.php");
        exit();
    }
?>
<h1 style="color: red">FALHA NA ALTERAÇÃO DO PRODUTO</h1>
