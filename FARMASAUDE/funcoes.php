<?php
    function obter_produtos($pdo, $categoria = null) {
        $colunas = ["oferta", "remedio", "suplemento", "beleza"];

        if ($categoria !== null && in_array($categoria, $colunas)) {
            if ($categoria == "oferta") {
                $sql = "SELECT * FROM produtos WHERE oferta = true ORDER BY nome";
            } else if ($categoria == "remedio") {
                $sql = "SELECT * FROM produtos WHERE remedio = true ORDER BY nome";
            } else if ($categoria == "suplemento") {
                $sql = "SELECT * FROM produtos WHERE suplemento = true ORDER BY nome";
            } else {
                $sql = "SELECT * FROM produtos WHERE beleza = true ORDER BY nome";
            }

            $comando = $pdo->query($sql);
            return $comando->fetchAll();
        }

        $sql = "SELECT * FROM produtos ORDER BY nome";
        $comando = $pdo->query($sql);
        return $comando->fetchAll();
    }

    function formatar_preco($preco) {
        return "R$ " . number_format($preco, 2, ",", ".");
    }

    function paraTexto($texto) {
        return htmlspecialchars($texto, ENT_QUOTES, "UTF-8");
    }
?>
