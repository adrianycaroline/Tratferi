create database tratferi;
use tratferi;

create table funcionario(
id int not null auto_increment,
nome varchar(50) not null,
data_nasc date not null,
cpf varchar(14) not null,
coren varchar(14) not null,
CRM varchar(9) not null,
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

create table email_paciente(
id int not null auto_increment,
email varchar(100) not null,
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

create table adm(
id int not null auto_increment primary key,
funcao text not null
);

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



