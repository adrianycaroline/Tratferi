
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
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="position: fixed; top: 0; left: 0; bottom: 0; width: 280px; background-color: #f8f9fa;">
        <div>
            <figure style="display: flex; justify-content: end; text-align: end;">
                <img src="../images/seta_esquerda_branca.svg" alt="" width="20vw">
            </figure>
            <figure style="display: flex;">
                <img src="../images/logoPesq.png" alt="Logo Tratferi" width="75vw"> 
                <a href="../index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none" style="font-size: 32pt;">
                    Tratferi
                </a> 
            </figure>
        </div>
        
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link active" aria-current="page">
                    <img src="../images/dashboard.svg" alt="" width="20vw">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <img src="../images/usuarios.svg" alt="" width="20vw">
                    Pacientes
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <img src="../images/prontuario.svg" alt="" width="20vw">
                    Prontuário
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <img src="../images/cama.svg" alt="" width="20vw">
                    Leitos
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <img src="../images/predio.svg" alt="" width="20vw">    
                    Departamentos
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <img src="../images/predio.svg" alt="" width="20vw">    
                    Designação
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <img src="../images/predio.svg" alt="" width="20vw">    
                    RH
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <img src="../images/coracao.svg" alt="" width="20vw">    
                    Ajuda
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <img src="../images/anuncio.svg" alt="" width="20vw">
                    Anuncios
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong><?php echo($_SESSION['nome']); ?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">Novo Projeto</a></li>
                <li><a class="dropdown-item" href="#">Configurações</a></li>
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Sair</a></li>
            </ul>
        </div>
    </div>
</body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>