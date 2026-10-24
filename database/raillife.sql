CREATE  DATABASE raillife;
use raillife;

CREATE TABLE usuarios (
    
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome_usuarios VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  senha VARCHAR(100) NOT NULL,
  cpf VARCHAR(14) NOT NULL,
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
  status_sensor ENUM('ativo', 'desativado', 'em instalacao'),
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
  FOREIGN KEY (id_usuarios) REFERENCES usuarios(id),
  FOREIGN KEY (id_rotas) REFERENCES rotas(id)
);


CREATE TABLE relatorios (
    
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR(100) NOT NULL,
  descricao TEXT NOT NULL,
  data_criacao DATE NOT NULL,
  id_usuarios INT NOT NULL,
  FOREIGN KEY (id_usuarios) REFERENCES usuarios(id)
);

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `cpf`, `atuacao`, `endereco`, `cidade`, `cep`, `data_nascimento`) VALUES (NULL, 'admin', 'admin@gmail.com', 'admin1234', '14001484994', 'adm', 'Guia lopes', 'Joinville', '89940823', '2018-10-23');

INSERT INTO usuarios (nome,email, senha, cpf, atuacao, endereco, cidade, cep, data_nascimento) VALUES ('Renato', 'renato@teste.com', '123456','10412314212', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Caio', 'caio@teste.com', '123456','10412314212', 'comum', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('roberto', 'roberto@teste.com', '123456','10412314212', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14');
('Lucas Pereira', 'lucas.pereira4@teste.com', '123456', '10412314216', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Fernanda Lima', 'fernanda.lima5@teste.com', '123456', '10412314217', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Bruno Souza', 'bruno.souza6@teste.com', '123456', '10412314218', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Beatriz Costa', 'beatriz.costa7@teste.com', '123456', '10412314219', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Gabriel Rodrigues', 'gabriel.rodrigues8@teste.com', '123456', '10412314220', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Juliana Almeida', 'juliana.almeida9@teste.com', '123456', '10412314221', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Rafael Ferreira', 'rafael.ferreira10@teste.com', '123456', '10412314222', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Camila Alves', 'camila.alves11@teste.com', '123456', '10412314223', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Thiago Ribeiro', 'thiago.ribeiro12@teste.com', '123456', '10412314224', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Larissa Carvalho', 'larissa.carvalho13@teste.com', '123456', '10412314225', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Diego Gomes', 'diego.gomes14@teste.com', '123456', '10412314226', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Amanda Martins', 'amanda.martins15@teste.com', '123456', '10412314227', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Rodrigo Rocha', 'rodrigo.rocha16@teste.com', '123456', '10412314228', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Letícia Araujo', 'leticia.araujo17@teste.com', '123456', '10412314229', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Mateus Melo', 'mateus.melo18@teste.com', '123456', '10412314230', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Patricia Barbosa', 'patricia.barbosa19@teste.com', '123456', '10412314231', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Gustavo Ribeiro', 'gustavo.ribeiro20@teste.com', '123456', '10412314232', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Vanessa Cardoso', 'vanessa.cardoso21@teste.com', '123456', '10412314233', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Felipe Correia', 'felipe.correia22@teste.com', '123456', '10412314234', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Aline Teixeira', 'aline.teixeira23@teste.com', '123456', '10412314235', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Vinicius Dias', 'vinicius.dias24@teste.com', '123456', '10412314236', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Jessica Moreira', 'jessica.moreira25@teste.com', '123456', '10412314237', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Leonardo Nunes', 'leonardo.nunes26@teste.com', '123456', '10412314238', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Gabriela Vieira', 'gabriela.vieira27@teste.com', '123456', '10412314239', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Eduardo Machado', 'eduardo.machado28@teste.com', '123456', '10412314240', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Isabela Freitas', 'isabela.freitas29@teste.com', '123456', '10412314241', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Daniel Ramos', 'daniel.ramos30@teste.com', '123456', '10412314242', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Caroline Luiz', 'caroline.luiz31@teste.com', '123456', '10412314243', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Marcelo Castro', 'marcelo.castro32@teste.com', '123456', '10412314244', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Fernanda Pinto', 'fernanda.pinto33@teste.com', '123456', '10412314245', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Renato Monteiro', 'renato.monteiro34@teste.com', '123456', '10412314246', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Tatiane Silva', 'tatiane.silva35@teste.com', '123456', '10412314247', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Andre Santos', 'andre.santos36@teste.com', '123456', '10412314248', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Priscila Oliveira', 'priscila.oliveira37@teste.com', '123456', '10412314249', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Igor Lima', 'igor.lima38@teste.com', '123456', '10412314250', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Natalia Ferreira', 'natalia.ferreira39@teste.com', '123456', '10412314251', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14'),
('Caio Souza', 'caio.souza40@teste.com', '123456', '10412314252', 'adm', 'Rua Santo antonio', 'Joinville', '87216090', '2026-10-14');