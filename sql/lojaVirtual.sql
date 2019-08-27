CREATE DATABASE IF NOT EXISTS `loja_virtual`;
USE `loja_virtual`;

CREATE TABLE `tb_usuario` (
	`id` INT AUTO_INCREMENT,
    `nome` VARCHAR(100) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `senha` VARCHAR(12) NOT NULL,
    PRIMARY KEY tb_usuario_id_pk (`id`)
);

ALTER TABLE `tb_usuario`
	MODIFY `senha` VARCHAR(32) NOT NULL;

INSERT INTO `tb_usuario` (`nome`, `email`, `senha`)
	VALUES ('Administrador','amd@senac.com.br', md5('123'));
    
DESC `tb_usuario`;

select * from tb_usuario;

CREATE TABLE tb_upload(
id int auto_increment, 
nome varchar(100)not null,
PRIMARY KEY tb_upload_id_pk (`id`)
);

select * from tb_upload;

create table tb_frase_motivadora(
id int auto_increment,
frase varchar(200)NOT NULL,
primary key tb_frase_motivadora_id_pk(id)

);








insert into tb_frase_motivadora(frase) values ('O unico lugar onde o sucesso vem antes do trabalho e no dicionario'),('Que ninguem se engane, so se consegue a simplicidade atraves de muito trabalho'),('O trabalho poupa-nos de tres grandes males: tedio, vicio e necessidade'),('Nenhum trabalho de qualidade pode ser feito sem concentracao e auto-sacrificio, esforco e duvida'),('O prazer no trabalho aperfeicoa a obra');

select * from tb_frase_motivadora;


DROP TABLE tb_frase_motivadora;




