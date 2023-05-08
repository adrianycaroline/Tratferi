<?php
include '../admin/acesso_com_fun.php';
include '../connection/connect.php'; 

if($_POST){
    //atribuindo valores a váriaveis
    $nome_paci = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $descricao = $_POST['comentario_contato'];
    $pf_resp = $_POST['pf_resp'];
    $horario = $_POST['horario'];
    $data = $_POST['data'];
    $prioridade = $_SESSION['button'];
    $hashcode = "TRAT-".uniqid()."-".mb_strimwidth($cpf,0,3);

    try{
    //consultando paciente
    $consultaPac = "SELECT id FROM paciente where nome = '$nome_paci' and cpf = '$cpf'";
    $resultadoPac = $conn->query($consultaPac);
    $row = mysqli_fetch_assoc($resultadoPac);
    $idPac = $row['id'];

    //consultando funcionario
    $consultaFunc = "SELECT id FROM funcionario where nome = '$pf_resp'";
    $resultadoFunc = $conn->query($consultaFunc);
    $row = mysqli_fetch_assoc($resultadoFunc);
    $idFunc = $row['id'];

    //inserir consulta
    $consulta = "INSERT INTO consulta (id, data_consulta, horario_consulta, descricao, status, hash, id_paci, id_func) VALUES('', '$data', '$horario', '$descricao', '1', '$hashcode', '$idPac', '$idFunc')";
    $resultado = $conn->query($consulta);
    if(mysqli_insert_id($conn)){
    echo "<script>window.open('../func/consultas.php?cons=s','_self')</script>"; 
    }
    //caso de erro
    }catch(Exception $e){
    echo "<script>window.open('../func/gerar_consultas.php?cons=n','_self')</script>"; 
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
    <title>Agendar Consultas</title>
</head>
<body class="fundo_areas">
<div class="barra fixed-top" style="background-color: #38B6FF;">
        <br><br>
 </div>
 <br><br>
<div class="container mt-4 d-flex justify-content-center">
        <div class="card" style="width: 50%;">
            <h1 class="card-header text-center" style="color: #38B6FF;">Gerar nova consulta</h1>
            <div class="card-body">
                <!-- Formulário de Cadastro de Funcionário -->
                <form class="container" style="display: flex; justify-content: flex-start; flex-direction: column;" action="../func/gerar_consultas.php" method="post" name="form_funcionario_cadastro" enctype="multipart/form-data" onsubmit="return validaForm() && validaFormPeriodo()">
                    <div class="form-row" style="display: flex; justify-content: center; flex-direction: column;">
                        <div class="form-group">
                            <label for="nome">Nome do paciente</label>
                            <input type="text" name="nome" maxlength="50" class="form-control" id="nome" placeholder="Digite o nome do paciente completo " required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row" style="display: flex; justify-content: center; flex-direction: column;">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" maxlength="50" class="form-control" id="cpf" placeholder="Digite o cpf do paciente" onkeypress="$(this).mask('000.000.000-00');"  required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="descricao">Descriçâo</label>
                            <textarea type="text" name="comentario_contato" cols="30" rows="5" aria-describedby="basic-addon1" class="form-control" required></textarea>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="pf_resp">Profissional responsável</label>
                            <input type="text" name="pf_resp" class="form-control" id="pf_resp" required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="horario">Horário</label>
                            <input type="time" name="horario" class="form-control" id="horario" required>
                        </div>
                        <br>
                    </div>
                    <div class="form-group ">
                            <label for="data">Data</label>
                            <input type="date" name="data" class="form-control" id="data" required>
                    </div>
                    <br>
                    <button class="btn" type="submit" style="background-color: #38B6FF;">Agendar consulta</button>
                </form>
            </div>
        </div>
    </div>
    <!-- --------------------- -->
        <?php include 'menu_cadastrar.php';?>
    <!-- Modal de erro ao realizar consulta -->
    <div class="modal fade" id="modal_erro" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-title" id="modal_cadastro_titulo" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                                    <img c src="../images/logo_areas.png" width="100vw" alt="">
                                    <h5>Consulta</h5>
                                <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                                </button>
                                </div>
                    <div class="modal-body">
                            <p class="text-center">Não foi possível realizar a consulta! Tente novamente</p>        
                        <div style="display: flex; justify-content: end;">
                            <button  type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- Código que busca o modal caso venha algo por GET  -->
                <?php if(isset($_GET['cons']) && ($_GET['cons'] == "n")){?>
                    <script>
                        $(document).ready(function() {
                            $('#modal_erro').modal('show');
                        });
                    </script>
                <?php }?>
</body>
    <!-- Links para jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<!-- Links para a Biblioteca de Icones do Ionic Icons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>