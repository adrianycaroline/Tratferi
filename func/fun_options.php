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
    $listaP = $conn->query("SELECT COUNT(*) FROM paciente"); //Conta a quantidade de usuarios ativos.
   
    $rowP = $listaP->fetch_row(); 
    $quantidadeP = $rowP[0]; 

    
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="../CSS/dropdown.css">
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
                    <a href="index.php" class="nav-link" aria-current="page">
                        <img src="../images/dashboard.svg" alt="" width="20vw">
                    </a>
                </li>
                <li>
                    <a href="cadastrar_paciente.php" class="nav-link">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                    </a>
                </li>
                <li>
                    <a href="pacientes_lista.php" class="nav-link">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <img  id="dropdownMenuFuncRespon" type="button"  data-toggle="dropdown" aria-haspopup="true" src="https://github.com/mdo.png" alt="Foto de Perfil - <?php echo $_SESSION['nome']?>" width="32" height="32" style="border-radius: 20px;">
                <div class="dropdown-menu funcRespon" aria-labelledby="dropdownMenuButton" >
                    <a class="dropdown-item" href="../admin/perfil_adm_index.php"><ion-icon name="person-outline"></ion-icon></a>
                    <a class="dropdown-item" href="../admin/logout_Fun.php"><ion-icon name="exit-outline"></ion-icon></a>
                </div>
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
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;"><?php echo $quantidadeP ?></p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light"><a href="pacientes_lista.php" class="text-white">Pacientes Ativos</a></h5>
                    
                    </div>
                </div>
                <div class="card bg-azul2" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">2</p>
                    </div>    
                    <div class="card-body">
                        <h5 class="card-title text-light"><a href="consultas.php" class="text-white">Consultas</a></h5>
                    </div>
                </div>
                <div class="card bg-azul2" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">3</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light"><a href="medicamentos.php" class="text-white">Medicamentos</a></h5>
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
<script>
const dropdownMenuFuncRespon = document.getElementById('dropdownMenuFuncRespon');
const dropdownMenufuncionarioRes = document.querySelector('.funcRespon');

dropdownMenuFuncRespon.addEventListener('click', () => {
  dropdownMenufuncionarioRes.classList.toggle('show');
});

//caso o usuario clique fora ele fecha o dropdown
document.addEventListener('click', (event) => {
    if (!dropdownMenuFuncRespon.contains(event.target)) {
      dropdownMenufuncionarioRes.classList.remove('show');
    }
});
</script>
</html>