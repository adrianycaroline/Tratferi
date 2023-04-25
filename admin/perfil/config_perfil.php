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
<body>
    <?php include 'perfil_menu.php';?>
    <!-- Inicio Configurações de perfil  -->
    <div style="margin-left: 280px; display: flex; justify-content: left;">
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
                                <b><p>ID:</b> <?php echo $row['hash']; ?></p>
                                <div class="input-group">
                                    <input required="" type="text" name="text" placeholder="<?php echo $row['nome']; ?>" autocomplete="off" class="input" disabled>
                                    <label class="user-label">Nome</label>
                                    <a role="button" id="editar" data-toggle="modal" data-target="#modal_nome">
                                        <ion-icon name="pencil-outline"></ion-icon>
                                    </a>
                                </div>
                                <br>
                                <!-- Modal do nome  -->
                                <div class="modal fade" id="modal_nome" tabindex="-1" role="dialog" aria-labelledby="modal_nome_centro" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal_nome_titulo"><img src="../../images/logo_areas.png" width="50vw" alt=""></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="background-color: #EFE9F1;">
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
                                                    <button type="button" class="btn btn-primary">Manter Alterações</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input required="" type="text" name="text" placeholder="<?php echo $row['periodo']; ?>" autocomplete="off" class="input" disabled>
                                    <label class="user-label">Período</label>
                                    <a role="button" id="editar" data-toggle="modal" data-target="#modal_periodo">
                                        <ion-icon name="pencil-outline"></ion-icon>
                                    </a>
                                </div>
                                <br>
                                <!-- Modal do periodo  -->
                                <div class="modal fade" id="modal_periodo" tabindex="-1" role="dialog" aria-labelledby="modal_periodo_centro" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal_periodo_titulo"><img src="../../images/logo_areas.png" width="50vw" alt=""></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="background-color: #EFE9F1;">
                                                <p><b>ATENÇÃO:</b> O seu período de trabalho não é algo que você pode mudar diretamente em seu perfil, apenas outro profissional autorizado pode realizar a mudança de seu horario de expediente.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input required="" type="text" name="text" placeholder="<?php echo $row['cargo']; ?>" autocomplete="off" class="input" disabled>
                                    <label class="user-label">Cargo</label>
                                    <a role="button" id="editar" data-toggle="modal" data-target="#modal_cargo">
                                        <ion-icon name="pencil-outline"></ion-icon>
                                    </a>
                                </div>
                                <br>
                                <!-- Modal do cargo  -->
                                <div class="modal fade" id="modal_cargo" tabindex="-1" role="dialog" aria-labelledby="modal_cargo_centro" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal_cargo_titulo"><img src="../../images/logo_areas.png" width="50vw" alt=""></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="background-color: #EFE9F1;">
                                                <p><b>ATENÇÃO:</b> O seu cargo na empresa não é algo que você pode mudar diretamente em seu perfil, apenas outro profissional autorizado pode realizar a mudança de seu cargo.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input required="" type="text" name="text" placeholder="<?php echo $row['funcao']; ?>" autocomplete="off" class="input" disabled>
                                    <label class="user-label">Função</label>
                                    <a role="button" id="editar" data-toggle="modal" data-target="#modal_funcao">
                                        <ion-icon name="pencil-outline"></ion-icon>
                                    </a>
                                </div>
                                <!-- Modal do funcao  -->
                                <div class="modal fade" id="modal_funcao" tabindex="-1" role="dialog" aria-labelledby="modal_funcao_centro" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal_funcao_titulo"><img src="../../images/logo_areas.png" width="50vw" alt=""></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="background-color: #EFE9F1;">
                                                <p><b>ATENÇÃO:</b> A sua função na empresa não é algo que você pode mudar diretamente em seu perfil, apenas outro profissional autorizado pode realizar a mudança de sua função.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div style="margin-left: 100px;">
                                <h3>FOTO DE PERFIL</h3>
                                <img src="../../fotos_usuarios/<?php echo $row['imagem']; ?>" alt="Foto de Perfil - <?php echo $row['nome'];?>" class="rounded-circle me-2" id="foto_perfil" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <form action="perfil_adm_conteudo.php" method="post" style="margin-right: 15px;">
                            <h3>Dados Pessoais</h3>
                            <p>Gerencie seu nome e informações de contato. Essas informações pessoais são privadas e não serão exibidos para outros usuários. Veja a nossa <a href="../../politica_pivaci.php" id="polit" target="_blank"> Política de Privacidade </a> <ion-icon name="lock-closed-outline"></ion-icon> </p>
                            <br>
                            <div class="d-flex">
                                <div class="group">
                                    <input required="" name="cpf" id="cpf" type="text" class="input" value="<?php echo $row['cpf']; ?>" onkeypress="$(this).mask('000.000.000-00');">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>CPF</label>
                                </div>
                                <div class="group">
                                    <input required="" name="datanasc" id="datanasc" type="text" class="input" value="<?php echo date('d/m/Y', strtotime($row['data_nasc'])); ?>">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Data de Nascimento</label>
                                </div>
                                <div class="group">
                                    <input required="" name="coren" id="coren" type="text" class="input" value="<?php echo $row['coren'];?>" >
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Coren</label>
                                </div>
                                <div class="group">
                                    <input required="" name="rg" id="rg" type="text" class="input" value="<?php echo $row['rg'];?>" onkeypress="$(this).mask('00.000.000-0');">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>RG</label>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex">
                                <div class="group">
                                    <input required="" name="data_inicio" id="data_inicio" type="text" class="input" value="<?php echo date('d/m/Y', strtotime($row['data_entrada']));?>">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Data de Entrada</label>
                                </div>
                                <div class="group">
                                    <input required="" name="crm" id="crm" type="text" class="input" value="<?php echo $row['CRM'];?>">
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
                                        <input required="" name="logradouro" id="logradouro" type="text" class="input" value="<?php echo $row['logradouro'];?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Logradouro</label>
                                    </div>
                                    <div class="group">
                                        <input required="" name="numero" id="numero" type="text" class="input"value="<?php echo $row['numero'];?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Numero</label>
                                    </div>
                                    <div class="group">
                                        <input required="" name="cidade" id="cidade" type="text" class="input"value="<?php echo $row['cidade'];?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Cidade</label>
                                    </div>
                                    <div class="group">
                                        <input required="" name="uf" id="uf" type="text" class="input"value="<?php echo $row['uf'];?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>UF</label>
                                    </div>
                                </div>
                                <br>
                                <div class="d-flex">
                                    <div class="group">
                                        <input required="" name="cep" id="cep" type="text" class="input"value="<?php echo $row['cep'];?>">
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
                                        <input required="" name="telefone" id="telefone" type="tel" class="input" value="<?php echo $row['telefone'];?>" onkeypress="$(this).mask('(00)00000-0000');">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Telefone</label>
                                    </div>
                                    <div class="group">
                                        <input required="" name="email" id="email" type="email" class="input" value="<?php echo $row['email'];?>">
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
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</html>