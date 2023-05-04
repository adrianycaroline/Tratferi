<?php
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php';
    
 if($_POST){
        
        // iniciar o cadastro
        $nome = $_POST['nome'];
        $data_nasc = $_POST['data_nasc'];
        // $now_format = $data->format('Y-m-d');
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $rg = $_POST['rg'];
        $card_SUS = $_POST['card_SUS'];
        $hashcode = "TRAT-".uniqid()."-".mb_strimwidth($cpf,0,3);
        $cpf_sem_ponto = str_replace('.', '', $cpf); // remove os pontos do CPF
        $cpf_tratado = substr($cpf_sem_ponto, 0, 5); // extrai os primeiros cinco dígitos do CPF sem ponto

        if($card_SUS == ""){
        //inserir paciente
        $loginRes = $conn->query("insert into paciente (nome, data_nasc, cpf, rg, card_SUS, imagem, hash) values('$nome', '$data_nasc', '$cpf', '$rg', '$card_SUS', 'user_sem_foto.png', '$hashcode')");
        
        //inserir email do paciente
        $id_pac = mysqli_insert_id($conn);
        $insereEmail = "INSERT INTO email_paciente (id, email, id_paci) VALUES('', '$email', '$id_pac')";
        $conexao = $conn;
        $resultadoEmail = $conexao->query($insereEmail);
        
        //enviar senha por email
        include '../envia_cadastro.php';
        echo "<script>window.open('pacientes_lista.php?cad=s','_self')</script>"; 
        }

        elseif($card_SUS != ""){
        //inserir paciente
        $loginRes = $conn->query("insert into paciente (nome, data_nasc, cpf, rg, card_SUS, imagem, hash) values('$nome', '$data_nasc', '$cpf', '$rg', '$card_SUS', 'null', '$hashcode')");
        
        //inserir email do paciente
        $id_pac = mysqli_insert_id($conn);
        $insereEmail = "INSERT INTO email_paciente (id, email, id_paci) VALUES('', '$email', '$id_pac')";
        $conexao = $conn;
        $resultadoEmail = $conexao->query($insereEmail);

        //enviar senha por emailo
        include '../envia_cadastro.php';
        echo "<script>window.open('pacientes_lista.php?cad=s','_self')</script>"; 
        }

    if(mysqli_insert_id($conn)){
        $id = mysqli_insert_id($conn);
        $selectHash = "SELECT id FROM paciente where cpf = '$cpf'";
        $resultado2 = $conn->query($selectHash);
        $row = mysqli_fetch_assoc($resultado2);
        $paciente_id = $row['id'];

        $cpf_sem_ponto = str_replace('.', '', $cpf); // remove os pontos do CPF
        $cpf_tratado = substr($cpf_sem_ponto, 0, 5); // extrai os primeiros cinco dígitos do CPF sem ponto
        $insereSenha = "INSERT INTO login_paci VALUES ('', '$cpf_tratado', '$paciente_id')";
        $resultado3 = $conn->query($insereSenha);
        
        header('location: ../func/pacientes_lista.php?cad=s');
    } 
}      
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="200;URL= ../index.php">
    <link rel="stylesheet" href='../CSS/estilo.css'>
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <title>Cadastro</title>
</head>
<body class="fundo_areas">
<div class="barra fixed-top" style="background-color: #38B6FF;">
        <br> <br>
 </div>
 <br><br>
<div class="container mt-4 d-flex justify-content-center">
        <div class="card" style="width: 50%;">
            <h1 class="card-header text-center" style="color: #38B6FF;">Cadastro de Paciente</h1>
            <div class="card-body">
                <!-- Formulário de Cadastro de Funcionário -->
                <form class="container" style="display: flex; justify-content: flex-start; flex-direction: column;" action="../func/cadastrar_paciente.php" method="post" name="form_funcionario_cadastro" enctype="multipart/form-data" onsubmit="return validaForm() && validaFormPeriodo()">
                    <div class="form-row" style="display: flex; justify-content: center; flex-direction: column;">
                        <div class="form-group">
                            <label for="nome">Nome Completo</label>
                            <input type="text" name="nome" maxlength="50" class="form-control" id="nome" placeholder="Digite o nome do paciente completo " required>
                        </div>
                        <br>
                        <div class="form-group ">
                            <label for="data_nasc">Data de Nascimento</label>
                            <input type="date" name="data_nasc" class="form-control" id="data_nasc" min="1940-01-01" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" required>
                        </div>
                    </div>
                    <br>
                        <div class="form-group">
                            <label for="nome">Email</label>
                            <input type="email" name="email" maxlength="50" class="form-control" id="email" placeholder="Digite o email do paciente completo " required>
                        </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control" id="cpf" placeholder="Digite o CPF do paciente" onkeypress="$(this).mask('000.000.000-00');" required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="rg">RG</label>
                            <input type="text" name="rg" class="form-control" id="rg" placeholder="Digite o RG do paciente" onkeypress="$(this).mask('00.000.000-0');" required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="card_SUS">Cartão do SUS</label>
                            <input type="text" name="card_SUS" class="form-control" id="card_SUS" placeholder="Digite o cartão do SUS do paciente" onkeypress="$(this).mask('000.0000.0000-00');">
                        </div>
                        <br>
                    </div>
                    <br>
                    <button class="btn" type="submit" style="background-color: #38B6FF;">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- --------------------- -->
        <?php include 'menu_cadastrar.php';?>
</body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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
    <script>
        function mostrarSenha2() {
            var senha2 = document.getElementById("senha2");
            if (senha2.type === "password") {
            senha2.type = "text";
            } else {
            senha2.type = "password";
            }
        }
    </script>
</html>