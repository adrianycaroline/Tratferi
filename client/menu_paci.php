<?php
    include '../admin/acesso_com_pac.php';
    include '../connection/connect.php';

    $lista = $conn->query("SELECT * FROM convenio LEFT JOIN paciente ON (paciente.id = convenio.id_paci) where convenio.id_paci = ".$_SESSION['Id'].";");
    $row = $lista->fetch_assoc();
    $rows = $lista->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    
    <title>Barra Lateral</title>
</head>
<body>
    <div>
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-azul"  style="position: fixed; top: 0; left: 0; bottom: 0; width: 280px;">
            <div>
                <figure style="display: flex;">
                    <img src="../images/logoPesq.png" alt="Logo Tratferi" width="75vw"> 
                    <a href="../index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none" style="font-size: 32pt;">
                        Tratferi
                    </a> 
                </figure>
                <!-- Começo da barra letarl  -->
            </div>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="index.php" class="nav-link" aria-current="page" style="cursor: pointer;">
                        <img src="../images/dashboard.svg" alt="" width="20vw">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a data-toggle="modal" data-target="#modal_carteirinha" class="nav-link" aria-current="page" style="cursor: pointer;">
                        <img src="../images/Tratferi_qrcode.svg" alt="" width="20vw">
                        Carteirinha
                    </a>
                </li>
                <li>
                    <a href="consultas.php" class="nav-link">
                        <img src="../images/prontuario.svg" alt="" width="20vw">
                        Consultas
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
            <!-- Fim da barra lateral -->
            <hr>
            <!-- Botão para voltar pra home do site -->
            <div class="dropdown">
                <a href="config_perfil.php">
                    <img src="../fotos_usuarios/<?php echo $_SESSION['Imagem']; ?>" alt="Foto de Perfil - <?php echo $_SESSION['nome']?>" width="32" height="32" class="rounded-circle me-2">
                </a>
                <strong><a style="text-decoration: none; color: white;"><?php echo $_SESSION['nome'];?></a></strong>
                <button class="dropdown-toggle bg-azul border-0" style="color: aqua;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="config_perfil.php">
                        <ion-icon name="person-outline"></ion-icon>Perfil
                    </a>
                    <a class="dropdown-item" href="../admin/logout_pac.php">
                        <ion-icon name="exit-outline"></ion-icon>Sair
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- //////////////////////// MODAIS ////////////////////////// -->
    <div class="modal fade modal-lg" id="modal_carteirinha" tabindex="-1" role="dialog" aria-labelledby="modal_carteirinha_centro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content " style="border-radius: 40px; border: 4px solid #2b8af7;">
                <div class="modal-title" id="modal_carteirinha_titulo">
                    <!-- imagem do usuário -->
                    <div style="display: flex; justify-content: center; margin-top: 10px;">
                        <h2>-- CARTEIRINHA --</h2>
                    </div>
                    <div class="d-flex" style="margin: 20px;">
                        <div>
                            <img style="border-radius: 20px;" src="../fotos_usuarios/<?php echo $_SESSION['Imagem'];?>" width="200vw" alt="Foto de Perfil">
                        </div>
                        <div style="margin-left: 20px;">
                            <h2><?php echo $row['nome'];?></h2>
                            <!-- Inputs com as informações -->
                            <div style="display: flex;">
                                <!-- Inputs do lado esquerdo -->
                                <div style="display: flex; flex-direction: column;">
                                    <small>Data de Nascimento</small>
                                    <input type="text" value="<?php echo date('d/m/Y', strtotime($row['data_nasc'])); ?>" style="border-radius: 10px; margin-bottom: 10px;" disabled>
                                    <small>CPF</small>
                                    <input type="text" value="<?php echo $row['cpf']; ?>" style="border-radius: 10px;" disabled>
                                </div>
                                <!-- Inputs do lado direito -->
                                <div style="display: flex; flex-direction: column; margin-left: 20px;">
                                    <small>RG</small>
                                    <input type="text" value="<?php echo $row['rg']; ?>" style="border-radius: 10px; margin-bottom: 10px;" disabled>
                                    <small>Cartão do SUS</small>
                                    <input type="text" value="<?php echo $row['card_SUS']; ?>" style="border-radius: 10px;" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Botão X de fechar Modal -->
                    <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                    </button>
                </div>
                 <div class="modal-body">
                    <div style="display: flex; justify-content: end;">
                        <img style="opacity: 0.4;" src="../images/logo_carteirinha.png" width="100vw" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../js/script.js"></script> 
</html>