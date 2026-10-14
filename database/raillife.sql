CREATE  DATABASE raillife;
use raillife;

CREATE TABLE usuarios (
    
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  senha VARCHAR(100) NOT NULL,
  cpf VARCHAR(11) NOT NULL,
  atuacao ENUM('adm', 'comum') NULL DEFAULT ('comum'),
  endereco VARCHAR(100) NOT NULL,
  cidade VARCHAR(100) NOT NULL,
  cep VARCHAR(8) NOT NULL,
  data_nascimento DATE NOT NULL
);
CREATE TABLE rotas(

  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome_rotas VARCHAR(100) NOT NULL,
  origem VARCHAR(100) NOT NULL,
  destino VARCHAR(100) NOT NULL,
  distancia INT NOT NULL,
  tempo TIME NOT NULL
);


CREATE TABLE sensores(
    
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  tipo VARCHAR(100) NOT NULL,
  data_instalacao DATE NOT NULL,
  status_sensor ENUM('ativo', 'desativado', 'em instalação'),
  id_rotas INT NOT NULL,
  FOREIGN KEY(id_rotas) REFERENCES rotas(id)
);

CREATE TABLE trens (
    
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome_trens VARCHAR(100) NOT NULL,
  modelo VARCHAR(100) NOT NULL,
  capacidade INT NOT NULL,
  ano_fabricacao DATE NOT NULL,
  id_rotas INT NOT NULL,
  id_usuarios INT NOT NULL,
  FOREIGN KEY (id_rotas) REFERENCES rotas(id),
  FOREIGN KEY (id_usuarios) REFERENCES usuarios(id)
);


CREATE TABLE relatorios (
    
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR(100) NOT NULL,
  descricao TEXT NOT NULL,
  data_criacao DATE NOT NULL,
  id_usuarios INT NOT NULL,
  FOREIGN KEY (id_usuarios) REFERENCES usuarios(id)
);


