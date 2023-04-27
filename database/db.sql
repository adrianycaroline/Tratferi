create database tratferi;
use tratferi;

create table funcionario(
id int not null auto_increment,
nome varchar(50) not null,
data_nasc date not null,
cpf varchar(14) not null,
coren varchar(14) null,
CRM varchar(9) null,
rg varchar(12) not null,
cargo varchar(15) not null,
funcao text not null,
periodo varchar(20) not null,
salario float(7,2) not null,
data_entrada date not null,
data_saida date null,
adm enum('func','adm') not null,
imagem varchar(50) null,
hash varchar(20) not null,
ativo BIT NOT NULL,
primary key(id));


create table tel_func(
id int not null auto_increment,
telefone varchar(14) not null,
id_func int not null,
primary key(id),
foreign key(id_func) references funcionario(id));

create table email_func(
id int not null auto_increment,
email varchar(100) not null,
id_func int not null,
primary key(id),
foreign key(id_func) references funcionario(id));


create table end_func(
id int not null auto_increment,
logradouro varchar(70) not null,
numero int(6) not null,
cidade  varchar(50) not null,
uf varchar(2) not null,
cep varchar(14) not null,
id_func int not null,
primary key(id),
foreign key(id_func) references funcionario(id));

create table paciente(
id int not null auto_increment,
nome varchar(50) not null,
data_nasc date not null,
cpf varchar(14) not null,
rg varchar(12) not null,
card_SUS varchar(16) null,
imagem varchar(50) null,
hash varchar(20) not null,
primary key (id));


create table tel_paciente(
id int not null auto_increment,
telefone varchar(14) not null,
id_paci int not null,
primary key(id),
foreign key(id_paci) references paciente (id));

create table email_paciente(
id int not null auto_increment,
email varchar(100) not null,
id_paci int not null,
primary key(id),
foreign key(id_paci) references paciente (id));


create table end_paciente(
id int not null auto_increment,
logradouro varchar(70) not null,
numero int(6) not null,
cidade  varchar(50) not null,
uf varchar(2) not null,
cep varchar(9) not null,
id_paci int not null,
primary key(id),
foreign key(id_paci) references paciente (id));





create table consulta(
id int not null auto_increment,
data_consulta date not null,
horario_consulta datetime not null,
descricao text not null,
hash varchar(20) not null,
id_paci int not null,
id_func int not null,
primary key(id),
foreign key (id_paci) references paciente(id),
foreign key (id_func) references funcionario(id));



create table ferida(
id int not null auto_increment,
forma_adquirida text not null,
tempo_ferida date not null,
uso_medicacao text not null,
regiao text not null,
membro varchar(15) not null,
exsudato text not null,
odor text not null,
lateralidade varchar(25) not null,
medidas varchar(25) not null,
id_paci int not null,
id_func int not null,
primary key(id),
foreign key (id_paci) references paciente(id),
foreign key (id_func) references funcionario(id));



create table convenio(
id int not null auto_increment,
nome_convenio varchar(30) not null,
tipo_convenio varchar(20) not null,
cpf varchar(14) not null,
carteira_convenio varchar(25) not null,
id_paci int not null,
primary key(id),
foreign key (id_paci) references paciente(id));



create table tratamento(
id int not null auto_increment,
anotacao_func text not null,
acompanhamento text not null,
medicamento_usado varchar(50) not null,
finalizacao varchar(50) not null,
id_func int not null,
id_paci int not null,
primary key(id),
foreign key(id_func) references funcionario(id),
foreign key(id_paci) references paciente(id));


create table estoque_med(
id int not null auto_increment,
nome_medicamento text not null,
bula text not null,
quantidade varchar(3) not null,
primary key(id));


