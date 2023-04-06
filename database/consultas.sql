-- ##################### login funcionario ##################
SELECT cpf, adm, ativo, senha FROM funcionario
inner join login_func where cpf = $cpf and senha = $senha;

-- ################## login pacienete ####################
SELECT cpf, email, senha FROM paciente
inner join login_paci where cpf = $cpf and senha = $senha;

-- ######### informaçoes de paciente com consulta marcada ################



-- teste para login funcionario

insert into funcionario
VALUES('1','daniel','2004/10/07','145.326.268-23','102.658','596.987','90.156.984-8','enfermeiro','realizar triagens, preencher prontuários, oferecer os primeiros atendimentos, coletar exames, administrar medicamentos e monitorar o estado de saúde dos pacientes.','noite','3300,00','2020/02/01','null','func','0');

insert into funcionario
VALUES('2','andrey','2000/03/10','359.742.031-98','032.987','158.387','88.032.603-7','auxiliar enfermagem','realiza a coleta de sangue para exames, faz curativos simples, administra remédios, ajuda na higiene dos pacientes, entre outras funções.','manha','2429,00','2020/02/01','null','adm','1');

select * from funcionario;


Insert into Login_func
Values('1','1234','1');

Insert into Login_func
Values('2','1234','2');

select * from Login_func;
