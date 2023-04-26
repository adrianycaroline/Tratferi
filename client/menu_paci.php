<?php
    include '../admin/acesso_com_pac.php';
    include '../connection/connect.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Barra Lateral</title>
</head>
<body>
    <div id="escondido">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-azul"  style="position: fixed; top: 0; left: 0; bottom: 0; width: 280px;">
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
                    <a href="#" class="nav-link" aria-current="page">
                        <img src="../images/dashboard.svg" alt="" width="20vw">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                        Pacientes
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <img src="../images/prontuario.svg" alt="" width="20vw">
                        Prontuário
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <img src="../images/cama.svg" alt="" width="20vw">
                        Leitos
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <img src="../images/predio.svg" alt="" width="20vw">    
                        Departamentos
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <img src="../images/predio.svg" alt="" width="20vw">    
                        Designação
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <img src="../images/predio.svg" alt="" width="20vw">    
                        RH
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <img src="../images/coracao.svg" alt="" width="20vw">    
                        Ajuda
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <img src="../images/anuncio.svg" alt="" width="20vw">
                        Anuncios
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <img src="../fotos_usuarios/<?php echo $_SESSION['Imagem']; ?>" alt="Foto de Perfil - <?php echo $_SESSION['nome']?>" width="32" height="32" class="rounded-circle me-2">
                <strong><a style="text-decoration: none; color: white;"><?php echo $_SESSION['nome'];?></a></strong>
                <button class="dropdown-toggle bg-azul border-0" style="color: white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="perfil/config_perfil.php">
                        <ion-icon name="person-outline"></ion-icon>Perfil
                    </a>
                    <a class="dropdown-item" href="../admin/logout_pac.php">
                        <ion-icon name="exit-outline"></ion-icon>Sair
                    </a>
                </div>
            <!-- <img src="../fotos_usuarios/" alt="Foto de Perfil - " width="32" height="32" class="rounded-circle me-2">
                <a class="dropdown bg-azul border-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="Foto de Perfil - " width="32" height="32" class="rounded-circle me-2">
                    <strong><a style="text-decoration: none; color: white;" href="../admin/logout_pac.php">Sair</a></strong>
                </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Novo Projeto</a>
                    <a class="dropdown-item" href="#">Configurações</a>
                    <a class="dropdown-item" href="#">Perfil</a>
                </div> -->
            </div>
        </div>
    </div>
    <?php include 'paci_options.php';?>
</body>
    <script src="../js/script.js"></script>
</html>