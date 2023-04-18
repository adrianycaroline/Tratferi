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
                                <b><p>ID:</b> <?php echo $_SESSION['Hashcode']; ?></p>
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
                                <h3>FOTO DE PERFIL</h3>
                                <img src="../fotos_usuarios/<?php echo $_SESSION['Imagem']; ?>" alt="Foto de Perfil - <?php echo $_SESSION['nome']?>" class="rounded-circle me-2" id="foto_perfil" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="dropdown">
                                    <button class="dropdown-toggle" id="editarFotoAdm" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span>Editar</span>
                                    </button>
                                    <div class="dropdown-menu editarFotoAdm" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Carregar foto...</a>
                                        <a class="dropdown-item" href="#">Remover foto</a>
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <br>
                        <!-- Começo dos dados pessoais -->
                        <?php 
                            if($_POST){

                            }
                        ?>
                        <form action="perfil_adm_conteudo.php" method="post" style="margin-right: 15px;">
                            <h3>Dados Pessoais</h3>
                            <p>Gerencie seu nome e informações de contato. Essas informações pessoais são privadas e não serão exibidos para outros usuários. Veja a nossa <a href="../politica_pivaci.php" id="polit" target="_blank"> Política de Privacidade </a> <ion-icon name="lock-closed-outline"></ion-icon> </p>
                            <br>
                            <div class="d-flex">
                                <div class="group">
                                    <input required="" name="cpf" id="cpf" type="text" class="input" value="<?php echo $_SESSION['Cpf']; ?>" onkeypress="$(this).mask('000.000.000-00');">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>CPF</label>
                                </div>
                                <div class="group">
                                    <input required="" name="datanasc" id="datanasc" type="text" class="input" value="<?php echo date('d/m/Y', strtotime($_SESSION['DataNasc'])); ?>">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Data de Nascimento</label>
                                </div>
                                <div class="group">
                                    <input required="" name="coren" id="coren" type="text" class="input" value="<?php echo $_SESSION['Coren']; ?>">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Coren</label>
                                </div>
                                <div class="group">
                                    <input required="" name="rg" id="rg" type="text" class="input" value="<?php echo $_SESSION['Rg'];?>" onkeypress="$(this).mask('00.000.000-0');">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>RG</label>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex">
                                <div class="group">
                                    <input required="" name="data_inicio" id="data_inicio" type="text" class="input" value="<?php echo date('d/m/Y', strtotime($_SESSION['data_inicio']));?>">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Data de Entrada</label>
                                </div>
                                <div class="group">
                                    <input required="" name="data_saida" id="data_saida" type="text" class="input" value="<?php echo date('d/m/Y', strtotime($_SESSION['data_saida']));?>">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Data de Saída</label>
                                </div>
                                <div class="group">
                                    <input required="" name="crm" id="crm" type="text" class="input" value="<?php echo $_SESSION['Crm'];?>">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>CRM</label>
                                </div>
                            </div>
                            <br>
                            <!-- Começo do Endereço  -->
                            <div>
                                <h4>ENDEREÇO</h4>
                                <br>
                                <div class="d-flex">
                                    <div class="group">
                                        <input required="" name="logradouro" id="logradouro" type="text" class="input">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Logradouro</label>
                                    </div>
                                    <div class="group">
                                        <input required="" name="numero" id="numero" type="text" class="input">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Numero</label>
                                    </div>
                                    <div class="group">
                                        <input required="" name="cidade" id="cidade" type="text" class="input">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Cidade</label>
                                    </div>
                                    <div class="group">
                                        <input required="" name="uf" id="uf" type="text" class="input">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>UF</label>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex">
                                    <div class="group">
                                        <input required="" name="cep" id="cep" type="text" class="input">
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
                                <br>
                                <div class="d-flex">
                                    <div class="group">
                                        <input required="" name="telefone" id="telefone" type="text" class="input">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Telefone</label>
                                    </div>
                                    <div class="group">
                                        <input required="" name="email" id="email" type="email" class="input">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Email</label>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <button type="button" class="btn btn-secondary">Descartar Alterações</button>
                                    <button type="button" class="btn btn-primary">Manter Alterações</button>
                                </div>
                                <br>
                                <br>
                                <div class="text-center">
                                    <p> <img src="../images/logo_areas.png" width="20vw" alt="Logo do Tratferi"> TRATFERI - TODOS OS DIREITOS RESERVADOS.</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- fim configurações de perfil  -->

        <div ng-switch-when="PrefEmail" ng-controller="myCtrl">
            <div class="container">
                <div style="margin-top: 10px;">
                    <h2>PREFERÊNCIAS DE E-MAIL</h2>
                    <p>Gerencie suas preferências de e-mail da TRATFERI.</p>
                    <p>Só entraremos em contato se você solicitar, para fins como verificação de e-mail, redefinição de senha e atualizações de Autenticação de Dois Fatores.</p>
                </div>
                <div>
                    <h4>Gerenciar preferências de e-mail</h4>
                    <br>
                    <div>
                        <div class="group">
                            <input required="" type="text" class="input2" >
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Email</label>
                        </div>
                    </div>
                    <br>
                    <ul style="list-style: none;">
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkTodos" onclick="marcarTodos()">
                                <label class="form-check-label" for="checkTodos">
                                    Selecionar Todos
                                </label>
                            </div>
                        </li>
                        <ul style="list-style: none;">
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check1">
                                    <label class="form-check-label" for="check1">
                                        Enviar-me emails
                                    </label>
                                    <p style="font-size: 10pt;">Receba emails diretos sobre a TRATFERI.</p>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check2">
                                    <label class="form-check-label" for="check2">
                                        Pesquisa
                                    </label>
                                    <p style="font-size: 10pt;">Participe de pesquisas e compartilhe sua opinião com a TRATFERI.</p>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check3">
                                    <label class="form-check-label" for="check3">
                                        Atualizações
                                    </label>
                                    <p style="font-size: 10pt;">Fique sempre informado sobre as novidades e atualizações da TRATFERI.</p>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check4">
                                    <label class="form-check-label" for="check4">
                                        Cancelamentos
                                    </label>
                                    <p style="font-size: 10pt;">Receba diretamente em seu e-mail avisos sobre cancelamentos de consultas, atendimentos ou serviços.</p>
                                </div>
                            </li>
                        </ul>
                    </ul>
                </div>
                <br>
                <br>
                <div class="text-center">
                    <p> <img src="../images/logo_areas.png" width="20vw" alt="Logo do Tratferi"> TRATFERI - TODOS OS DIREITOS RESERVADOS.</p>
                </div>
            </div>
        </div>
        
        <!-- começo do senha e segurança  -->
        <div ng-switch-when="SenhaSegu">
            <div class="container">
                <div style="margin-top: 10px;">
                    <h2>Alterar Senha</h2>
                    <p>Para sua segurança, recomendamos enfaticamente que escolha uma senha única, que não seja usada para nenhuma outra conta on-line. <ion-icon name="lock-closed-outline"></ion-icon> </p>
                </div>
                <br>
                <div class="d-flex">
                    <div>
                        <h5>SENHA ATUAL</h5>
                        <small>OBRIGATÓRIO</small>
                        <br>
                        <div class="group">
                            <input required="" name="senhaAtual" id="senhaAtual" type="text" class="input2">
                        </div>
                        <br>
                        <h5>NOVA SENHA</h5>
                        <small>OBRIGATÓRIO</small>
                        <br>
                        <div class="group">
                            <input required="" name="senhaNova" id="senhaNova" type="text" class="input2">
                        </div>
                        <br>
                        <h5>DIGITE A NOVA SENHA NOVAMENTE</h5>
                        <small>OBRIGATÓRIO</small>
                        <br>
                        <div class="group">
                            <input required="" name="senhaNovaDenovo" id="senhaNovaDenovo" type="text" class="input2">
                        </div>
                    </div>
                    <div style="margin-left: 200px; border-left: 1px solid black; padding-left: 20px;">
                        <h5>SUA SENHA</h5>
                        <br>
                        <br>
                        <div style="font-size: 11pt;">
                            <p>Sua senha precisa ser diferente das últimas 5 senhas usadas</p>
                            <p>Sua senha precisa ter mais de 7 caracteres</p>
                            <p>Sua senha precisa ter pelo menos 1 número</p>
                            <p>Sua senha não pode conter espaços</p>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div>
                    <button type="button" class="btn btn-secondary">Descartar Alterações</button>
                    <button type="button" class="btn btn-primary">Manter Alterações</button>
                </div>
                <br>
                <br>
                <hr width="">
                <br>
                <div>
                    <h3>FINALIZAR SESSÃO EM TODOS OS LUGARES</h3>
                    <div class="d-flex">
                        <div>
                            <p>Finalize sessões em qualquer outro local em que a sua conta da <br>
                                TRATFERI esteja sendo usada, incluindo todos os outros <br>
                                navegadores, telefones, consoles ou qualquer outro dispositivo.
                            </p>
                        </div> 
                        <div>
                            <button type="button" class="btn btn-primary" style="padding: 15px; margin-left: 50px;">FINALIZAR OUTRAS SESSÕES</button>
                        </div> 
                    </div>
                </div>
                <br>
                <hr width="">
                <div>
                    <h3>AUTENTICAÇÃO DE DOIS FATORES</h3>
                    <p>A Autenticação de Dois Fatores (ADF) pode ser usada para proteger sua conta de acesso não autorizado ao exigir que você insira um código de segurança ao iniciar sessão. Caso tenha algum problema ou dúvidas entre em contato conosco clicando <a href="../contato.php">aqui</a></p>
                    <small>Métodos de Autenticação disponíveis:</small>
                    <br>
                    <br>
                    <div>
                        <h5>APLICATIVO AUTENTICADOR DE TERCEIROS</h5>
                        <div style="display: flex;">
                            <div>
                                <p>Use um aplicativo autenticador como sua Autenticação de Dois Fatores (ADF). Ao fazer o login, você precisará usar o código de segurança fornecido pelo seu aplicativo autenticador.</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Desativadas</label>
                            </div>
                        </div>
                        <br>
                        <h5>AUTENTICAÇÃO POR SMS</h5>
                        <div style="display: flex;">
                            <div>
                                <p>Use seu celular como Autenticação de Dois Fatores (ADF). Ao acessar, você precisará usar o código de segurança recebido por SMS.</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Desativadas</label>
                            </div>
                        </div>
                        <br>
                        <h5>AUTENTICAÇÃO POR E-MAIL</h5>
                        <div style="display: flex;">
                            <div>
                                <p>Use um código de segurança enviado para o seu endereço de e-mail como sua Autenticação de Dois Fatores (ADF). O código de segurança será enviado ao endereço associado à sua conta.</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Desativadas</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="text-center">
                    <p> <img src="../images/logo_areas.png" width="20vw" alt="Logo do Tratferi"> TRATFERI - TODOS OS DIREITOS RESERVADOS.</p>
                </div>
            </div>
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
<script>
  function marcarTodos() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var checkTodos = document.querySelector('#checkTodos');

    for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].checked = checkTodos.checked;
    }
  }
</script>
</html>