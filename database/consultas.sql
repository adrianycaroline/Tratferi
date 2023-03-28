-- ##################### login paciente ##################
SELECT cpf, adm, ativo, senha FROM funcionario
inner join login_func where cpf = $cpf and senha = $senha;

-- ######### informaçoes de paciente com consulta marcada ################


