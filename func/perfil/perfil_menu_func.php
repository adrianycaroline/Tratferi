<?php
    include '../../admin/acesso_com_fun.php';
    include '../../connection/connect.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../../CSS/estilo.css">
    <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
    <title>Menu Perfil ADM</title>
</head>
<body ng-app="">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-azul"  style="position: fixed; top: 0; left: 0; bottom: 0; width: 280px;">
        <figure style="color: white; font-size: 25pt; margin-right: 20px;">
            <img src="../../images/logoPesq.png" alt="" width="60vw">
            TRATFERI
        </figure>
        <div>
            <nav class="nav">
                <li class="container-navs-menu">
                    <a class="nav-link" id="texto-navs" href="../perfil/config_perfil_func.php">
                        CONFIGURAÇÕES DO PERFIL
                    </a>
                </li>
                <li class="container-navs-menu">
                    <a class="nav-link" id="texto-navs" href="../perfil/pref_email_func.php">
                        PREFERÊNCIAS DE E-MAIL
                    </a>
                </li>
                <li class="container-navs-menu">
                    <a class="nav-link" id="texto-navs" href="../perfil/senha_segu_func.php">
                        SENHA E SEGURANÇA
                    </a>
                </li>
                <li class="container-navs-menu">
                    <a class="nav-link" id="texto-navs" href="config_perfil_func.php#contato">
                        TELEFONE
                    </a>
                </li>
                <li>
                    <a class="nav-link" id="texto-navs" href="">
                        RECURSOS ADICIONAIS
                    </a>
                </li>
            </nav>
            <hr>
            <!-- Botão de Voltar -->
            <div style="color: white;">
                <a href="../../func/index.php" class="text-light" style="text-decoration: none; border: 1px solid white; border-radius: 20px; padding: 5px;">
                    <ion-icon name="arrow-undo-outline"></ion-icon>Voltar
                </a>
            </div>
        </div>
    </div>
</body>
<!-- Links para a Biblioteca de Icones do Ionic Icons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>