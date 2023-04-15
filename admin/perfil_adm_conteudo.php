<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilo_perfil.css">
    <link rel="stylesheet" href="../CSS/dropdown.css">
    <title>Conteudo Perfil Adm</title>
</head>
<body style="margin-left: 280px;">
    <div ng-switch="opcao">
        <!-- Inicio COnfigurações de perfil  -->
        <div ng-switch-when="ConfigPerfil">
            <div>
                <div class="text-center" style="margin-top: 10px;">
                    <h2>Configurações de Perfil</h2>
                    <p>Gerencie os detalhes de sua conta.</p>
                </div>
                <div class="border-bottom border-2 border-dark" style="width: 97%; margin-left: 15px; margin-bottom: 10px;"></div>
                <div>
                    <div style="margin-left: 50px;">
                        <div class="d-flex container">
                            <div>
                                <h3 >INFORMAÇÕES DA CONTA</h3>
                                <b><p>ID:</b> 0324328489239483829</p>
                                <div class="input-group">
                                    <input required="" type="text" name="text" placeholder="<?php echo $_SESSION['nome']; ?>" autocomplete="off" class="input" disabled>
                                    <label class="user-label">Nome</label>
                                    <a href="" id="editar">
                                        <ion-icon name="pencil-outline"></ion-icon>
                                    </a>
                                </div>
                                <br>
                                
                                <div class="input-group">
                                    <input required="" type="text" name="text" placeholder="<?php echo $_SESSION['Periodo']; ?>" autocomplete="off" class="input" disabled>
                                    <label class="user-label">Período</label>
                                    <a href="" id="editar">
                                        <ion-icon name="pencil-outline"></ion-icon>
                                    </a>
                                </div>
                                <br>
                                <div class="input-group">
                                    <input required="" type="text" name="text" placeholder="<?php echo $_SESSION['Cargo']; ?>" autocomplete="off" class="input" disabled>
                                    <label class="user-label">Cargo</label>
                                    <a href="" id="editar">
                                        <ion-icon name="pencil-outline"></ion-icon>
                                    </a>
                                </div>
                                <br>
                                <div class="input-group">
                                    <input required="" type="text" name="text" placeholder="<?php echo $_SESSION['Funcao']; ?>" autocomplete="off" class="input" disabled>
                                    <label class="user-label">Função</label>
                                    <a href="" id="editar">
                                        <ion-icon name="pencil-outline"></ion-icon>
                                    </a>
                                </div>
                            </div> 
                            <div style="margin-left: 100px;">
                                <h2>Imagem de Perfil</h2>
                                <figure>
                                    <img src="https://github.com/mdo.png" alt="Foto de Perfil - <?php echo $_SESSION['nome']?>" class="rounded-circle me-2" id="foto_perfil">
                                </figure>
                            </div>   
                        </div>
                        <br>
                        <div style="margin-right: 15px;">
                            <h3>Dados Pessoais</h3>
                            <p>Gerencie seu nome e informações de contato. Essas informações pessoais são privadas e não serão exibidos para outros usuários. Veja a nossa <a href="" id="polit"> Política de Privacidade </a> <ion-icon name="lock-closed-outline"></ion-icon> </p>
                            <br>
                            <div >
                                <div class="group">
                                    <input required="" type="text" class="input">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Name</label>
                                </div>
                                <br>
                                <div class="group">
                                    <input required="" type="text" class="input">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Name</label>
                                </div>
                                <br>
                                <div class="group">
                                    <input required="" type="text" class="input">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Name</label>
                                </div>
                                <br>
                                <div class="group">
                                    <input required="" type="text" class="input">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Name</label>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- fim configurações de perfil  -->

        <div ng-switch-when="PrefEmail">
            <h1>Gatos</h1>
            <p>Bem-vindo a um mundo de gatos.</p>
        </div>

        <div ng-switch-when="SenhaSegu">
            <h1>Passaros</h1>
            <p>Bem-vindo a um mundo de passaros.</p>
        </div>

        <div ng-switch-when="Telefone">
            <h1>Passaros</h1>
            <p>Bem-vindo a um mundo de passaros.</p>
        </div>

        <div ng-switch-when="RecuAdicio">
            <h1>Passaros</h1>
            <p>Bem-vindo a um mundo de passaros.</p>
        </div>

        <!-- fim da área de seleção de conteúdo  -->
    </div>
</body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../js/dropdown.js"></script>
</html>