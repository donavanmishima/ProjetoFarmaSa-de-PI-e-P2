<?php
    require("conexao.php");
    require("funcoes.php");

    $produtos_ofertas = obter_produtos($pdo, "oferta");
    $produtos_remedios = obter_produtos($pdo, "remedio");
    $produtos_suplementos = obter_produtos($pdo, "suplemento");
    $produtos_beleza = obter_produtos($pdo, "beleza");
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
                <li><a href="#">Início</a></li>
                <li><a href="ofertas.php">Ofertas e Lançamentos</a></li>
                <li><a href="remedios.php">Remédios</a></li>
                <li><a href="suplementos.php">Suplementos</a></li>
                <li><a href="belezacuidado.php">Beleza e Cuidados</a></li>
            </ul>
        </nav>
        <main>
            <h2>Ofertas e Lançamentos</h2>
            <section id="ofertas">
                <?php foreach($produtos_ofertas as $produto) { ?>
                <div class="card">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt="<?= paraTexto($produto["nome"]) ?>">
                    <h3><?= paraTexto($produto["nome"]) ?></h3>
                    <p><?= paraTexto($produto["descricao"]) ?></p>
                    <span><?= formatar_preco($produto["preco"]) ?></span>
                    <button>Comprar</button>
                </div>
                <?php } ?>
            </section>

            <h2>Remédios</h2>
            <section id="remedios">
                <?php foreach($produtos_remedios as $produto) { ?>
                <div class="card">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt="<?= paraTexto($produto["nome"]) ?>">
                    <h3><?= paraTexto($produto["nome"]) ?></h3>
                    <p><?= paraTexto($produto["descricao"]) ?></p>
                    <span><?= formatar_preco($produto["preco"]) ?></span>
                    <button>Comprar</button>
                </div>
                <?php } ?>
            </section>

            <h2>Suplementos</h2>
            <section id="suplementos">
                <?php foreach($produtos_suplementos as $produto) { ?>
                <div class="card">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" alt="<?= paraTexto($produto["nome"]) ?>">
                    <h3><?= paraTexto($produto["nome"]) ?></h3>
                    <p><?= paraTexto($produto["descricao"]) ?></p>
                    <span><?= formatar_preco($produto["preco"]) ?></span>
                    <button>Comprar</button>
                </div>
                <?php } ?>
            </section>

            <h2>Beleza e Cuidados</h2>
            <section id="beleza">
                <?php foreach($produtos_beleza as $produto) { ?>
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
