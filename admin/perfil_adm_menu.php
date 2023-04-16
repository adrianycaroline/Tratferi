<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <title>Menu Perfil ADM</title>
</head>
<body ng-app="">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-dark"  style="position: fixed; top: 0; left: 0; bottom: 0; width: 280px;">
        <figure style="color: white; font-size: 25pt; margin-right: 20px;">
            <img src="../images/logoPesq.png" alt="" width="60vw">
            TRATFERI
        </figure>
        <div >
            <nav class="nav">
                <li class="container-navs-menu">
                    <a class="nav-link" id="texto-navs" href="" ng-click="opcao='ConfigPerfil'">
                        CONFIGURAÇÕES DO PERFIL
                    </a>
                </li>
                <li class="container-navs-menu">
                    <a class="nav-link" id="texto-navs" href="" ng-click="opcao='PrefEmail'">
                        PREFERÊNCIAS DE E-MAIL
                    </a>
                </li>
                <li class="container-navs-menu">
                    <a class="nav-link" id="texto-navs" href="" ng-click="opcao='SenhaSegu'">
                        SENHA E SEGURANÇA
                    </a>
                </li>
                <li class="container-navs-menu">
                    <a class="nav-link" id="texto-navs" href="" ng-click="opcao='Telefone'">
                        TELEFONE
                    </a>
                </li>
                <li>
                    <a class="nav-link" id="texto-navs" href="" ng-click="opcao='RecuAdicio'">
                        RECURSOS ADICIONAIS
                    </a>
                </li>
            </nav>
            <hr>
            <div style="color: white;">
                <a href="javascript:window.history.go(-1)" class="text-light" style="text-decoration: none; border: 1px solid white; border-radius: 20px; padding: 5px;"><ion-icon name="arrow-undo-outline"></ion-icon>Voltar</a>
            </div>
        </div>
    </div>
    <?php include '../admin/perfil_adm_conteudo.php';?>
</body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="../js/dropdown.js"></script>
</html>