INSERT INTO usuarios (nome,email, senha, cpf, atuacao, endereco, cidade, cep, data_nascimento) VALUES ('Renato', 'renato@teste.com', '123456','10412314212', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Caio', 'caio@teste.com', '123456','10412314212', 'comum', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('roberto', 'roberto@teste.com', '123456','10412314212', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Lucas Pedroso', 'lucas.pedroso4@teste.com', '123456', '10412314216', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Fernando Lima', 'fernando.lima5@teste.com', '123456', '10412314217', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Maria Souza', 'maria.souza6@teste.com', '123456', '10412314218', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Gustavo Costa', 'gustavo.costa7@teste.com', '123456', '10412314219', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Gabriel Rodrigues', 'gabriel.rodrigues8@teste.com', '123456', '10412314220', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Juliana Almeida', 'juliana.almeida9@teste.com', '123456', '10412314221', 'comum', 'Rua Santo antonio', 'Rio do sul', '87216090', '2026-10-14'),
('Rafael Ferreira', 'rafael.ferreira10@teste.com', '123456', '10412314222', 'comum', 'Rua Santo antonio', 'Rio do sul', '87216090', '2026-10-14'),
('Camila Alves', 'camila.alves11@teste.com', '123456', '10412314223', 'comum', 'Rua Santo antonio', 'Rio do sul', '87216090', '2026-10-14'),
('Amanda Ribeiro', 'thiago.ribeiro12@teste.com', '123456', '10412314224', 'comum', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Larissa Carvalho', 'larissa.carvalho13@teste.com', '123456', '10412314225', 'comum', 'Rua Santo antonio', 'Curitiba', '87216090', '2026-10-14'),
('Daniel Gomes', 'diego.gomes14@teste.com', '123456', '10412314226', 'comum', 'Rua Santo antonio', 'São Paulo', '87216090', '2026-10-14'),
('Amanda Martins', 'amanda.martins15@teste.com', '123456', '10412314227', 'adm', 'Rua Santo antonio', 'São Paulo', '87216090', '2026-10-14'),
('Rodrigo Rocha', 'rodrigo.rocha16@teste.com', '123456', '10412314228', 'adm', 'Rua Santo antonio', 'São Paulo', '87216090', '2026-10-14'),
('Letícia Fransisca', 'leticia.francisca17@teste.com', '123456', '10412314229', 'comum', 'Rua Santo antonio', 'São Paulo', '87216090', '2026-10-14'),
('Mateus Melo', 'mateus.melo18@teste.com', '123456', '10412314230', 'comum', 'Rua Santo antonio', 'São Paulo', '87216090', '2026-10-14'),
('Patricia Barbosa', 'patricia.barbosa19@teste.com', '123456', '10412314231', 'comum', 'Rua Santo antonio', 'Curitiba', '87216090', '2026-10-14'),
('Gustavo Ribeiro', 'gustavo.ribeiro20@teste.com', '123456', '10412314232', 'comum', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Vitor Cardoso', 'vitor.cardoso21@teste.com', '123456', '10412314233', 'comum', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Matheus Correia', 'matheus.correia22@teste.com', '123456', '10412314234', 'comu', 'Rua Santo antonio', 'Rio de janeiro', '87216090', '2026-10-14'),
('Aline Teixeira', 'aline.teixeira23@teste.com', '123456', '10412314235', 'comum', 'Rua Santo antonio', 'Rio de janeiro', '87216090', '2026-10-14'),
('Vinicius Dias', 'vinicius.dias24@teste.com', '123456', '10412314236', 'comum', 'Rua Santo antonio', 'Rio de janeiro', '87216090', '2026-10-14'),
('João Moreira', 'joão.moreira25@teste.com', '123456', '10412314237', 'comum', 'Rua Santo antonio', 'Rio de janeiro', '87216090', '2026-10-14'),
('Leo Nunes', 'leo.nunes26@teste.com', '123456', '10412314238', 'comum', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Gabriela Vieira', 'gabriela.vieira27@teste.com', '123456', '10412314239', 'comum', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Eduardo Machado', 'eduardo.machado28@teste.com', '123456', '10412314240', 'comum', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Isabela Freitas', 'isabela.freitas29@teste.com', '123456', '10412314241', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Daniel Ramos', 'daniel.ramos30@teste.com', '123456', '10412314242', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Caroline Luiz', 'caroline.luiz31@teste.com', '123456', '10412314243', 'adm', 'Rua Santo antonio', 'Paraná', '87216090', '2026-10-14'),
('Marcelo Castro', 'marcelo.castro32@teste.com', '123456', '10412314244', 'adm', 'Rua Santo antonio', 'Paraná', '87216090', '2026-10-14'),
('Fernanda Pinto', 'fernanda.pinto33@teste.com', '123456', '10412314245', 'adm', 'Rua Santo antonio', 'Paraná', '87216090', '2026-10-14'),
('Renato Monteiro', 'renato.monteiro34@teste.com', '123456', '10412314246', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Tatiane Silva', 'tatiane.silva35@teste.com', '123456', '10412314247', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Andre Santos', 'andre.santos36@teste.com', '123456', '10412314248', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Priscila Oliveira', 'priscila.oliveira37@teste.com', '123456', '10412314249', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Iago Lima', 'iago.lima38@teste.com', '123456', '10412314250', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Natiele Ferreira', 'natiele.ferreira39@teste.com', '123456', '10412314251', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Caio José', 'caio.jose40@teste.com', '123456', '10412314252', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Roberto Carlos', 'roberto.carlos40@teste.com', '123456', '10412314252', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Pedro Carvalho', 'pedro.carvalho40@teste.com', '123456', '10412314252', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14');

INSERT INTO rotas VALUES(NULL, 'E-5', 'Joinville', 'Curitiba', '02:30:00'),
(NULL, 'E-7', 'Joinville', 'Criciuma', '03:30:00'),
(NULL, 'E-4', 'Joinville', 'São Januario', '02:30:00');