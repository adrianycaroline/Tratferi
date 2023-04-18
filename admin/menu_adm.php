<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="../CSS/dropdown.css">
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
                    <a href="#" class="nav-link" aria-current="page">
                        <img src="../images/dashboard.svg" alt="" width="20vw">
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" role="button" id="dropdownMenuCadastro" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../images/usuarios.svg" alt="" width="20vw">
                            Cadastrar
                        </a>
                        <div class="dropdown-menu cadas" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="../admin/cadastrar_paciente.php">Novo Paciente</a>
                            <a class="dropdown-item" href="../admin/cadastrar_funcionario.php">Novo Funcionário</a>
                        </div>
                    </div>
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
                <button class="dropdown-toggle bg-dark border-0" style="color: white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu user" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="../admin/perfil_adm_index.php"><ion-icon name="person-outline"></ion-icon>Perfil</a>
                    <a class="dropdown-item" href="../admin/logout_Fun.php"><ion-icon name="exit-outline"></ion-icon>Sair</a>
                </div>
            </div>
        </div>
    </div>
    <?php include '../admin/adm_options.php';?>
</body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/dropdown.js"></script>
</html>