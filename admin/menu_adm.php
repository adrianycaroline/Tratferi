<?php
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="../CSS/dropdown.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <title>Barra Lateral</title>
</head>
<body>
    <div>
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="position: fixed; top: 0; left: 0; bottom: 0; width: 280px; background-color: #f8f9fa;">
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
                    <a href="../admin/index.php" class="nav-link" aria-current="page">
                        <img src="../images/dashboard.svg" alt="" width="20vw">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="../admin/cadastrar_funcionario.php" class="nav-link">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                        Cadastrar
                    </a>
                </li>
                <li>
                    <a href="funcionarios_arquivados.php" class="nav-link">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                        Arquivados
                    </a>
                </li>
                <li>
                    <a href="../admin/listar_funcionarios.php" class="nav-link">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                        Ativos
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="../perfil_adm/config_perfil.php?upd" style="text-decoration: none; color: white;">
                    <img src="../fotos_usuarios/<?php echo $_SESSION['Imagem']; ?>" alt="Foto de Perfil - <?php echo $_SESSION['nome']?>" width="32" height="32" class="rounded-circle me-2">
                </a>
                <strong><a style="text-decoration: none; color: white;"><?php echo strstr($_SESSION['nome'], ' ', true);?></a></strong>
                <button class="dropdown-toggle bg-dark border-0" style="color: white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="../perfil_adm/config_perfil.php?upd">
                        <ion-icon name="person-outline"></ion-icon>Perfil
                    </a>
                    <a class="dropdown-item" href="../admin/logout_Fun.php">
                        <ion-icon name="exit-outline"></ion-icon>Sair
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../js/script.js"></script>
</html>