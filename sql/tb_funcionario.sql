create table tb_funcionario (
	id_funcionario int auto_increment,
    id_departamento int not null,
    id_cargo int not null,
    nome varchar(30) not null,
    sobrenome varchar(30) not null,
    dt_nascimento date not null,
    cpf varchar(11),
    primary key(id_funcionario),
    foreign key tb_funcionario_departamento_fk (id_departamento) references tb_departamento(id_departamento),
    foreign key tb_funcionario_cargo_fk (id_cargo) references tb_cargo(id_cargo)
);

select * from tb_funcionario;

SELECT 
    funcionario.id_funcionario,
    funcionario.nome AS nomeFuncionario,
    funcionario.sobrenome,
    funcionario.dt_nascimento,
    funcionario.cpf,
    departamento.nome AS nomeDepartamento,
    cargo.nome nomeCargo
FROM
    tb_funcionario funcionario
        INNER JOIN
    tb_departamento departamento ON funcionario.id_departamento = departamento.id_departamento
        INNER JOIN
    tb_cargo cargo ON funcionario.id_Cargo = cargo.id_cargo;

