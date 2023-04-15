<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilo_perfil.css">
    <link rel="stylesheet" href="../CSS/dropdown.css">
    <title>Conteudo Perfil Adm</title>
</head>
<body style="margin-left: 280px; display: flex; justify-content: left;">
    <div ng-switch="opcao">
        <!-- Inicio Configurações de perfil  -->
        <div ng-switch-when="ConfigPerfil">
            <div class="container">
                <div class="text-center" style="margin-top: 10px;">
                    <h2>Configurações de Perfil</h2>
                    <p>Gerencie os detalhes de sua conta.</p>
                </div>
                <div class="border-bottom border-2 border-dark" style="width: 97%; margin-left: 15px; margin-bottom: 10px;"></div>
                <div class="container">
                    <div>
                        <!-- Começo das informações da conta  -->
                        <div class="d-flex">
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
                        <!-- Começo dos dados pessoais -->
                        <div style="margin-right: 15px;">
                            <h3>Dados Pessoais</h3>
                            <p>Gerencie seu nome e informações de contato. Essas informações pessoais são privadas e não serão exibidos para outros usuários. Veja a nossa <a href="../politica_pivaci.php" id="polit"> Política de Privacidade </a> <ion-icon name="lock-closed-outline"></ion-icon> </p>
                            <br>
                            <div class="d-flex">
                                <div class="group">
                                    <input required="" type="text" class="input">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>CPF</label>
                                </div>
                                <div class="group">
                                    <input required="" type="text" class="input">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Data de Nascimento</label>
                                </div>
                                <div class="group">
                                    <input required="" type="text" class="input">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Coren</label>
                                </div>
                                <div class="group">
                                    <input required="" type="text" class="input">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>RG</label>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex">
                                <div class="group">
                                    <input required="" type="text" class="input">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Data de Entrada</label>
                                </div>
                                <div class="group">
                                    <input required="" type="text" class="input">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Data de Saída</label>
                                </div>
                                <div class="group">
                                    <input required="" type="text" class="input">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>CRM</label>
                                </div>
                                <div class="group">
                                    <input required="" type="text" class="input">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Função na Empresa</label>
                                </div>
                            </div>
                            <br>
                            <!-- Começo do Endereço  -->
                            <div>
                                <h4>ENDEREÇO</h4>
                                <div class="d-flex">
                                    <div class="group">
                                        <input required="" type="text" class="input">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Logradouro</label>
                                    </div>
                                    <div class="group">
                                        <input required="" type="text" class="input">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Numero</label>
                                    </div>
                                    <div class="group">
                                        <input required="" type="text" class="input">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Cidade</label>
                                    </div>
                                    <div class="group">
                                        <input required="" type="text" class="input">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>UF</label>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex">
                                    
                                    <div class="group">
                                        <input required="" type="text" class="input">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>CEP</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <!-- Começo do Telefone e Email  -->
                            <div>
                                <h4>CONTATO</h4>
                                <div class="d-flex">
                                    <div class="group">
                                        <input required="" type="text" class="input">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Telefone</label>
                                    </div>
                                    <div class="group">
                                        <input required="" type="text" class="input">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Email</label>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="text-center">
                                    <p> <img src="../images/logo_areas.png" width="20vw" alt="Logo do Tratferi"> TRATFERI - TODOS OS DIREITOS RESERVADOS.</p>
                                </div>
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