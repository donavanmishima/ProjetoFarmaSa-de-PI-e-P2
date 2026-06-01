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

INSERT INTO produtos (nome, descricao, preco, remedio)
VALUES 
('Paracetamol', 'Dor de cabeça, dores de dente, estados gripais', 29.90, true),
('Dipirona Monoidratada', 'Febre alta, dores no corpo, cólicas e enxaquecas', 17.80, true),
('Ibuprofeno', 'Dores musculares, inflamações na garganta, artrite leve e dores de dente', 45.90, true),
('Loratadina', 'Alívio dos sintomas de alergias respiratórias', 27.99, true);

INSERT INTO produtos (nome, descricao, preco, suplemento)
VALUES 
('Whey Protein', 'Whey Protein da Integral Médica 900g', 129.90, true),
('Creatina', 'Creatina monoidratada da Max titanium 300g', 78.80, true),
('Multivitamínico', 'Manipulado com um conjunto de vitaminas e minerais da Dux', 37.90, true),
('Barra de Proteína', 'Protein Crisp Bar Ovomaltine 1Unidade', 13.99, true);

INSERT INTO produtos (nome, descricao, preco, beleza)
VALUES 
('Protetor Solar', 'Protetor Solar Nivea Sub', 43.90, true),
('Sabonete Líquido', 'Granado Sabonete Líquido Bebê 500ml', 29.90, true),
('Loção Hidratante', 'Loção Hidratante Nivea 400ml', 24.99, true),
('Desodorante Spray', 'Desodorante Spray Antitranspirante Old Spice 150ml', 19.00, true);

CREATE USER IF NOT EXISTS 'php'@'localhost' IDENTIFIED BY 'senha123';
GRANT ALL PRIVILEGES ON farmadados.* TO 'php'@'localhost';
