<?php
include '../admin/acesso_com_fun.php';
include '../connection/connect.php'; 
//caso venha algo do POST
    if(isset($_POST['atualizar'])){
    //pegar valor do GET
    $id = $_GET['upd'];
    //atribuindo valores a váriaveis
    $descricao = $_POST['descricao'];
    $pf_resp = $_POST['pf_resp'];
    $horario = $_POST['horario'];
    $data = $_POST['data'];
    $status = $_SESSION['status'];

    try{
    //consultando funcionario
    $consultaFunc = "SELECT id FROM funcionario where nome = '$pf_resp'";
    $resultadoFunc = $conn->query($consultaFunc);
    $row = mysqli_fetch_assoc($resultadoFunc);
    $idFunc = $row['id'];

    //atualizar consulta
    $consulta = "update consulta set data_consulta = '$data', horario_consulta = '$horario', descricao = '$descricao', status = '$status', id_func = '$idFunc' where id = '$id'";
    $resultado = $conn->query($consulta);
    echo "<script>window.open('../func/consultas.php?upd=s','_self')</script>"; 
    //caso de erro
    }catch(Exception $e){
    echo "<script>window.open('../func/consultas.php?upd=n','_self')</script>"; 
    }
}
//pegando valor do GET
if($_GET['id']){
    $id = $_GET['id'];
    //consultando valores da tabela consulta
    $consulta = "SELECT * FROM consulta where id = '$id'";
    $resultado = $conn->query($consulta);
    $row = mysqli_fetch_assoc($resultado);

    //consultando valores da tabela paciente
    $idPac = $row['id_paci'];
    $consultaPac = "SELECT * FROM paciente where id = '$idPac'";
    $resultadoPac = $conn->query($consultaPac);
    $rowPac = mysqli_fetch_assoc($resultadoPac);

    //consultando valores da tabela funcionario
    $idFunc = $row['id_func'];
    $consultaFunc = "SELECT * FROM funcionario where id = '$idFunc'";
    $resultadoFunc = $conn->query($consultaFunc);
    $rowFunc = mysqli_fetch_assoc($resultadoFunc);
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
    <title>Alterar Consulta</title>
</head>
<body class="fundo_areas">
    
<div class="barra fixed-top" style="background-color: #38B6FF;">
        <br><br>
 </div>
 <br><br>
<div class="container mt-4 d-flex justify-content-center">
        <div class="card" style="width: 50%;">
            <h1 class="card-header text-center" style="color: #38B6FF;">Alterar consulta</h1>
            <div class="card-body">
                <!-- Formulário de atualizar consulta -->
                <form class="container" style="display: flex; justify-content: flex-start; flex-direction: column;" action="../func/alterar_consulta.php?upd=<?php echo $id;?>" method="post" name="form_atualizar_consulta" enctype="multipart/form-data" onsubmit="return validaForm() && validaFormPeriodo()">
                    <div class="form-row" style="display: flex; justify-content: center; flex-direction: column;">
                        <div class="form-group">
                            <label for="nome">Nome do paciente</label>
                            <input type="text" name="nome" maxlength="50" class="form-control" id="nome" value="<?php echo $rowPac['nome']?>" readonly>
                        </div>
                        <br>
                    </div>
                    <div class="form-row" style="display: flex; justify-content: center; flex-direction: column;">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" maxlength="50" class="form-control" id="cpf" value="<?php echo $rowPac['cpf']?>" readonly>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="descricao">Descriçâo</label>
                            <input type="text" name="descricao" class="form-control" value="<?php echo $row['descricao']?>" required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="pf_resp">Profissional responsável</label>
                            <input type="text" name="pf_resp" class="form-control" id="pf_resp" value="<?php echo $rowFunc['nome']?>" required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="horario">Horário</label>
                            <input type="time" name="horario" class="form-control" id="horario" value="<?php echo $row['horario_consulta']?>" required>
                        </div>
                        <br>
                    </div>
                    <div class="form-group ">
                            <label for="data">Data</label>
                            <input type="date" name="data" class="form-control" id="data" value="<?php echo $row['data_consulta']?>" required>
                    </div>
                    <br>
                    <label class="text-center" style="color: #1d5f96;">Status da Consulta (campo obrigatório mesmo sem haver mudanças!):</label>
                    <br>
                    <div class="btn-group d-flex gap-2" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn" style="background-color: #ffa500;" data-toggle="modal" data-target="#modal_ativa">Ativa</button>
                        <button type="button" class="btn" style="background-color: #66CDAA; " data-toggle="modal" data-target="#modal_finalizada">Finalizada</button>
                        <button type="button" class="btn btn-danger" style="color: #000;" data-toggle="modal" data-target="#modal_nao">Não Realizada</button>
                    </div>
                    <br>
                    <button class="btn" style="background-color: #38B6FF;" name="atualizar" type="submit">Alterar consulta</button>
                </form>
            </div>
        </div>
    </div>
    <!-- --------------------- -->
        <?php include 'menu_cadastrar.php';?>
    <!-- modal_ativa -->
    <div class="modal fade" id="modal_ativa" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="modal_cadastro_titulo">Status da Consulta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                                </div>
                    <div class="modal-body">
                        <?php $_SESSION['status'] = 1;?>
                        <?php echo "Consulta Ativa selecionada!";?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                    </div>
                    </div>
    </div>
    <!-- modal_finalizada -->
    <div class="modal fade" id="modal_finalizada" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="modal_cadastro_titulo">Status da Consulta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                                </div>
                    <div class="modal-body">
                        <?php $_SESSION['status'] = 2;?>
                        <?php echo "Consulta Finalizada selecionada!";?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                    </div>
                    </div>
    </div>
    <!--modal_nao -->
    <div class="modal fade" id="modal_nao" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="modal_cadastro_titulo">Status da Consulta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                                </div>
                    <div class="modal-body">
                        <?php $_SESSION['status'] = 3;?>
                        <?php echo "Consulta Não Realizada selecionada!";?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                    </div>
                    </div>
                    </div>
    </div>
</body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Links para jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</html>