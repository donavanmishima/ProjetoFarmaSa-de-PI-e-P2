CREATE DATABASE farmadados;

USE farmadados;

CREATE TABLE produtos (
	id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    descricao VARCHAR(255),
    preco DECIMAL(7, 2) NOT NULL,
    oferta BOOLEAN DEFAULT FALSE,
    remedio BOOLEAN DEFAULT FALSE,
    suplemento BOOLEAN DEFAULT FALSE,
    beleza BOOLEAN DEFAULT FALSE,
    PRIMARY KEY (id)
);

INSERT INTO produtos (nome, descricao, preco)
VALUES ('Paracetamol', 'Dor de cabeça, dores de dente, estados gripais', 29.90);
INSERT INTO produtos (nome, descricao, preco)
VALUES ('Dipirona Monoidratada', 'Febre alta, dores no corpo, cólicas e enxaquecas', 17.80);
INSERT INTO produtos (nome, descricao, preco)
VALUES ('Ibuprofeno', 'Dores musculares, inflamações na garganta, artrite leve e dores de dente', 45.90);
INSERT INTO produtos (nome, descricao, preco)
VALUES ('Loratadina', 'Alívio dos sintomas de alergias respiratórias', 27.99);

INSERT INTO produtos (nome, descricao, preco)
VALUES ('Whey Protein', 'Whey Protein da Integral Médica 900g', 129.90);
INSERT INTO produtos (nome, descricao, preco)
VALUES ('Creatina', 'Creatina monoidratada da Max titanium 300g', 78.80);
INSERT INTO produtos (nome, descricao, preco)
VALUES ('Multivitamínico', 'Manipulado com um conjunto de vitaminas e minerais da Dux', 37.90);
INSERT INTO produtos (nome, descricao, preco)
VALUES ('Barra de Proteína', 'Protein Crisp Bar Ovomaltine 1Unidade', 13.99);

INSERT INTO produtos (nome, descricao, preco)
VALUES ('Protetor Solar', 'Protetor Solar Nivea Sub', 43.90);
INSERT INTO produtos (nome, descricao, preco)
VALUES ('Sabonete Líquido', 'Granado Sabonete Líquido Bebê 500ml', 29.90);
INSERT INTO produtos (nome, descricao, preco)
VALUES ('Loção Hidratante', 'Loção Hidratante Nivea 400ml', 24.99);
INSERT INTO produtos (nome, descricao, preco)
VALUES ('Desodorante Spray', 'Desodorante Spray Antitranspirante Old Spice 150ml', 19.00);

CREATE USER 'php'@'localhost' IDENTIFIED BY 'senha123';
GRANT ALL PRIVILEGES ON loja.* TO 'php'@'localhost';
