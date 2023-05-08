<?php 
    include '../admin/acesso_com_pac.php';
    include '../connection/connect.php';
    
    if (isset($_POST['mudar_senha'])) {
        // definição das variáveis
        $senhaAtual = $_POST['senhaAtual'];
        $senhaNova = $_POST['senhaNova'];
        $senhaNovaDenovo = $_POST['senhaNovaDenovo'];

        // criptografia da senha 
            $senhafinal = md5($senhaAtual);
        // Limita a senha a 12 caracteres
            $hash_md5_12 = substr($senhafinal, 0, 12);

        // Seleciona o cpf do usuário logado
            $selectCpf = $conn->query("SELECT cpf FROM paciente WHERE id = ".$_SESSION['Id'].";");
            $cpf = $selectCpf->fetch_assoc()['cpf'];
        // remove o ponto do cpf
            $cpf_semPonto = str_replace('.', '', $cpf);
        // pega só os 5 primeiros caracteres do cpf
            $cpf_cortado = substr($cpf_semPonto, 0, 5);
        // criptografa a os 5 primeiros caracteres do cpf
            $cpf_quase_final = md5($cpf_cortado);
        // limita o hash a 5 caracteres
            $cpf_final = substr($cpf_quase_final, 0, 5);
        // Cria uma criptografia da senha com 'PA' para indicar que é um paciente, o id do paciente,
        // o hash da senha, TRAT para indicar que é da tratferi e os 5 primeiros caracteres do cpf
            $senha_criptografada = 'PA' . $_SESSION['Id'] . $hash_md5_12 . 'TRAT-' . $cpf_final; 

        // Descriptografa a senha do banco
        $selectSenha = $conn->query("SELECT senha from login_paci WHERE id_paci = ".$_SESSION['Id'].";");
        $senha_do_Banco = $selectSenha->fetch_assoc()['senha'];
        


        // Verifica se a senha atual digitada é igual a senha armazenada no banco
        if ($senha_do_Banco == $senha_criptografada) {
            
            // verifica se a senha nova digitada é igual a confirmação da senha nova digitada
            if ($senhaNova == $senhaNovaDenovo){
                // verifica se a nova senha é diferente das últimas 5 senhas usadas
                $resultado = $conn->query("SELECT senha FROM login_paci WHERE id_paci = ".$_SESSION['Id']." LIMIT 5;");
                $senhas_usadas = array();
                while ($row = $resultado->fetch_assoc()) {
                    $senhas_usadas[] = $row['senha'];
                }
                
                if (in_array($senhaNova, $senhas_usadas)) {
                    header('location: senha_segu.php?senhaUsada=n');
                    exit();
                }
                
                // verifica se a nova senha tem mais de 7 caracteres
                if (strlen($senhaNova) < 8) {
                    header('location: senha_segu.php?senhaCaracteres=n');
                    exit();
                }
                
                // verifica se a nova senha contém pelo menos 1 número
                if (!preg_match('/\d/', $senhaNova)) {
                    header('location: senha_segu.php?senhaNumero=n');
                    exit();
                }
                
                // verifica se a nova senha contém espaços
                if (strpos($senhaNova, ' ') !== false) {
                    header('location: senha_segu.php?senhaEspaco=n');
                    exit();
                }

                // criptografia da senha 
                    $senhafinal = md5($senhaNova);
                // Limita a senha a 12 caracteres
                    $hash_md5_12 = substr($senhafinal, 0, 12);

                // Seleciona o cpf do usuário logado
                    $selectCpf = $conn->query("SELECT cpf FROM paciente WHERE id = ".$_SESSION['Id'].";");
                    $cpf = $selectCpf->fetch_assoc()['cpf'];
                // remove o ponto do cpf
                    $cpf_semPonto = str_replace('.', '', $cpf);
                // pega só os 5 primeiros caracteres do cpf
                    $cpf_cortado = substr($cpf_semPonto, 0, 5);
                // criptografa a os 5 primeiros caracteres do cpf
                    $cpf_quase_final = md5($cpf_cortado);
                // limita o hash a 5 caracteres 
                    $cpf_final = substr($cpf_quase_final, 0, 5);
                // Cria uma criptografia da senha com 'PA' para indicar que é um paciente, o id do paciente,
                // o hash da senha, TRAT para indicar que é da tratferi e os 5 primeiros caracteres do cpf
                    $senha_criptografada = 'PA' . $_SESSION['Id'] . $hash_md5_12 . 'TRAT-' . $cpf_final; 
                
                // Atualiza a senha do usuário logado
                $updateSenha = "UPDATE login_paci SET senha = '".$senha_criptografada."' WHERE id_paci = ".$_SESSION['Id'].";";
                $confirmaUpdate = $conn->query($updateSenha);
                
                // se o update der resultado atualiza a página
                if($confirmaUpdate){
                    header('location: senha_segu.php?senhaAtualizada=s');
                }else{
                    header('location: senha_segu.php?senhaAtualizada=n');
                }
            }else{
                // se as senhas novas digitadas não forem iguais abre modal
                header('location: senha_segu.php?senhasNovasIguais=n');
            }
        }else{
            // Se a senha atual digitada não for igual a do banco abre o modal
            header('location: senha_segu.php?senhaAtual=n');
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="../CSS/estilo_perfil.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <!-- Dependencias para o modal abrir -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
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
            <form action="senha_segu.php" method="post" enctype="multipart/form-data">
                <div class="d-flex">
                    <div>
                        <h5 style="color: #1d5f96;">SENHA ATUAL</h5>
                        <small>OBRIGATÓRIO</small>
                        <br>
                        <div class="group">
                            <input required="" name="senhaAtual" id="senhaAtual" type="text" class="input2">
                        </div>
                        <br>
                        <h5 style="color: #1d5f96;">NOVA SENHA</h5>
                        <small>OBRIGATÓRIO</small>
                        <br>
                        <div class="group">
                            <input required="" name="senhaNova" id="senhaNova" type="text" class="input2">
                        </div>
                        <br>
                        <h5 style="color: #1d5f96;">DIGITE A NOVA SENHA NOVAMENTE</h5>
                        <small>OBRIGATÓRIO</small>
                        <br>
                        <div class="group">
                            <input required="" name="senhaNovaDenovo" id="senhaNovaDenovo" type="text" class="input2">
                        </div>
                    </div>
                    <div style="margin-left: 100px; border-left: 1px solid black; padding-left: 20px;">
                        <h5 style="color: #1d5f96;">SUA SENHA</h5>
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
                    <button type="submit" name="mudar_senha" class="btn" style="background-color: #38B6FF;">Manter Alterações</button>
                </div>
            </form>
            <br>
            <br>
            <hr width="">
            <br>
            <div>
                <h3 style="color: #1d5f96;">FINALIZAR SESSÃO EM TODOS OS LUGARES</h3>
                <div class="d-flex">
                    <div>
                        <p>Finalize sessões em qualquer outro local em que a sua conta da <br>
                            TRATFERI esteja sendo usada, incluindo todos os outros <br>
                            navegadores, telefones, consoles ou qualquer outro dispositivo.
                        </p>
                    </div> 
                    <div>
                        <button type="button" class="btn" style="padding: 15px; margin-left: 50px; background-color: #38B6FF;">FINALIZAR OUTRAS SESSÕES</button>
                    </div> 
                </div>
                </div>
                <br>
                <hr width="">
                <div>
                    <h3 style="color: #1d5f96;">AUTENTICAÇÃO DE DOIS FATORES</h3>
                    <p>A Autenticação de Dois Fatores (ADF) pode ser usada para proteger sua conta de acesso não autorizado ao exigir que você insira um código de segurança ao iniciar sessão. Caso tenha algum problema ou dúvidas entre em contato conosco clicando <a href="../contato.php">aqui</a></p>
                    <small>Métodos de Autenticação disponíveis:</small>
                    <br>
                    <br>
                    <div>
                    <h5 style="color: #1d5f96;">APLICATIVO AUTENTICADOR DE TERCEIROS</h5>
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
                    <h5 style="color: #1d5f96;">AUTENTICAÇÃO POR SMS</h5>
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
                    <h5 style="color: #1d5f96;">AUTENTICAÇÃO POR E-MAIL</h5>
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

    <!-- ///////////////////////////////// MODAIS /////////////////////////////////// -->

    <!-- senha Atualizada-->
    <div class="modal fade" id="modal_senha_Atualizada" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-title" id="modal_cadastro_titulo" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <img c src="../images/logo_areas.png" width="100vw" alt="">
                    <h5>SUCESSO!!</h5>
                    <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Sua senha foi alterada com sucesso.</p>        
                    <div style="display: flex; justify-content: end;">
                        <button  type="button" class="btn" data-dismiss="modal" style="background-color: #38B6FF;">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- código para o senha Atualizada -->
        <?php if(isset($_GET['senhaAtualizada']) && ($_GET['senhaAtualizada'] == "s")){?>
            <script>
                $(document).ready(function() {
                    $('#modal_senha_Atualizada').modal('show');
                });
            </script>
        <?php }?>  
    <!-- Fim do senha Atualizada -->

    <!-- senha Atualizada Não-->
    <div class="modal fade" id="modal_senha_Atualizada_n" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-title" id="modal_cadastro_titulo" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <img c src="../images/logo_areas.png" width="100vw" alt="">
                    <h5>ATENÇÃO!!</h5>
                    <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Erro ao atualizar a senha no banco de dados. Por Favor, contate um administrador técnico.</p>        
                    <div style="display: flex; justify-content: end;">
                        <button  type="button" class="btn" style="background-color: #38B6FF;" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- código para o senha Atualizada Não -->
        <?php if(isset($_GET['senhaAtualizada']) && ($_GET['senhaAtualizada'] == "n")){?>
            <script>
                $(document).ready(function() {
                    $('#modal_senha_Atualizada_n').modal('show');
                });
            </script>
        <?php }?>  
    <!-- Fim do senha Atualizada Não -->

    <!-- senha atual diferente da do banco-->
    <div class="modal fade" id="modal_senha_Atual" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-title" id="modal_cadastro_titulo" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <img c src="../images/logo_areas.png" width="100vw" alt="">
                    <h5>ATENÇÃO!!</h5>
                    <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">A senha atual digitada está incorreta.</p>        
                    <div style="display: flex; justify-content: end;">
                        <button  type="button" class="btn" style="background-color: #38B6FF;" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- código para o senha atual diferente da do banco -->
        <?php if(isset($_GET['senhaAtual']) && ($_GET['senhaAtual'] == "n")){?>
            <script>
                $(document).ready(function() {
                    $('#modal_senha_Atual').modal('show');
                });
            </script>
        <?php }?>  
    <!-- Fim do senha atual diferente da do banco -->

    <!-- senha igual as ultimas 5 usadas-->
    <div class="modal fade" id="modal_senha_Usada" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-title" id="modal_cadastro_titulo" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <img c src="../images/logo_areas.png" width="100vw" alt="">
                    <h5>ATENÇÃO!!</h5>
                    <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">A senha nova é igual às ultimas 5 usadas anteriormente.</p>        
                    <div style="display: flex; justify-content: end;">
                        <button  type="button" class="btn" style="background-color: #38B6FF;" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- código para o senha igual as ultimas 5 usadas -->
        <?php if(isset($_GET['senhaUsada']) && ($_GET['senhaUsada'] == "n")){?>
            <script>
                $(document).ready(function() {
                    $('#modal_senha_Usada').modal('show');
                });
            </script>
        <?php }?>  
    <!-- Fim do senha igual as ultimas 5 usadas -->

    <!-- senha com menos de 7 caracteres-->
    <div class="modal fade" id="modal_senha_Caracteres" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-title" id="modal_cadastro_titulo" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <img c src="../images/logo_areas.png" width="100vw" alt="">
                    <h5>ATENÇÃO!!</h5>
                    <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">A senha nova possui menos de 7 caracteres.</p>        
                    <div style="display: flex; justify-content: end;">
                        <button  type="button" class="btn" style="background-color: #38B6FF;" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- código para o senha com menos de 7 caracteres -->
        <?php if(isset($_GET['senhaCaracteres']) && ($_GET['senhaCaracteres'] == "n")){?>
            <script>
                $(document).ready(function() {
                    $('#modal_senha_Caracteres').modal('show');
                });
            </script>
        <?php }?>  
    <!-- Fim do senha com menos de 7 caracteres -->

    <!-- senha com pelo menos 1 numero-->
    <div class="modal fade" id="modal_senha_Numero" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-title" id="modal_cadastro_titulo" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <img c src="../images/logo_areas.png" width="100vw" alt="">
                    <h5>ATENÇÃO!!</h5>
                    <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">A senha nova não possui um numero, por favor utilize pelo menos um número para sua segurança.</p>        
                    <div style="display: flex; justify-content: end;">
                        <button  type="button" class="btn" style="background-color: #38B6FF;" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- código para o senha com pelo menos 1 numero -->
        <?php if(isset($_GET['senhaNumero']) && ($_GET['senhaNumero'] == "n")){?>
            <script>
                $(document).ready(function() {
                    $('#modal_senha_Numero').modal('show');
                });
            </script>
        <?php }?>  
    <!-- Fim do senha com pelo menos 1 numero -->

    <!-- senha não pode ter espaço-->
    <div class="modal fade" id="modal_senha_Espaco" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-title" id="modal_cadastro_titulo" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <img c src="../images/logo_areas.png" width="100vw" alt="">
                    <h5>ATENÇÃO!!</h5>
                    <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">A senha nova não pode possuir espaços.</p>        
                    <div style="display: flex; justify-content: end;">
                        <button  type="button" class="btn" style="background-color: #38B6FF;" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- código para o senha não pode ter espaço -->
        <?php if(isset($_GET['senhaEspaco']) && ($_GET['senhaEspaco'] == "n")){?>
            <script>
                $(document).ready(function() {
                    $('#modal_senha_Espaco').modal('show');
                });
            </script>
        <?php }?>  
    <!-- Fim do senha não pode ter espaço -->

    <!-- senhas novas iguais-->
    <div class="modal fade" id="modal_senha_Nova_iguais" tabindex="-1" role="dialog" aria-labelledby="modal_cadastro_centro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-title" id="modal_cadastro_titulo" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <img c src="../images/logo_areas.png" width="100vw" alt="">
                    <h5>ATENÇÃO!!</h5>
                    <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">A senha nova e a confirmação da mesma não são iguais. Por favor verifique se digitou corretamente a senha.</p>        
                    <div style="display: flex; justify-content: end;">
                        <button  type="button" class="btn" style="background-color: #38B6FF;" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- código para o senhas novas iguais -->
        <?php if(isset($_GET['senhaNovasIguais']) && ($_GET['senhaNovasIguais'] == "n")){?>
            <script>
                $(document).ready(function() {
                    $('#modal_senha_Nova_iguais').modal('show');
                });
            </script>
        <?php }?>  
    <!-- Fim do senhas novas iguais -->
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