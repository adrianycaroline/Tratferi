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
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Funcionário</title>
</head>
<body>
<div>
    <main style="margin-left: 280px; bottom: 0;">
        <div class="bg-azul"> 
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
                <h1 style="color: #0CA6FF;">Área do Funcionário - <?php echo($_SESSION['nome']); ?></h1>
            </figure>
            <div style="display: flex; justify-content: end;">
                <div class="border-bottom border-2 border-dark" style="width: 96%; margin-right: 30px;"></div>
            </div>
        </div>
        <div>
            <br>
            <div style="display: flex; flex-wrap: wrap; margin-left: 20px;">
                <div class="card bg-azul2" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">3</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light">Médicos Ativos</h5>
                    
                    </div>
                </div>
                <div class="card bg-azul2" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">3</p>
                    </div>    
                    <div class="card-body">
                        <h5 class="card-title text-light">Pacientes Ativos</h5>
                    </div>
                </div>
                <div class="card bg-azul2" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">3</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light">Representantes</h5>
                    </div>
                </div>
                <div class="card bg-azul2" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">3</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light">Enfermeiros Ativos</h5>
                    </div>
                </div>
                <div class="card bg-azul2" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">3</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light">Farmacêuticos</h5>
                    </div>
                </div>
                <div class="card bg-azul2" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">3</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light">Recepcionistas</h5>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>