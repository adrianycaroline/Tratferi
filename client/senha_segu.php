<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="../CSS/estilo_perfil.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <title>Senha e Segurança - <?php echo $_SESSION['nome'];?></title>
</head>
<body class="fundo_adm">
    <?php include 'perfil_menu.php';?>
    <div style="margin-left: 280px;">
        <div class="container">
            <div style="margin-top: 10px;">
                <h2 class="text-center" style="color: #38B6FF;">Alterar Senha</h2>
                <p class="text-center">Para sua segurança, recomendamos enfaticamente que escolha uma senha única,
                    que não seja usada para nenhuma outra conta on-line. 
                    <ion-icon name="lock-closed-outline"></ion-icon> 
                </p>
                <div class="border-bottom border-2 border-dark" style="width: 97%; margin-left: 15px; margin-bottom: 10px;"></div>
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
                <div style="margin-left: 100px; border-left: 1px solid black; padding-left: 20px;">
                    <h5>SUA SENHA</h5>
                    <br><br>
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
</body>
<!-- Links para a Biblioteca de icones do Ionic Icons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- link para bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
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