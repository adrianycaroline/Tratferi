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
    <h1 class="card-header text-center" style="color: #1d5f96;">Cadastro de Funcionário</h1>
    <div style="display: flex; justify-content: end;">
            <div class="border-bottom border-2 " style="width: 26%; margin-right: 705px;"></div>
        </div>
            <section class="container">
                <table class="table table-hover table-condensed tb-opacidade" style="margin-bottom: 320px;"> 
                    <thead>
                        <th class="hidden">ID</th>
                        <th style="color: #1d5f96;">Nome</th>
                        <th style="color: #1d5f96;">Data de Nascimento</th>
                        <th style="color: #1d5f96;">CPF</th>
                        <th style="color: #1d5f96;">Cartão do SUS</th>
                <th class="hidden">HashCode</th>
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
                            <!-- botão de exclusão  -->
                            <a href="../func/pacientes_lista.php?pac=<?php echo $row['id'];?>" class="btn btn-sm btn-block btn-danger">
                                <ion-icon name="trash"></ion-icon>EXCLUIR
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
            </body>
            </html>