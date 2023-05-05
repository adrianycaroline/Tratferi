<?php
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

    $listaC = $conn->query("SELECT COUNT(*) FROM consulta"); //Conta a quantidade de usuarios ativos.
    $listaT = $conn->query("SELECT COUNT(*) FROM tratamento"); //Conta a quantidade de pacientes ativos.

    $rowC = $listaC->fetch_row(); // Obtém o resultado da consulta
    $quantidadeC = $rowC[0]; // Atribui o resultado a uma variável

    $rowT = $listaT->fetch_row(); 
    $quantidadeT = $rowT[0]; 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <script src="../js/script.js"></script>
    <title>Área do Paciente - <?php echo($_SESSION['nome']); ?></title>
</head>
<body onload="atualizarHoras()">
<div>
    <main style="bottom: 0; margin-left: 280px;">
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
        <div>
            <figure style="display: flex; margin: 10px;">
                <img src="../images/logo_areas.png" alt="Logo Tratferi" width="45vw" height="45vw">
                <h1 style="color: #0CA6FF;">Área do Paciente - <?php echo($_SESSION['nome']); ?></h1>
            </figure>
            <div style="display: flex; justify-content: end;">
                <div class="border-bottom border-2 border-dark" style="width: 96%; margin-right: 30px;"></div>
            </div>
        </div>
        <div>
            <br>
            <div style="display: flex; flex-wrap: wrap; margin-left: 20px;">
                <div class="card card2 bg-azul2" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;"><?php echo $quantidadeC;?></p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light"><a href="../client/consultas.php" id="AdmOpcoesbtn">Consultas</a></h5>
                    
                    </div>
                </div>
                <div class="card card2 bg-azul2" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;"><?php echo $quantidadeT;?></p>
                    </div>    
                    <div class="card-body">
                        <h5 class="card-title text-light"><a href="tratamento.php" id="AdmOpcoesbtn">Tratamento</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script>
const imgBloqueado = document.getElementById('img-bloqueado');
const menuDropdown = document.getElementById('menu-dropdown');
const escondido2 = document.getElementById('escondido2');
let menuAberto = false;

imgBloqueado.addEventListener('click', function() {
    if (menuAberto) {
        menuDropdown.style.display = 'none';
        escondido2.style.marginLeft = '0px';
        menuAberto = false;
        window.location.reload();
    }else{
        menuDropdown.style.display = 'block';
        escondido2.style.marginLeft = '80px';
        menuAberto = true;
        window.addEventListener("resize", function(){
            if (window.innerWidth > 926) {
                window.location.reload();
            }
        });
    }
});
</script>
</html>