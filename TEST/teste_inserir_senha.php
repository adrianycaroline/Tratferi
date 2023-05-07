<?php 
    include '../admin/acesso_com_pac.php';
    include '../connection/connect.php';

    $senhaAtual = 1234;

        // criptografia da senha 
            $senhafinal = md5($senhaAtual);
        // Limita a senha a 12 caracteres
            $hash_md5_12 = substr($senhafinal, 0, 12);

        // Seleciona o cpf do usuário logado
            $selectCpf = $conn->query("SELECT cpf FROM paciente WHERE id = ".$_SESSION['Id'].";");
            $cpf = $selectCpf->fetch_assoc()['cpf'];
        // remove o ponto do cpf
            $cpf_semPonto = str_replace('.', '', $cpf);
        // pega só os 5 primeiros caracteres do cpf
            $cpf_cortado = substr($cpf_semPonto, 0, 5);
        // criptografa a os 5 primeiros caracteres do cpf
            $cpf_quase_final = md5($cpf_cortado);
        // limita o hash a 5 caracteres
            $cpf_final = substr($cpf_quase_final, 0, 5);
        // Cria uma criptografia da senha com 'PA' para indicar que é um paciente, o id do paciente,
        // o hash da senha, TRAT para indicar que é da tratferi e os 5 primeiros caracteres do cpf
            $senha_criptografada = 'PA' . $_SESSION['Id'] . $hash_md5_12 . 'TRAT-' . $cpf_final; 

        $updateSenha = "UPDATE login_paci SET senha = '".$senha_criptografada."' WHERE id_paci = ".$_SESSION['Id'].";";
            $confirmaUpdate = $conn->query($updateSenha);

            if($confirmaUpdate){
                echo 'feito';
            }else{
                echo 'falha';
            }