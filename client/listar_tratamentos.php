<?php 
    include '../admin/acesso_com_pac.php';
    include '../connection/connect.php';    

    $lista = $conn->query("SELECT * FROM tratamento LEFT JOIN ferida on tratamento.id_ferida = ferida.id where tratamento.id_paci = ".$_SESSION['Id'].";");
    $row = $lista->fetch_assoc();
    $rows = $lista->num_rows;

    
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

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <!-- Links do data Table -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <title>Document</title>
</head>
<body onload="atualizarHoras()" class="fundo_adm">
    <?php include 'menu_paci.php'; ?>
    <div class="bg-azul"> 
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
    <div style="margin-left: 280px;">

        <table class="table table-hover table-condensed tb-opacidade" id="tabela_tratamento">
            <thead>
        <tr>
            <th hidden>ID</th>
            <th style="color: #1d5f96;">Nome</th>
            <th style="color: #1d5f96;">Nivel</th>
            <th style="color: #1d5f96;">CPF</th>
            <th style="color: #1d5f96;">Cargo</th>
            <th style="color: #1d5f96;">Salario</th>
            <th style="color: #1d5f96;">Periodo</th>
            <th>Hashcode</th>
            <th class="d-flex">
                <a href="../admin/cadastrar_funcionario.php" target="_self" class="btn btn-block btn-xs" style="background-color: #38B6FF;" role="button">
                    <ion-icon name="add-circle-outline"></ion-icon>
                    <span class="hidden-xs">ADICIONAR</span>
                </a>
            </th>
        </tr>
    </thead>
    <tbody>
        <!-- Estrutura de Repetição -->
        <?php do {?>
            <tr>
                <td hidden><?php echo $row['id'];?></td>
                <td><?php echo $row['nome'];?></td>
                <td><?php echo $row['adm'];?></td>
                <td><?php echo $row['cpf'];?></td>
                <td><?php echo $row['cargo'];?></td>
                <td><?php echo $row['salario'];?></td>
                <td><?php echo $row['periodo'];?></td>
                <td><?php echo $row['hash'];?></td>
                <td>
                <!-- Condição que verifica se o usuário logado é o mesmo que o que for clicado para alterar -->
                <?php if ($_SESSION['Id'] != $row['id']){ ?>
                    <a href="atualizar_funcionario.php?id=<?php echo $row['id']; ?>" role="button" class="btn btn-block btn-xs" style="background-color: #66CDAA;"> 
                       <ion-icon name="refresh-outline"></ion-icon>
                        <span class="hidden-xs">ALTERAR</span>
                    </a>
                <?php }else{ ?>  
                    <a data-toggle="modal" data-target="#modal_user_igual" role="button" class="btn btn-block btn-xs" style="background-color: #66CDAA;"> 
                        <ion-icon name="refresh-outline"></ion-icon>
                        <span class="hidden-xs">ALTERAR</span>
                    </a>  
              <?php } ?>
                </td>
            </tr>
        <?php }while($row = $lista->fetch_assoc())?> <!-- Fim da Estrutura de repetição -->
     </tbody>
     <tfoot>
            <tr>
                        <th hidden>ID</th>
                        <th>Nome</th>
                        <th>Nivel</th>
                        <th>CPF</th>
                        <th>Cargo</th>
                        <th>Salario</th>
                        <th>Periodo</th>
                        <th>Hashcode</th>
                    </tr>
                </tfoot>
            </table>
    </div>
</body>
<script>
    // Script para buscar o que for pesquisado (ele também já coloca o input de pesquisa e etc...)
    $('#tabela_tratamento').DataTable({
        "language":  {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"
        }
    });
</script>
<!-- Links para a Biblioteca de icones do Ionic Icons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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
<script type="text/javascript">
    $('.delete').on('click',function(){
        var nome = $(this).data('nome'); //busca o nome com a descrição (data-nome)
        var id = $(this).data('id'); // busca o id (data-id)
        //console.log(id + ' - ' + nome); //exibe no console
        $('span.nome').text(nome); // insere o nome do item na confirmação
        $('a.delete-yes').attr('href','usuario_excluir.php?id='+id); //chama o arquivo php para excluir o produto
        $('#modalEdit').modal('show'); // chamar o modal
    });
</script>
<!-- Links para jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</html>