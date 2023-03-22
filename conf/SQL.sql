CREATE SCHEMA DESENVOLVIMENTOIII;
CREATE TABLE contato (
	id int unique auto_increment,
    nome varchar(95),
    sobrenome varchar(95),
    email varchar(100),
    nascimento date,
    telefone varchar(95),
    cidade int,
    observacao varchar(255),
    vivo tinyint,
    PRIMARY KEY (id),
    FOREIGN KEY (cidade) REFERENCES cidade(id) ON UPDATE CASCADE
);

CREATE TABLE cidade (
	id int auto_increment,
    nome varchar(95),
    uf varchar(95),
    PRIMARY KEY (id)
);

CREATE TABLE esporte (
	id int auto_increment,
    nome varchar(45),
    modalidade varchar(200),
    PRIMARY KEY (id)
);

CREATE TABLE contato_hobbie(
	id int auto_increment,
	idContato int,
    idEsporte int,
    tempo datetime,
    FOREIGN KEY (idContato) REFERENCES contato(id) ON UPDATE CASCADE,
    FOREIGN KEY (idEsporte) REFERENCES esporte(id) ON UPDATE CASCADE,
    PRIMARY KEY (id)
);

INSERT INTO cidade (nome, uf) VALUES ('Rio do Sul', 'SC');
INSERT INTO cidade (nome, uf) VALUES ('Laurentino', 'SC');
INSERT INTO cidade (nome, uf) VALUES ('Rio do Oeste', 'SC');

INSERT INTO esporte (nome, modalidade) VALUES ('Estudar', 'Sozinho');
INSERT INTO esporte (nome, modalidade) VALUES ('Academia', 'Sozinho');
INSERT INTO esporte (nome, modalidade) VALUES ('Cozinhar', 'Sozinho');

INSERT INTO contato (nome, sobrenome, email, nascimento, telefone, cidade, observacao, vivo) VALUES ('Maria', 'Suzana', 'maria@gmail.com', '2023-03-14', '8932323', 1, 'Loira', 1);
INSERT INTO contato (nome, sobrenome, email, nascimento, telefone, cidade, observacao, vivo) VALUES ('Jorge', 'Sucupira', 'jorge@gmail.com', '2023-03-11', '8932323', 3, 'Jornalista', 1);

INSERT INTO contato_hobbie (idContato, idEsporte, tempo) VALUES (1, 2, '2023-03-20 13:03:00');
INSERT INTO contato_hobbie (idContato, idEsporte, tempo) VALUES (2, 1, '2023-09-12 13:03:00');