create table medicamento(
id int not null auto_increment,
receita text not null,
remedio varchar(25) not null,
qntd_remedio text not null,
data_retirada date not null,
id_est int not null,
id_func int not null,
id_paci int not null,
primary key(id),
foreign key(id_est) references estoque_med (id),
foreign key(id_func) references funcionario(id),
foreign key(id_paci) references paciente(id));



create table Epis(
id int not null auto_increment,
qntda_item int not null,
id_est int not null,
id_func int not null,
primary key (id),
foreign key(id_est)references estoque_med(id),
foreign key(id_func)references funcionario(id));



create table Login_paci(
id int not null auto_increment,
senha varchar(25) not null,
id_paci int null,
primary key(id),
foreign key(id_paci)references paciente(id));

create table Login_func(
id int not null auto_increment primary key,
senha varchar(25) not null,
id_func int not null,
foreign key(id_func)references funcionario(id)
);

create table estagio(
id int not null auto_increment primary key,
area enum('ti','med','enf','rep') not null,
id_func int not null,
id_login int not null,
foreign key (id_login) references Login_func(id),
foreign key (id_func) references funcionario(id));



CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `perfil` AS
    SELECT 
        `f`.`id` AS `id`,
        `f`.`nome` AS `nome`,
        `f`.`data_nasc` AS `data_nasc`,
        `f`.`cpf` AS `cpf`,
        `f`.`coren` AS `coren`,
        `f`.`CRM` AS `CRM`,
        `f`.`rg` AS `rg`,
        `f`.`cargo` AS `cargo`,
        `f`.`funcao` AS `funcao`,
        `f`.`periodo` AS `periodo`,
        `f`.`salario` AS `salario`,
        `f`.`data_entrada` AS `data_entrada`,
        `f`.`data_saida` AS `data_saida`,
        `f`.`adm` AS `adm`,
        `f`.`imagem` AS `imagem`,
        `f`.`hash` AS `hash`,
        `f`.`ativo` AS `ativo`,
        `t`.`telefone` AS `telefone`,
        `e`.`email` AS `email`,
        `end`.`logradouro` AS `logradouro`,
        `end`.`numero` AS `numero`,
        `end`.`cidade` AS `cidade`,
        `end`.`uf` AS `uf`,
        `end`.`cep` AS `cep`
    FROM
        (((`funcionario` `f`
        LEFT JOIN `tel_func` `t` ON (`f`.`id` = `t`.`id`))
        LEFT JOIN `email_func` `e` ON (`f`.`id` = `e`.`id`))
        LEFT JOIN `end_func` `end` ON (`f`.`id` = `end`.`id`));



CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `perfil_paci` AS
    SELECT 
        `p`.`id` AS `id`,
        `p`.`nome` AS `nome`,
        `p`.`data_nasc` AS `data_nasc`,
        `p`.`cpf` AS `cpf`,
        `p`.`rg` AS `rg`,
        `p`.`card_SUS` AS `card_SUS`,
        `p`.`imagem` AS `imagem`,
        `p`.`hash` AS `hash`,
        `t`.`telefone` AS `telefone`,
        `e`.`email` AS `email`,
        `end`.`logradouro` AS `logradouro`,
        `end`.`numero` AS `numero`,
        `end`.`cidade` AS `cidade`,
        `end`.`uf` AS `uf`,
        `end`.`cep` AS `cep`
    FROM
        `paciente` `p`
        LEFT JOIN `tel_paciente` `t` ON (`p`.`id` = `t`.`id`)
        LEFT JOIN `email_paciente` `e` ON (`p`.`id` = `e`.`id`)
        LEFT JOIN `end_paciente` `end` ON (`p`.`id` = `end`.`id`);




desc funcionario;

desc tel_func;

desc end_func;

desc email_func;

desc paciente;

desc tel_paciente;

desc end_paciente;

desc email_paciente;

desc ferida;

desc consulta;

desc estoque_med;

desc convenio;

desc tratamento;

desc medicamento;

desc adm;

desc Login_func;

desc Login_paci;



