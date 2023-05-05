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
    <title>Barra Lateral</title>
</head>
<body>
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
                    <a href="../func/index.php" class="nav-link" aria-current="page">
                        <img src="../images/dashboard.svg" alt="" width="20vw">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="../func/cadastrar_paciente.php" class="nav-link">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                        Cadastrar Pacientes
                    </a>
                </li>
                <li>
                    <a href="pacientes_lista.php" class="nav-link">
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
                <button class="dropdown-toggle bg-azul border-0" style="color: white;" type="button" id="dropdownMenuFunc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu func" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="perfil/config_perfil_func.php?upd"><ion-icon name="person-outline"></ion-icon>Perfil</a>
                    <a class="dropdown-item" href="../admin/logout_Fun.php"><ion-icon name="exit-outline"></ion-icon>Sair</a>
                </div>
            </div>
        </div>
    </div>
   
</body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="../js/script.js"></script>
<script src="../js/dropdown.js"></script>
<script>
const dropdownMenuFunc = document.getElementById('dropdownMenuFunc');
const dropdownMenufuncionario = document.querySelector('.func');
dropdownMenuFunc.addEventListener('click', () => {
  dropdownMenufuncionario.classList.toggle('show');
});

//caso o usuario clique fora ele fecha o dropdown
document.addEventListener('click', (event) => {
    if (!dropdownMenuFunc.contains(event.target)) {
      dropdownMenufuncionario.classList.remove('show');
    }
});
</script>
</html>