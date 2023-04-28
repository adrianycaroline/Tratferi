<?php 
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php';

    date_default_timezone_set('America/Sao_Paulo'); // define o fuso horário para São Paulo
    $diaDaSemana = date('l'); // obtém o dia da semana
    switch($diaDaSemana) {
        case 'Monday':
            $diaDaSemana = 'Segunda-feira';
            break;
        case 'Tuesday':
            $diaDaSemana = 'Terça-feira';
            break;
        case 'Wednesday':
            $diaDaSemana = 'Quarta-feira';
            break;
        case 'Thursday':
            $diaDaSemana = 'Quinta-feira';
            break;
        case 'Friday':
            $diaDaSemana = 'Sexta-feira';
            break;
        case 'Saturday':
            $diaDaSemana = 'Sábado';
            break;
        case 'Sunday':
            $diaDaSemana = 'Domingo';
            break;
    }

    $lista = $conn->query("select id, nome, data_nasc, cpf, card_SUS, hash from paciente;");
    $row = $lista->fetch_assoc();
    $numRow = mysqli_num_rows($lista);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <title>Área do Funcionário</title>
</head>
<body onload="atualizarHoras()" class="fundo_adm">
    <?php 
        include '../func/menu_fun.php';
    ?>
   <main style="bottom: 0;">
        <div class=""> 
            <figure id="img-bloqueado" style="position:absolute; cursor: pointer;">
                <img src="../images/menu-svgrepo-com.svg" style="margin-left: 5px;" width="40vw" alt="" srcset="">
            </figure>
            <div class="text-light" style="display: flex; justify-content: end; margin-right: 20px;">
                <div style="margin: 10px;">
                    <span><?php echo $diaDaSemana; ?> -&nbsp;</span>
                    <span id="horas"></span>
                </div>
            </div>
        </div>
    </main>
    <!-- Lista de pacientes -->
    <div style="margin-left: 285px;">
        <?php if(isset($_GET['cadastro']) && ($_GET['cadastro'] == 's')){?>
            <br><h2 class="text-success">Paciente Cadastrado Com Sucesso!</h2>
        <?php }?>

        <?php if(isset($_GET['pac'])){

            try{
            $id = $_GET['pac'];   
            $excluir = $conn->query("delete from paciente where id = $id");;?>
            <br><h2 class="text-success">Paciente Excluido Com Sucesso!</h2>
            <?php // realizando a consulta navamente 
             $lista = $conn->query("select id, nome, data_nasc, cpf, card_SUS, hash from paciente;");
             $row = $lista->fetch_assoc();
             $numRow = mysqli_num_rows($lista);?> 

        <?php }catch(Exception){?>
            <br><h2 class="text-danger">O Paciente Não Poderá Ser Excluido Contendo Dados Pessoais Associados A Ele!</h2>
            <?php // realizando a consulta navamente 
             $lista = $conn->query("select id, nome, data_nasc, cpf, card_SUS, hash from paciente;");
             $row = $lista->fetch_assoc();
             $numRow = mysqli_num_rows($lista);?> 
            <?php }?>
        <?php }?>
        <div class="barra fixed-top bg-azul">
            <br> <br>
        </div>
        <figure style="display: flex; margin: 10px;">
            <img src="../images/logo_areas.png" alt="Logo Tratferi" width="45vw" height="45vw">
            <h1 style="color: #38B6FF;">Área do Funcionário - <?php echo($_SESSION['nome']); ?></h1>
        </figure>
        <div style="display: flex; justify-content: end;">
            <div class="border-bottom border-2 border-dark" style="width: 96%; margin-right: 30px;"></div>
        </div>
    </div>
    <br>
    <h1 class="card-header text-center" style="color: #1d5f96; margin-left: 230px;">Lista de Pacientes ativos</h1>
    <div style="display: flex; justify-content: end;">
            <div class="border-bottom border-2 " style="width: 30%; margin-right: 550px;"></div>
        </div>
            <section class="container">
                <table class="table table-hover table-condensed tb-opacidade" style="margin-bottom: 320px; margin-left: 220px;"> 
                    <thead>
                        <th class="hidden">ID</th>
                        <th style="color: #1d5f96;">Nome</th>
                        <th style="color: #1d5f96;">Data de Nascimento</th>
                        <th style="color: #1d5f96;">CPF</th>
                        <th style="color: #1d5f96;">Cartão do SUS</th>
                        <th class="hidden">HashCode</th>
                        <th class="d-flex">
                            <a href="../func/cadastrar_paciente.php" target="_self" class="btn btn-block btn-xs" style="background-color: #38B6FF;" role="button">
                                <ion-icon name="add-circle-outline"></ion-icon>
                                <span class="hidden-xs">ADICIONAR</span>
                            </a>
                        </th>
                    </thead>
            
            <tbody> <!-- início corpo da tabela -->
            <!-- início estrutura repetição -->
            <?php if($lista){
                do{ ?>
                    <tr>
                        <td class="hidden">
                            <?php echo $row['id'];?>
                        </td>
                        <td>
                            <?php echo $row['nome'];?>
                        </td>
                        <td>
                            <?php echo $row['data_nasc'];?>    
                        </td>
                        <td> 
                            <?php echo $row['cpf']?> 
                        </td>
                        <td> 
                            <?php echo $row['card_SUS']?> 
                        </td>
                        <td class="hidden">
                            <?php echo $row['hash'];?>
                        </td>
                        <td>
                            <!-- botão alterar -->
                            <a href="atualizar_paciente.php?id=<?php echo $row['id']; ?>" role="button" class="btn btn-block btn-xs" style="background-color: #66CDAA;"> 
                                <ion-icon name="refresh-outline"></ion-icon>
                                <span class="hidden-xs">ALTERAR</span>
                            </a>
                        </td>
                    </tr>
                        <?php }while($row = $lista->fetch_assoc()); ?>
                        <?php }else{ ?>
                            <tr>Não há pacientes cadastrados</tr>
                            <?php }?>
                        </tbody><!-- final corpo da tabela -->
                    </table>
                </section>
                <style>
                    .logo-container {
    display: flex;
    margin: 10px;
}

                </style>
                 <!-- Modal atualiza paciente -->
        <div class="modal fade" id="modal_atualiza" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-title" id="modal_cadastro_titulo" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                                    <img c src="../images/logo_areas.png" width="100vw" alt="">
                                    <h5>Atualização de Paciente</h5>
                                <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                                </button>
                                </div>
                    <div class="modal-body">
                            <p class="text-center">O paciente foi atualizado com sucesso!</p>        
                        <div style="display: flex; justify-content: end;">
                            <button  type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal não atualiza paciente-->
        <div class="modal fade" id="modal_atualiza_erro" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-title" id="modal_cadastro_titulo" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                                    <img c src="../images/logo_areas.png" width="100vw" alt="">
                                    <h5>Atualização de Paciente</h5>
                                <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                                </button>
                                </div>
                    <div class="modal-body">
                            <p class="text-center">Erro ao atualizar o paciente!</p>        
                        <div style="display: flex; justify-content: end;">
                            <button  type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal de Cadastro-->
        <div class="modal fade" id="modal_cadastro" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-title" id="modal_cadastro_titulo" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                                    <img c src="../images/logo_areas.png" width="100vw" alt="">
                                    <h5>Cadastrar Paciente</h5>
                                <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                                </button>
                                </div>
                    <div class="modal-body">
                            <p class="text-center">Paciente cadastrado com sucesso!</p>        
                        <div style="display: flex; justify-content: end;">
                            <button  type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Código que busca o modal caso venha algo por GET  -->
                <?php if(isset($_GET) && ($_GET['upd'] == "s")){?>
                    <script>
                        $(document).ready(function() {
                            $('#modal_atualiza').modal('show');
                        });
                    </script>
                <?php }?>
                <?php if(isset($_GET) && ($_GET['upd'] == "n")){?>
                    <script>
                        $(document).ready(function() {
                            $('#modal_atualiza_erro').modal('show');
                        });
                    </script>
                <?php }?>  
                <?php if(isset($_GET) && ($_GET['cad'] == "s")){?>
                    <script>
                        $(document).ready(function() {
                            $('#modal_cadastro').modal('show');
                        });
                    </script>
                <?php }?>  
            </body>
            </html>