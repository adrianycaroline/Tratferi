-- ##################### login funcionario ##################
SELECT cpf, adm, ativo, senha FROM funcionario
inner join login_func where cpf = $cpf and senha = $senha;

-- ################## login pacienete ####################
SELECT cpf, email, senha FROM paciente
inner join login_paci where cpf = $cpf and senha = $senha;

-- ######### informaçoes de paciente com consulta marcada ################



-- teste para login 

insert into funcionario
VALUES('4','daniel','1998/06/05','257.987.099-97','000','000','98.795.521-7','m','responsavel pela manutençao e bom funcionamento do sistema','noite','10001.00','2017/01/09','2017/01/10',1,1);
