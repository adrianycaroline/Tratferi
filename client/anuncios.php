<?php 
    include '../admin/acesso_com_pac.php';
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
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Área do Paciente - <?php echo($_SESSION['nome']); ?></title>
</head>
<body onload="atualizarHoras()" class="fundo_adm">
<?php include 'menu_paci.php'?>
<div style="margin-left: 280px;">
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
    <div class="container" style="display: flex; flex-wrap: wrap;">
        <h1 class="mt-5 mb-4">Anúncios</h1>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Anúncio+1" alt="Anúncio 1">
                    <div class="card-body">
                        <h5 class="card-title">Anúncio 1</h5>
                        <p class="card-text">Descrição do anúncio 1.</p>
                        <a href="#" class="btn btn-primary">Mais detalhes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Anúncio+2" alt="Anúncio 2">
                    <div class="card-body">
                        <h5 class="card-title">Anúncio 2</h5>
                        <p class="card-text">Descrição do anúncio 2.</p>
                        <a href="#" class="btn btn-primary">Mais detalhes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Anúncio+3" alt="Anúncio 3">
                    <div class="card-body">
                        <h5 class="card-title">Anúncio 3</h5>
                        <p class="card-text">Descrição do anúncio 3.</p>
                        <a href="#" class="btn btn-primary">Mais detalhes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>