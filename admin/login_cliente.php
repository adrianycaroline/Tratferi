<?php
 include '../connection/connect.php';
       // iniciar a verificação do login
       if($_POST){
         $cpf_enviado = $_POST['cpf'];
         $senha_enviada = $_POST['password'];

        // criptografa a senha no modelo hash md5 criado
        // criptografia da senha 
        $senhafinal = md5($senha_enviada);
        // Limita a senha a 12 caracteres
            $hash_md5_12 = substr($senhafinal, 0, 12);

        // Seleciona o cpf do usuário logado
            $selectCpf = $conn->query("SELECT cpf, id FROM paciente WHERE cpf = '".$cpf_enviado."';");
            $dadosPaciente = $selectCpf->fetch_assoc();
            $selectCp_cpf = $dadosPaciente['cpf'];
            $selectCpfId = $dadosPaciente['id'];
        // remove o ponto do cpf
            $cpf_semPonto = str_replace('.', '', $selectCp_cpf);
        // pega só os 5 primeiros caracteres do cpf
            $cpf_cortado = substr($cpf_semPonto, 0, 5);
        // criptografa a os 5 primeiros caracteres do cpf
            $cpf_quase_final = md5($cpf_cortado);
        // limita o hash a 5 caracteres
            $cpf_final = substr($cpf_quase_final, 0, 5);
        // Cria uma criptografia da senha com 'PA' para indicar que é um paciente, o id do paciente,
        // o hash da senha, TRAT para indicar que é da tratferi e os 5 primeiros caracteres do cpf
            $senha_criptografada = 'PA' . $selectCpfId . $hash_md5_12 . 'TRAT-' . $cpf_final;  


         $loginRes = $conn->query("SELECT paciente.id as id, paciente.cpf as cpf, paciente.nome  as nome, paciente.imagem as imagem, Login_paci.senha as senha   FROM Login_paci
         inner join paciente ON(Login_paci.id_paci = paciente.id) where cpf = '$cpf_enviado' and senha = '$senha_criptografada'");
        $rowLogin = $loginRes->fetch_assoc();
        $numRow = mysqli_num_rows($loginRes);
        // se a sessão existir ou não
        if ($numRow>0){
            session_start();
            $_SESSION['login'] = "tratferi";
            $_SESSION['nome'] = $rowLogin['nome'];
            $_SESSION['Id'] = $rowLogin['id'];
            $_SESSION['Imagem'] = $rowLogin['imagem'];
            if($rowLogin['cpf'] == $cpf_enviado){
                 
                 echo "<script>window.open('../client/index.php','_self')</script>";
            }
        }else {
            echo "<script>window.open('../admin/login_cliente.php?acesso=n','_self')</script>"; 
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30;URL= ../index.php">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href='../CSS/estilo.css'>
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    
    <title>Login</title>
</head>
<body>
    <section id="fundo_cli" style="display: flex; flex-direction: column;">
        <?php include '../logo_superior.php';
        if(isset($_GET['acesso']) && ($_GET['acesso'] == "n")){?>
             <br><h2 style="color:aliceblue">Acesso Negado! Tente Novamente</h2>
         <?php }?>
        <div class="formbox">
            <div class="form-value">
                <form action="login_cliente.php" method="post"><br>
                    <h2>Login Paciente</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="cpf" onkeypress="$(this).mask('000.000.000-00');" required>
                        <label for="">CPF</label>
                    </div>
                    <div class="inputbox show-password">
                        <input type="password" name="password" id="senha" required>
                        <label for="">Senha</label>
                        <ion-icon name="eye-outline" type="button" style="cursor: pointer;" onclick="mostrarSenha()"></ion-icon>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Lembrar senha <a href="recuperacao.php">Esqueci minha senha :</a></label>
                    </div>
                    <button id="loginBtn">Entrar</button>
                    <div class="register">
                        <!-- Button trigger modal -->
                        <p role="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_cadastro">
                            Não tem uma conta?
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modal_cadastro" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="modal_cadastro_titulo">CADASTRO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                                </div>
                    <div class="modal-body">
                    Para ter acesso aos recursos destinados aos nossos pacientes é necessario um cadastro prévio feito por um agente de nossa equipe.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                    </div>
                    </div>
                    </div>
        </div>
        <?php include '../termos_texto.php';?>
    </section>
</body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        function mostrarSenha() {
            var senha = document.getElementById("senha");
            if (senha.type === "password") {
            senha.type = "text";
            } else {
            senha.type = "password";
            }
        }
    </script>
</html>