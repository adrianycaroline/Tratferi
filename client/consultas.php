<?php
    include '../admin/acesso_com_pac.php';
    include '../connection/connect.php'; 

    $lista = $conn->query("SELECT * FROM consulta LEFT JOIN funcionario ON (consulta.id_func = funcionario.id) where id_paci = ".$_SESSION['Id'].";"); //Seleciona todos os funcionarios que estejam ativos.
    $row = $lista->fetch_assoc();
    $rows = $lista->num_rows;


// traduz o Dia da semana
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
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Consultas</title>
</head>
<body class="container" onload="atualizarHoras()">
    <?php include 'menu_paci.php';?>
    <div class="barra fixed-top bg-azul" style="margin-left: 280px;">
        <div class="text-light" style="display: flex; justify-content: end;">
            <div style="margin: 10px;">
                <span><?php echo $diaDaSemana; ?> -&nbsp;</span>
                <span id="horas"></span>
            </div>
        </div>
    </div>
<br><br><br>
<div style="margin-top: 20px; margin-left: 280px;"> <!-- Define a margem do topo do layout -->
    <h1>Consultas - <?php echo($_SESSION['nome']); ?></h1>
    <div class="border-bottom border-2 border-dark" style="width: 100%; "></div> <!-- linha divisória -->
    <br>
</div>
    <br>
    <table class="table table-hover table-condensed tb-opacidades TBconsulta" style="margin-left: 280px;">
        <thead style="background-color: #008DDF; color: white;">
            <th hidden>ID</th>
            <th scope="row">Status</th>
            <th scope="col">Data</th>
            <th scope="col">Horario</th>
            <th scope="col">Hashcode</th>
            <th scope="col">Descrição</th>
            <th scope="col">Profissional </th>
        </thead>
        <tbody>
            <!-- Estrutura de Repetição -->
            <?php do {?>
                <tr>
                    <td hidden><?php echo $row['id'];?></td>
                    <td><?php echo isset($row['status']) ? $row['status'] : '';?></td>
                    <td><?php echo isset($row['data_consulta']) ? $row['data_consulta'] : '';?></td>
                    <td><?php echo isset($row['horario_consulta']) ? $row['horario_consulta'] : '';?></td>
                    <td><?php echo isset($row['hash']) ? $row['hash'] : '';?></td>
                    <td><?php echo isset($row['descricao']) ? $row['descricao'] : '';?></td>
                    <td><?php echo isset($row['nome']) ? $row['nome'] : '';?></td> <!-- Nome do profissional -->
                </tr>
            <?php }while($row = $lista->fetch_assoc())?> <!-- Fim da Estrutura de repetição -->
        </tbody>
    </table>
    <!-- Texto dos direitos reservados -->
    <div class="text-center" id="direitos">
        <p><img src="../images/logo_areas.png" width="20vw" alt="Logo do Tratferi" > TRATFERI - TODOS OS DIREITOS RESERVADOS.</p>
    </div>
</body>
<!-- Links para a Biblioteca de icones do Ionic Icons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- link para bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
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
