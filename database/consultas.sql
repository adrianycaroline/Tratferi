-- ##################### login funcionario ##################
SELECT cpf, adm, ativo, senha FROM funcionario
inner join login_func where cpf = $cpf and senha = $senha;

-- ################## login pacienete ####################
SELECT cpf, email, senha FROM paciente
inner join login_paci where cpf = $cpf and senha = $senha;

-- ######### informaçoes de paciente com consulta marcada ################


