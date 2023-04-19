<?php 
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php';

    if($_POST){
        $nome = $_POST['nome'];
        $data = $_POST['data'];
        $cpf = $_POST['cpf'];
        $coren = $_POST['coren'];
        $crm = $_POST['crm'];
        $rg = $_POST['rg'];
        $cargo = $_POST['cargo'];
        $funcao = $_POST['funcao'];
        $periodo = $_POST['periodo'];
        $salario = $_POST['salario'];
        $adm = $_POST['adm'];
        $hashcode = "TRAT-";

        $insereFunc = "INSERT INTO funcionario 
        (nome, data_nasc, cpf, coren, crm, rg, cargo, funcao, periodo, salario, adm, imagem, hash)
        VALUES ('$nome','$data','$cpf','$coren','$crm','$rg','$cargo','$funcao','$periodo','$salario','$adm','user_sem_foto.png','$hashcode')";

        $resultado = $conn->query($insereFunc);
        if(mysqli_insert_id($conn)){
            header('location: ../admin/index.php');
        } 
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/cadastro.css">
    <title>Cadastrar Funcionário</title>
</head>
<body class="fundo_areas">
    <div class="container mt-4 d-flex justify-content-center">
        <div class="card" style="width: 50%;">
            <h1 class="card-header text-center">Cadastro de Funcionário</h1>
            <div class="card-body">
                <!-- Formulário de Cadastro de Funcionário -->
                <form class="container" style="display: flex; justify-content: center; flex-direction: column;" action="cadastrar_funcionario.php" method="post" name="form_funcionario_cadastro" enctype="multipart/form-data">
                    <div class="form-row" style="display: flex; justify-content: center; flex-direction: column;">
                        <div class="form-group">
                            <label for="nome">Nome Completo</label>
                            <input type="text" name="nome" maxlength="50" class="form-control" id="nome" placeholder="Digite o nome completo do funcionário" >
                        </div>
                        <br>
                        <div class="form-group ">
                            <label for="data_nasc">Data de Nascimento</label>
                            <input type="date" name="data" class="form-control" id="data_nasc" >
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control" id="cpf" placeholder="Digite o CPF do funcionário" onkeypress="$(this).mask('000.000.000-00');">
                        </div>
                        <br>
                        <div class="form-group ">
                            <label for="coren">COREN</label>
                            <input type="text" name="coren" class="form-control" id="coren" placeholder="Digite o COREN do funcionário">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="crm">CRM</label>
                            <input type="text" name="crm" class="form-control" id="crm" placeholder="Digite o CRM do funcionário">
                        </div>
                        <br>
                        <div class="form-group ">
                            <label for="rg">RG</label>
                            <input type="text" name="rg" class="form-control" id="rg" placeholder="Digite o RG do funcionário" onkeypress="$(this).mask('00.000.000-0');">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cargo">Cargo</label>
                            <select class="form-control" name="cargo" id="cargo">
                                <option selected>-- Selecione o cargo --</option>
                                <option>Enfermeiro</option>
                                <option>Estagiario</option>
                                <option>Medico</option>
                                <option>Atendente</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group ">
                            <label for="funcao">Função</label>
                            <textarea class="form-control" name="funcao" id="funcao" rows="3" maxlength="100"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="periodo">Período</label>
                            <select id="periodo" name="periodo" class="form-control">
                                <option selected>-- Selecione o período --</option>
                                <option>Manha</option>
                                <option>Tarde</option>
                                <option>Noite</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="salario">Salário</label>
                            <input type="number" name="salario" class="form-control" id="salario" placeholder="Digite o Salário do Funcionario">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="func">
                                <input value="func" type="radio" name="adm" id="adm"> Funcionario
                            </label>
                            <label for="adm">
                                <input value="adm" type="radio" name="adm" id="adm"> Administrador
                            </label>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
<!-- link para bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min-js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).on('ready',function(){
        $(".regular").slick({
            dots: true,
            infinity: true,
            slidesToShow: 3,
            slidesToScroll: 3
        });
    });
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick/slick.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</html>