-- ##################### login funcionario ##################
SELECT cpf, adm, ativo, senha FROM funcionario
inner join login_func where cpf = $cpf and senha = $senha;

-- ################## login pacienete ####################
SELECT cpf, email, senha FROM paciente
inner join login_paci where cpf = $cpf and senha = $senha;

-- ######### informaçoes de paciente com consulta marcada ################



-- teste para login funcionario

insert into funcionario
VALUES('1','daniel','2004/10/07','145.326.268-23','102.658','596.987','90.156.984-8','enfermeiro','realizar triagens, preencher prontuários, oferecer os primeiros atendimentos, coletar exames, administrar medicamentos e monitorar o estado de saúde dos pacientes.','noite','3300,00','2020/02/01','null','func','user_sem_foto.png','TRAT0012343535','0');

insert into funcionario
VALUES('2','andrey','2000/03/10','359.742.031-98','032.987','158.387','88.032.603-7','auxiliar enfermagem','realiza a coleta de sangue para exames, faz curativos simples, administra remédios, ajuda na higiene dos pacientes, entre outras funções.','manha','2429,00','2020/02/01','null','adm','user_sem_foto.png','TRAT2328935','1');

insert into funcionario
VALUES('3','felipe','2001/11-03','031.084.871-32','951.311','014.741','03.156.741-9','enfermeiro','realizar triagens, preencher prontuários, oferecer os primeiros atendimentos, coletar exames, administrar medicamentos e monitorar o estado de saúde dos pacientes.','manha','3136.00','2020-01-09','0000-00-00','func','user_sem_foto.png','TRAT2328935','2');

select * from funcionario;


Insert into Login_func
Values('1','1234','1');

Insert into Login_func
Values('2','1234','2');

select * from Login_func;


-- deletar funcionarios
DELETE funcionario p, email_funcionario e, end_funcionario end, tel_funcionario t
FROM funcionario 
JOIN tel_funcionario ON (p.id = t.id_func)
JOIN e_funcionario ON (p.id = e.id_func)
JOIN end_funcionario ON (p.id = end.id_func);
WHERE p.id = $Id;


BEGIN;
DELETE FROM tel_func WHERE id_func = '10';
DELETE FROM email_func WHERE id_func = '10';
DELETE FROM end_func WHERE id_func = '10';
DELETE FROM login_func WHERE id_func = '10';
DELETE FROM funcionario WHERE id = '10';
COMMIT;

-- TRADUÇÃO DAS CHAVES HASH 
------------------------------------------------------------------------------------------------
-- lembre-se que esse é do PACIENTE NUMERO 1 (em outro não funciona)
PA161b4f324bb43TRAT-8849f = Andrey123
-- lembre-se que esse é do PACIENTE NUMERO 2 (em outro não funciona)
PA261b4f324bb43TRAT-d85ed = Andrey321

-- lembre-se que esse é do PACIENTE NUMERO 1 (em outro não funciona)
PA181dc9bdb52d0TRAT-8849f = 1234

-- lembre-se que esse é do FUNCIONARIO NUMERO 1 (em outro não funciona)
FU181dc9bdb52d0TRAT-6c0cb = 1234

-- lembre-se que esse é do FUNCIONARIO NUMERO 1 (em outro não funciona)
FU161b4f324bb43TRAT-6c0cb = Andrey321

-- lembre-se que esse é do FUNCIONARIO NUMERO 2 (em outro não funciona)
FU281dc9bdb52d0TRAT-55c41 = 1234