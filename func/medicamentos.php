<?php
include '../admin/acesso_com_fun.php';
 include '../connection/connect.php'; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <title>Medicamentos</title>
</head>
<body>
     <!-- barra lateral -->
     <div id="escondido">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-azul"  style="position: fixed; top: 0; left: 0; bottom: 0; width: 280px; z-index: 9999;">
            <div>
                <figure style="display: flex;">
                    <img src="../images/logoPesq.png" alt="Logo Tratferi" width="75vw"> 
                    <a href="../index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none" style="font-size: 32pt;">
                        Tratferi
                    </a> 
                </figure>
            </div>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="../func/index.php" class="nav-link text-white" aria-current="page">
                        <img src="../images/dashboard.svg" alt="" width="20vw">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="../func/cadastrar_paciente.php" class="nav-link text-white">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                        Cadastrar Pacientes
                    </a>
                </li>
                <li>
                    <a href="pacientes_lista.php" class="nav-link text-white">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                        Pacientes Ativos
                    </a>
                </li>
                <br>
                <!-- Botão de Voltar -->
            <div style="color: white;">
                <a href="index.php" class="text-light" style="text-decoration: none; border: 1px solid white; border-radius: 20px; padding: 5px;">Voltar</a>
            </div>
            </ul>
            <hr>
            
            <div class="dropdown">
                <img src="../fotos_usuarios/<?php echo $_SESSION['Imagem']; ?>" alt="Foto de Perfil - <?php echo $_SESSION['nome']?>" width="32" height="32" class="rounded-circle me-2">
                <strong><a style="text-decoration: none; color: white;"><?php echo $_SESSION['nome'];?></a></strong>
                <button class="dropdown-toggle bg-azul border-0" style="color: white;"  type="button" id="dropdownMenuFunc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu func" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="perfil/config_perfil_func.php"><ion-icon name="person-outline"></ion-icon>Perfil</a>
                    <a class="dropdown-item" href="../admin/logout_Fun.php"><ion-icon name="exit-outline"></ion-icon>Sair</a>
                </div>
            </div>
        </div>
    </div>
    <div class="barra fixed-top bg-azul">
    <br> <br>
</div>
    <!-- fim -->
    <div style="background-color:  #38B6FF; display: flex; margin-left: 300px; margin-top: 320px; width: 80%; border-radius: 20px;">
        <br><br>
    </div>
    &nbsp;
    <div style="background-color: #DCDCDC; display: flex; margin-left: 300px; width: 80%; border-radius: 20px;">
        <br><br><br><br>
    </div>
    <br>
    <div style="background-color: #DCDCDC; display: flex; margin-left: 300px; width: 80%; border-radius: 20px;">
        <br><br><br><br>
    </div>
    <br>
    <div style="background-color: #DCDCDC; display: flex; margin-left: 300px; width: 80%; border-radius: 20px;">
        <br><br><br><br>
    </div>
    <br>
    <div style="background-color: #DCDCDC; display: flex; margin-left: 300px; width: 80%; border-radius: 20px;">
        <br><br><br><br>
    </div>
</body>
</html>