<?php
include '../admin/acesso_com_fun.php';
include '../connection/connect.php'; 
//informações da consulta
$lista = $conn->query("select * from consulta where status = 'Ativa'");
$row = $lista->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <title>Consultas</title>
</head>
<body class="fundo_adm">
   <?php include 'menu_fun.php' ?>
<div class="barra fixed-top bg-azul">
    <br> <br>
</div>
<br><br><br>
<h1 style="margin-left: 750px; color: #1d5f96;">Consultas</h1>

    <div style="display: flex;">
        <div class="border-bottom border-2 border-dark" style="width: 83%; margin-left: 300px;"></div>
    </div>
    <br>
<a href="gerar_consultas.php" target="_self" class="btn btn-block btn-xs" style="background-color: #38B6FF; margin-left: 300px;" role="button">
    <ion-icon name="add-circle-outline"></ion-icon>
    <span class="hidden-xs">ADICIONAR NOVA CONSULTA</span>
</a>
<br><br><br>
<div style="background-color: #DCDCDC; display: flex;  width: 75%; margin-left: 300px; border-radius: 20px;">
    <table class="table table-hover table-borderless container w-100" style=" margin-top: 15px;">
        <thead>
            <tr style="background-color: #38B6FF;" class="text-center">
                <th scope="row" style="color: #fff;">Status</th>
                <th scope="col" style="color: #fff;">Data</th>
                <th scope="col" style="color: #fff;">Horario</th>
                <th scope="col" style="color: #fff;">Profissional</th>
                <th scope="col" style="color: #fff;">Paciente</th>
                <th class="hidden" scope="col" style="color: #fff;">CPF</th>
                <th scope="col" style="color: #fff;">Descrição</th>
                <th scope="col" style="color: #fff;">Ação</th>
            </tr>
        </thead>
        <tbody style="background-color: #fff;">
        <?php if($lista){
            do { 
                //informações do funcionário
                $idFunc = $row['id_func'];
                $listaFunc = $conn->query("select * from funcionario where id ='$idFunc'");
                $rowFunc = $listaFunc->fetch_assoc();
                
                //informações do paciente
                $idPac = $row['id_paci'];
                $listaFunc = $conn->query("select * from paciente where id ='$idPac'");
                $rowPac = $listaFunc->fetch_assoc();
            ?>
            <tr class="text-center">
                <th scope="row"><?php echo $row['status'];?></th>
                <td><?php echo $row['data_consulta'];?></td>
                <td><?php echo $row['horario_consulta'];?></td>
                <td><?php echo $rowFunc['nome'];?></td>
                <td><?php echo $rowPac['nome'];?></td>
                <td><?php echo $rowPac['cpf'];?></td>
                <td><?php echo $row['descricao'];?></td>
                <td>
                <!-- botão alterar -->
                    <a href="alterar_consulta.php?id=<?php echo $row['id'];?>" role="button" class="btn btn-block btn-xs" style="background-color: #66CDAA;"> 
                        <ion-icon name="refresh-outline"></ion-icon>
                        <span class="hidden-xs">ALTERAR</span>
                    </a>
                </td>
            </tr>
            <?php }while($row = $lista->fetch_assoc());?>
            <?php }?>
        </tbody>
    </table>
    <div>
</div>
</div>
<br>
<!-- Modal de consulta adicionada -->
<div class="modal fade" id="modal_consulta" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
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
                            <p class="text-center">Consulta adicionada com sucesso!</p>        
                        <div style="display: flex; justify-content: end;">
                            <button  type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Modal de consulta atualizada -->
<div class="modal fade" id="modal_upd" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-title" id="modal_cadastro_titulo" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                                    <img c src="../images/logo_areas.png" width="100vw" alt="">
                                <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                                </button>
                                </div>
                    <div class="modal-body">
                            <p class="text-center">Consulta Atualizada com sucesso!</p>        
                        <div style="display: flex; justify-content: end;">
                            <button  type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Modal de consulta não atualizada -->
<div class="modal fade" id="modal_erro" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-title" id="modal_cadastro_titulo" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                                    <img c src="../images/logo_areas.png" width="100vw" alt="">
                                <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                                </button>
                                </div>
                    <div class="modal-body">
                            <p class="text-center">Não foi possível atualizar a consulta! Tente novamente</p>        
                        <div style="display: flex; justify-content: end;">
                            <button  type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Código que busca o modal caso venha algo por GET  -->
<?php if(isset($_GET['cons']) && ($_GET['cons'] == "s")){?>
                    <script>
                        $(document).ready(function() {
                            $('#modal_consulta').modal('show');
                        });
                    </script>
<?php }?>
<?php if(isset($_GET['upd']) && ($_GET['upd'] == "s")){?>
                    <script>
                        $(document).ready(function() {
                            $('#modal_upd').modal('show');
                        });
                    </script>
<?php }?>
<?php if(isset($_GET['upd']) && ($_GET['upd'] == "n")){?>
                    <script>
                        $(document).ready(function() {
                            $('#modal_erro').modal('show');
                        });
                    </script>
<?php }?>
</body>
</html>
