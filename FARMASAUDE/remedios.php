<?php
    require("conexao.php");
    require("funcoes.php");

    $produtos = obter_produtos($pdo, "remedio");
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>FarmaSaúde</title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
        <header>
            <img src="imagens/Logo FarmaSaúde.png" alt="Logo FarmaSaúde">
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="ofertas.php">Ofertas e Lançamentos</a></li>
                <li><a href="#">Remédios</a></li>
                <li><a href="suplementos.php">Suplementos</a></li>
                <li><a href="belezacuidado.php">Beleza e Cuidados</a></li>
            </ul>
        </nav>
        <main>
            <h2>Remédios</h2>
            <section id="remedios">
                <?php foreach($produtos as $produto) { ?>
                <div class="card">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt="<?= paraTexto($produto["nome"]) ?>">
                    <h3><?= paraTexto($produto["nome"]) ?></h3>
                    <p><?= paraTexto($produto["descricao"]) ?></p>
                    <span><?= formatar_preco($produto["preco"]) ?></span>
                    <button>Comprar</button>
                </div>
                <?php } ?>
            </section>
        </main>
    <footer>
        <p>&copy; 2026 FarmaSaúde. Todos os direitos reservados.</p>
    </footer>
    </body>
</html>
