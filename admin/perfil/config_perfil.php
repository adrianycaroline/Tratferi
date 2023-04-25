<?php
    include '../../admin/acesso_com_fun.php';
    include '../../connection/connect.php';

    $lista = $conn->query("SELECT * FROM perfil where id = ".$_SESSION['Id'].";");
    $row = $lista->fetch_assoc();
    $rows = $lista->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../../CSS/estilo.css">
    <link rel="stylesheet" href="../../CSS/estilo_perfil.css">
    <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
    <title>Configurações do Perfil - <?php echo $_SESSION['nome'];?></title>
</head>
<body class="fundo_adm">
    <?php include 'perfil_menu.php';?>
    <!-- Inicio Configurações de perfil  -->
    <div style="margin-left: 280px; display: flex; justify-content: left;">
        <div class="container">
            <div class="text-center" style="margin-top: 10px;">
                <h2 style="color: #38B6FF;">Configurações de Perfil</h2>
                    <p>Gerencie os detalhes de sua conta.</p>
                </div>
                    <div class="border-bottom border-2 border-dark" style="width: 97%; margin-left: 15px; margin-bottom: 10px;"></div>
                <div class="container">
                    <div>
                        <!-- Começo das informações da conta  -->
                        <div class="d-flex">
                            <div>
                                <h3 >INFORMAÇÕES DA CONTA</h3>
                                <b><p>ID:</b> <?php echo $row['hash']; ?></p>
                                <!-- Input do Nome -->
                                <div class="input-group">
                                    <input required="" type="text" name="text" placeholder="<?php echo $row['nome']; ?>" autocomplete="off" class="input" disabled>
                                    <label class="user-label" style="color: #38B6FF;">Nome</label>
                                    <a role="button" id="editar" data-toggle="modal" data-target="#modal_nome" style="background-color: #38B6FF;">
                                        <ion-icon name="pencil-outline"></ion-icon>
                                    </a>
                                </div>
                                <br>
                                <!-- Modal alterar nome  -->
                                <div class="modal fade" id="modal_nome" tabindex="-1" role="dialog" aria-labelledby="modal_nome_centro" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-title" id="modal_nome_titulo" style="display: flex; justify-content: center; align-items: center;">
                                                <img src="../../images/logo_areas.png" width="100vw" alt="">
                                            </div>
                                            <button style="background-color: white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><ion-icon style="color: black; font-size: 1.4vw;" name="close-outline"></ion-icon></span>
                                            </button>
                                            <div class="modal-body">
                                                <h5>Confirmar mudança de nome de exibição</h5>
                                                <p><b>Observe: </b> Se você alterou o nome de exibição da TRATFERI, não poderá alterá-lo novamente por 2 semanas após confirmar essa alteração.</p>
                                                <p><b> Nome de exibição atual: </b><?php echo $row['nome'];?></p>
                                                    <div class="group">
                                                        <input required="" name="novo_nome" id="novo_nome" type="text" class="input2">
                                                        <span class="highlight"></span>
                                                        <span class="bar"></span>
                                                        <label>NOVO NOME DE EXIBIÇÃO</label>
                                                    </div>
                                                    <br>
                                                    <div class="group">
                                                        <input required="" name="confirma_novo_nome" id="confirma_novo_nome" type="text" class="input2">
                                                        <span class="highlight"></span>
                                                        <span class="bar"></span>
                                                        <label>CONFIRME NOME DE EXIBIÇÃO</label>
                                                    </div>
                                                    <br>
                                                        <input type="checkbox" class="form-check-input"> Entendo que após esta alteração, não poderei alterar meu nome de exibição novamente por duas semanas.
                                                    <br> <br>
                                                <div style="margin-left: 10px;">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar Alterações</button>
                                                    <button type="button" class="btn" style="background-color: #38B6FF;">Manter Alterações</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Input do Periodo -->
                                <div class="input-group">
                                    <input required="" type="text" name="text" placeholder="<?php echo $row['periodo']; ?>" autocomplete="off" class="input" disabled>
                                    <label class="user-label" style="color: #38B6FF;">Período</label>
                                    <a role="button" id="editar" data-toggle="modal" data-target="#modal_periodo" style="background-color: #38B6FF;">
                                        <ion-icon name="pencil-outline"></ion-icon>
                                    </a>
                                </div>
                                <br>
                                <!-- Modal do periodo  -->
                                <div class="modal fade" id="modal_periodo" tabindex="-1" role="dialog" aria-labelledby="modal_periodo_centro" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-title" id="modal_periodo_titulo" style="display: flex; justify-content: center; align-items: center;">
                                                <img src="../../images/logo_areas.png" width="100vw" alt="">
                                            </div>
                                            <button style="background-color: white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><ion-icon style="color: black; font-size: 1.4vw;" name="close-outline"></ion-icon></span>
                                            </button>
                                            <div class="modal-body" >
                                                <p><b>ATENÇÃO:</b> O seu período de trabalho não é algo que você pode mudar diretamente em seu perfil, apenas outro profissional autorizado pode realizar a mudança de seu horario de expediente.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Input do Cargo -->
                                <div class="input-group">
                                    <input required="" type="text" name="text" placeholder="<?php echo $row['cargo']; ?>" autocomplete="off" class="input" disabled>
                                    <label class="user-label" style="color: #38B6FF;">Cargo</label>
                                    <a role="button" id="editar" data-toggle="modal" data-target="#modal_cargo" style="background-color: #38B6FF;">
                                        <ion-icon name="pencil-outline"></ion-icon>
                                    </a>
                                </div>
                                <br>
                                <!-- Modal do cargo  -->
                                <div class="modal fade" id="modal_cargo" tabindex="-1" role="dialog" aria-labelledby="modal_cargo_centro" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-title" id="modal_cargo_titulo" style="display: flex; justify-content: center; align-items: center;">
                                                <img src="../../images/logo_areas.png" width="100vw" alt="">
                                            </div>
                                            <button style="background-color: white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><ion-icon style="color: black; font-size: 1.4vw;" name="close-outline"></ion-icon></span>
                                            </button>
                                            <div class="modal-body" >
                                                <p><b>ATENÇÃO:</b> O seu cargo na empresa não é algo que você pode mudar diretamente em seu perfil, apenas outro profissional autorizado pode realizar a mudança de seu cargo.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Input da Função -->
                                <div class="input-group">
                                    <input required="" type="text" name="text" placeholder="<?php echo $row['funcao']; ?>" autocomplete="off" class="input" disabled>
                                    <label class="user-label" style="color: #38B6FF;">Função</label>
                                    <a role="button" id="editar" data-toggle="modal" data-target="#modal_funcao" style="background-color: #38B6FF;">
                                        <ion-icon name="pencil-outline"></ion-icon>
                                    </a>
                                </div>
                                <!-- Modal do funcao  -->
                                <div class="modal fade" id="modal_funcao" tabindex="-1" role="dialog" aria-labelledby="modal_funcao_centro" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-title" id="modal_funcao_titulo" style="display: flex; justify-content: center; align-items: center;">
                                                <img src="../../images/logo_areas.png" width="100vw" alt="">
                                            </div>
                                            <button style="background-color: white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><ion-icon style="color: black; font-size: 1.4vw;" name="close-outline"></ion-icon></span>
                                            </button>
                                            <div class="modal-body" >
                                                <p><b>ATENÇÃO:</b> A sua função na empresa não é algo que você pode mudar diretamente em seu perfil, apenas outro profissional autorizado pode realizar a mudança de sua função.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!-- Dropdown da foto de perfil -->
                            <div style="margin-left: 100px;">
                                <h3>FOTO DE PERFIL</h3>
                                <img src="../../fotos_usuarios/<?php echo $row['imagem']; ?>" alt="Foto de Perfil - <?php echo $row['nome'];?>" class="rounded-circle me-2" id="foto_perfil" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="dropdown">
                                <button class="btn dropdown-toggle" style="background-color: #38B6FF;" id="editarFotoAdm" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span>Editar</span>
                                </button>
                                    <div class="dropdown-menu editarFotoAdm" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#modal_foto">Carregar foto...</a>
                                        <a class="dropdown-item" >Remover foto</a>
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <br>
                        <!-- Modal da foto de perfil -->
                        <div class="modal fade" id="modal_foto" tabindex="-1" role="dialog" aria-labelledby="modal_foto_centro" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-title" id="modal_foto_titulo" style="display: flex; justify-content: center; align-items: center;">
                                        <img src="../../images/logo_areas.png" width="100vw" alt="">
                                    </div>
                                    <button style="background-color: white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><ion-icon style="color: black; font-size: 1.4vw;" name="close-outline"></ion-icon></span>
                                    </button>
                                    <div class="modal-body">
                                        <p><b>ATENÇÃO:</b> Sua foto de perfil só pode ser alterada duas vezes a cada 2 semanas.</p>
                                        <p><b>ALTERAÇÕES RESTANTES:</b> 2</p>
                                        <div class="text-center">
                                            <button class="btn btn-primary">Alterar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="config_perfil.php" method="post" style="margin-right: 15px;">
                            <!-- Começo do Dados Pessoais -->
                            <h3>Dados Pessoais</h3>
                            <p>Gerencie seu nome e informações de contato. Essas informações pessoais são privadas e não serão exibidos para outros usuários. Veja a nossa <a href="../../politica_pivaci.php" id="polit" target="_blank"> Política de Privacidade </a> <ion-icon name="lock-closed-outline"></ion-icon> </p>
                            <br>
                            <div class="d-flex">
                                <!-- Input do CPF -->
                                <div class="group">
                                    <input required="" name="cpf" id="cpf" type="text" class="input" value="<?php echo $row['cpf']; ?>" onkeypress="$(this).mask('000.000.000-00');">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label style="color: #38B6FF;">CPF</label>
                                </div>
                                <!-- Input da Data de Nascimento  -->
                                <div class="group">
                                    <input required="" name="datanasc" id="datanasc" type="text" class="input" value="<?php echo date('d/m/Y', strtotime($row['data_nasc'])); ?>">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label style="color: #38B6FF;">Data de Nascimento</label>
                                </div>
                                <!-- Input do Coren -->
                                <div class="group">
                                    <input required="" name="coren" id="coren" type="text" class="input" value="<?php echo $row['coren'];?>" >
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label style="color: #38B6FF;">Coren</label>
                                </div>
                                <!-- Input do RG  -->
                                <div class="group">
                                    <input required="" name="rg" id="rg" type="text" class="input" value="<?php echo $row['rg'];?>" onkeypress="$(this).mask('00.000.000-0');">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label style="color: #38B6FF;">RG</label>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex">
                                <!-- Input da Data de Entrada -->
                                <div class="group">
                                    <input required="" name="data_inicio" id="data_inicio" type="text" class="input" value="<?php echo date('d/m/Y', strtotime($row['data_entrada']));?>">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label style="color: #38B6FF;">Data de Entrada</label>
                                </div>
                                <!-- Input do CRM  -->
                                <div class="group">
                                    <input required="" name="crm" id="crm" type="text" class="input" value="<?php echo $row['CRM'];?>">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label style="color: #38B6FF;">CRM</label>
                                </div>
                            </div>
                            <br>
                            <!-- Começo da área de Endereço  -->
                            <div>
                                <h4>ENDEREÇO</h4>
                                <br>
                                <div class="d-flex">
                                    <!-- Input do telefone  -->
                                    <div class="group">
                                        <input required="" name="logradouro" id="logradouro" type="text" class="input" value="<?php echo $row['logradouro'];?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="color: #38B6FF;">Logradouro</label>
                                    </div>
                                    <!-- Input do numero da casa -->
                                    <div class="group">
                                        <input required="" name="numero" id="numero" type="text" class="input"value="<?php echo $row['numero'];?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="color: #38B6FF;">Numero</label>
                                    </div>
                                    <!-- Input da Cidade  -->
                                    <div class="group">
                                        <input required="" name="cidade" id="cidade" type="text" class="input"value="<?php echo $row['cidade'];?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="color: #38B6FF;">Cidade</label>
                                    </div>
                                    <!-- Input do UF  -->
                                    <div class="group">
                                        <input required="" name="uf" id="uf" type="text" class="input"value="<?php echo $row['uf'];?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="color: #38B6FF;">UF</label>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex">
                                    <!-- Input do cep  -->
                                    <div class="group">
                                        <input required="" name="cep" id="cep" type="text" class="input"value="<?php echo $row['cep'];?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="color: #38B6FF;">CEP</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <!-- Começo da área de Telefone e Email  -->
                            <div>
                                <h4>CONTATO</h4>
                                <br>
                                <div class="d-flex">
                                    <!-- Input do telefone  -->
                                    <div class="group">
                                        <input required="" name="telefone" id="telefone" type="tel" class="input" value="<?php echo $row['telefone'];?>" onkeypress="$(this).mask('(00)00000-0000');">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="color: #38B6FF;">Telefone</label>
                                    </div>
                                    <!-- Input do Email  -->
                                    <div class="group">
                                        <input required="" name="email" id="email" type="email" class="input" value="<?php echo $row['email'];?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="color: #38B6FF;">Email</label>
                                    </div>
                                </div>
                                <br>
                                <!-- Botões de Descartar e Manter Alterações -->
                                <div>
                                    <button type="button" class="btn btn-secondary">Descartar Alterações</button>
                                    <button type="button" class="btn" style="background-color: #38B6FF;">Manter Alterações</button>
                                </div>
                                <br>
                                <br>
                                <!-- Texto dos direitos reservados -->
                                <div class="text-center">
                                    <p> <img src="../../images/logo_areas.png" width="20vw" alt="Logo do Tratferi"> TRATFERI - TODOS OS DIREITOS RESERVADOS.</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- fim configurações de perfil  -->
    </div>
</body>
<!-- Links para a Biblioteca de icones do Ionic Icons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- link para bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min-js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).on('ready',function(){
        $(".regular").slick({
            dots: true,
            infinity: true,
            slidesToShow: 3,
            slidesToScroll: 3
        });
    });
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick/slick.min.js"></script>
<script type="text/javascript">
    $('.delete').on('click',function(){
        var nome = $(this).data('nome'); //busca o nome com a descrição (data-nome)
        var id = $(this).data('id'); // busca o id (data-id)
        //console.log(id + ' - ' + nome); //exibe no console
        $('span.nome').text(nome); // insere o nome do item na confirmação
        $('a.delete-yes').attr('href','usuario_excluir.php?id='+id); //chama o arquivo php para excluir o produto
        $('#modalEdit').modal('show'); // chamar o modal
    });
</script>
<!-- Links para jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</html>