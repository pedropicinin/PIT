create database sem_desculpas;
use sem_desculpas;

create table aluno (
id_aluno int primary key not null auto_increment, 
nome varchar (45) not null, 
cpf int (11) not null,
telefone varchar (45) not null, 
email varchar (45) not null, 
senha int (6) not null, 
curso_desejado varchar (45) not null, 
instituicao_desejada varchar (45) not null, 
materias_estudar varchar (45) not null, 
materias_dificuldade varchar (45) not null, 
horas_estudadas int not null, 
notificacoes  boolean not null
);

create table professor (
id_professor int primary key not null auto_increment,
  nome VARCHAR(45) NOT NULL,
  email VARCHAR(45) NOT NULL,
  senha INT(6) NOT NULL,
  cpf INT(11) NOT NULL,
  telefone VARCHAR(45) NOT NULL,
  materia_lecionar VARCHAR(45) NOT NULL
);

select * from professor;














