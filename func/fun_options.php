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
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Área do Funcionário</title>
</head>
<body>
<div>
    <main id="escondido2"  style="bottom: 0;">
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
        <div id="menu-dropdown" style="display: none;">
            <!-- conteúdo do menu dropdown -->
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-azul"  style="position: fixed; top: 0; left: 0; bottom: 0; width: 80px; overflow-y: auto;">
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="#" class="nav-link" aria-current="page">
                        <img src="../images/dashboard.svg" alt="" width="20vw">
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <img src="../images/prontuario.svg" alt="" width="20vw">
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <img src="../images/cama.svg" alt="" width="20vw">
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <img src="../images/predio.svg" alt="" width="20vw">    
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <img src="../images/predio.svg" alt="" width="20vw">    
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <img src="../images/predio.svg" alt="" width="20vw">    
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <img src="../images/coracao.svg" alt="" width="20vw">    
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <img src="../images/anuncio.svg" alt="" width="20vw">
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a class="bg-azul border-0 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Novo Projeto</a></li>
                    <li><a class="dropdown-item" href="#">Configurações</a></li>
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                </ul>
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
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">1</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light">Médicos Ativos</h5>
                    
                    </div>
                </div>
                <div class="card bg-azul2" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">2</p>
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
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">4</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light">Enfermeiros Ativos</h5>
                    </div>
                </div>
                <div class="card bg-azul2" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">5</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light">Farmacêuticos</h5>
                    </div>
                </div>
                <div class="card bg-azul2" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">6</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light">Recepcionistas</h5>
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