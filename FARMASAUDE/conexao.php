<?php
    $tipo_banco = "mysql";
    $servidor = "localhost";
    $porta = 3306;
    $banco = "farmadados";
    $usuario = getenv("FARMASAUDE_DB_USUARIO") ?: "php";
    $senha = getenv("FARMASAUDE_DB_SENHA") ?: "senha123";

    $dsn = "$tipo_banco:host=$servidor;dbname=$banco;port=$porta;charset=utf8";

    try {
        $pdo = new PDO($dsn, $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        error_log("Falha ao conectar no banco farmadados: " . $e->getMessage());
        echo "Falha ao conectar no banco de dados.";
        exit();
    }
?>
