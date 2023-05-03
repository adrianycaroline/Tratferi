<?php
include '../admin/acesso_com_pac.php';
 include '../connection/connect.php'; 

 $lista = $conn->query("SELECT * FROM consulta INNER JOIN funcionario ON (funcionario.id = consulta.id_func) where id_paci = ".$_SESSION['Id'].";"); //Seleciona todos os funcionarios que estejam ativos.
 $row = $lista->fetch_assoc();
 $rows = $lista->num_rows;

 if (isset($_POST['buscar_por_palavra'])) {
    // Conexão com o banco de dados
    $conn = mysqli_connect('localhost', 'usuario', 'senha', 'banco_de_dados');
    if (!$conn) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }
    
    // Recebe a palavra a ser pesquisada
    $palavra = $_POST['palavra'];
    
    // Executa a consulta SQL
    $sql = "SELECT * FROM tabela WHERE coluna LIKE '%$palavra%'";
    $result = mysqli_query($conn, $sql);
    
    // Exibe os resultados
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>" . $row['coluna'] . "</p>";
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }
}

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
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Consultas</title>
</head>
<body class="container" onload="atualizarHoras()">
    <?php include 'menu_paci.php';?>
    <div class="barra fixed-top bg-azul" style="margin-left: 280px;">
        <div class="text-light" style="display: flex; justify-content: end; margin-right: 20px;">
            <div style="margin: 10px;">
                <span><?php echo $diaDaSemana; ?> -&nbsp;</span>
                <span id="horas"></span>
            </div>
        </div>
    </div>
<br><br><br>
<div style="margin-top: 20px;"> <!-- Define a margem do topo do layout -->
    <h1>Consultas - <?php echo($_SESSION['nome']); ?></h1>
    <div class="border-bottom border-2 border-dark" style="width: 100%; "></div>
    <br>
    <div style="display: flex; justify-content: space-between;">
        <a href="gerar_consultas.php" target="_self" class="btn btn-block btn-xs" style="background-color: #38B6FF;" role="button">
            <ion-icon name="add-circle-outline"></ion-icon>
            <span class="hidden-xs">ADICIONAR</span>
        </a>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin-left: 10px;">
            <div style="display: flex;">
                <input type="text" name="palavra" id="palavra" class="form-control">
                <button type="submit" class="btn btn-block btn-xs" name="buscar_por_palavra" style="background-color: #38B6FF; font-size: 20px;">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </div>
        </form>
    </div>
</div>
    <br>
<div style="background-color: #DCDCDC; display: flex; margin-left: 200px; width: 90%; border-radius: 20px;">
    <table class="table table-borderless container w-50" style="margin-left: 50px; margin-top: 15px;">
        <thead>
            <tr style="background-color: #38B6FF;">
                <th scope="row" style="color: #fff;">Status</th>
                <th scope="col" style="color: #fff;">Data</th>
                <th scope="col" style="color: #fff;">Horario</th>
                <th scope="col" style="color: #fff;">Profissional </th>
                <th scope="col" style="color: #fff;">Ação</th>
            </tr>
        </thead>
        <tbody style="background-color: #fff;">
        <!-- Estrutura de Repetição -->
            <?php do {?>
            <tr >
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <button class="btn" style="background-color: #38B6FF;" role="button">
                        <span>Editar.</span>
                    </button>
                </td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td colspan="2"></td>
                <td></td>
                <td >
                    <button class="btn btn-danger" role="button">
                        <span>Excluir</span>
                    </button>
                </td>
            </tr>
            <?php }while($row = $lista->fetch_assoc())?> <!-- Fim da Estrutura de repetição -->
        </tbody>
    </table>
    <div>

    <table class="table table-borderless container w-50" style="margin-right: 70px; margin-top: 15px; border-radius: 20px;">
        <thead>
            <tr style="background-color: #38B6FF; font-weight: none;">
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th scope="row" style="color: #fff;">Descrição</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody style="background-color: #fff;">
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
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


</html>
