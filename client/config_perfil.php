<?php
    include '../admin/acesso_com_pac.php';
    include '../connection/connect.php';

    // Alterar Dados pessoais
    if(isset($_POST['manter_dados'])){
        //Endereço
        $cep = $_POST['cep_end'];
        $logradouro = $_POST['logradouro'];
        $numero = $_POST['numero'];
        $cidade = $_POST['cidade'];
        $uf = $_POST['uf'];
        //contato
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        $sql_Tel = "UPDATE tel_paciente
        set telefone = '$telefone'
        where id_paci = ".$_SESSION['Id'].";";

        $sql_End = "UPDATE end_paciente
        set logradouro = '$logradouro',
        numero = '$numero',
        cidade = '$cidade',
        uf = '$uf',
        cep = '$cep'
        where id_paci = ".$_SESSION['Id'].";";

        $sql_Email = "UPDATE email_paciente
        set email = '$email'
        where id_paci = ".$_SESSION['Id'].";";

        $resultadoTel = $conn->query($sql_Tel);
        $resultadoEnd = $conn->query($sql_End);
        $resultadoEmail = $conn->query($sql_Email);
        
        if($resultadoTel && $resultadoEnd && $resultadoEmail){
            header('location: config_perfil.php');
        }
        
    }
    //Código para a foto funcionar
    if(isset($_POST['alterar'])){ //Seleciona o formulário da foto
        if($_FILES['imagem_perfil']['name']) {
            $nome_img = $_FILES['imagem_perfil']['name']; //Pega o nome do arquivo selecionado
            $tmp_img = $_FILES['imagem_perfil']['tmp_name'];
            $dir_img = "../fotos_usuarios/$nome_img"; //Local onde a imagem vai ser armazenada
            move_uploaded_file($tmp_img, $dir_img); //Adciona o arquivo na pasta
            $imagem_perfil = $nome_img;
            $updateSql = "UPDATE funcionario set imagem = '$nome_img' where id = ".$_SESSION['Id'].";"; //Adiciona a imagem no banco
        } else {
            $imagem_perfil = "user_sem_foto.png";
            $updateSql = "UPDATE funcionario set imagem = '$imagem_perfil' where id = ".$_SESSION['Id'].";";
        }

        $resultado = $conn->query($updateSql);
        if($resultado){
            $_SESSION['Imagem'] = $nome_img; // Atualiza o valor da imagem na sessão
            header('location: config_perfil.php');
        }
    }
    
    //código busca o cep
    if(isset($_POST['cep'])){
        $cep = $_POST['cep'];
        $url = "https://viacep.com.br/ws/$cep/json/";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);
    
        if(isset($data['erro'])){
            header('location: config_perfil.php?cep=n');
        } else {
            $logradouro = isset($data['logradouro']) ? $data['logradouro'] : '';
            $cidade = isset($data['localidade']) ? $data['localidade'] : '';
            $uf = isset($data['uf']) ? $data['uf'] : '';
        }
    }

    
            
    $lista = $conn->query("SELECT * FROM perfil_paci where id = ".$_SESSION['Id'].";");
    $row = $lista->fetch_assoc();
    $rows = $lista->num_rows;
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
                                <h3 style="color: #1d5f96;">INFORMAÇÕES DA CONTA</h3>
                                <b><p>ID:</b> <?php echo $row['hash']; ?></p>
                                <!-- Input do Nome -->
                                <div class="input-group">
                                    <input required="" type="text" name="text" placeholder="<?php echo $row['nome']; ?>" autocomplete="off" class="input4" disabled>
                                    <label class="user-label" style="color: #38B6FF;">Nome</label>
                                </div>
                                <br>
                            </div> 
                            <!-- Dropdown da foto de perfil -->
                            <div style="margin-left: 100px;">
                                <h3 style="color: #1d5f96;">FOTO DE PERFIL</h3>
                                <img src="../fotos_usuarios/<?php echo $row['imagem']; ?>" alt="Foto de Perfil - <?php echo $row['nome'];?>" class="rounded-circle me-2" id="foto_perfil" data-bs-toggle="dropdown" aria-expanded="false">
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
                        
                        <!-- Começo do Dados Pessoais -->
                        <h3 style="color: #1d5f96;">Dados Pessoais</h3>
                        <p>Gerencie seu nome e informações de contato. Essas informações pessoais são privadas e não serão exibidos para outros usuários. Veja a nossa <a href="../politica_pivaci.php" id="polit" target="_blank"> Política de Privacidade </a> <ion-icon name="lock-closed-outline"></ion-icon> </p>
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
                            <!-- Input do RG  -->
                            <div class="group">
                                <input required="" name="rg" id="rg" type="text" class="input" value="<?php echo $row['rg'];?>" onkeypress="$(this).mask('00.000.000-0');">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label style="color: #38B6FF;">RG</label>
                            </div>
                        </div>
                        <br>
                        <!-- Fomrulário de busca por CEP -->
                        <div>
                            <h4 style="color: #1d5f96;" id="titulo_endereco">ENDEREÇO</h4>
                            <form action="config_perfil.php" method="post" enctype="multipart/form-data">    
                                <!-- Input do cep  -->
                                <div id="group" style="margin-top: 20px; flex-direction: row;">
                                    <div>
                                        <input required="" name="cep" id="cep" type="text" class="input" value="<?php echo $row['cep'];?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="color: #38B6FF;">CEP</label>
                                    </div>    
                                    <button type="submit" id="cepBTN" onclick="buscarEndereco()">
                                        <ion-icon name="search-outline"></ion-icon>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- Começo da área de Endereço  -->
                        <form action="config_perfil.php" method="post" enctype="multipart/form-data" onsubmit="return validaForm()">
                            <div>
                                <div style="display: flex; flex-wrap: wrap;">
                                    <input name="cep_end" id="cep_end" value="<?php if(isset($cep)) { echo $cep; } ?>" type="text" hidden>
                                    <!-- Input do logradouro  -->
                                    <div class="group" style="margin-top: 20px;">
                                        <input required="" name="logradouro" id="logradouro" type="text" class="input" value="<?php echo $row['logradouro'];?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="color: #38B6FF;">Logradouro</label>
                                    </div>
                                    <!-- Input do numero da casa -->
                                    <div class="group" style="margin-top: 20px;">
                                        <input required="" name="numero" id="numero" type="text" class="input"value="<?php echo $row['numero'];?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="color: #38B6FF;">Numero</label>
                                    </div>
                                    <!-- Input da Cidade  -->
                                    <div class="group" style="margin-top: 20px;">
                                        <input required="" name="cidade" id="cidade" type="text" class="input"value="<?php echo $row['cidade'];?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="color: #38B6FF;">Cidade</label>
                                    </div>
                                    <!-- Input do UF  -->
                                    <div class="group" style="margin-top: 20px;">
                                        <input required="" name="uf" id="uf" type="text" class="input"value="<?php echo $row['uf'];?>">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="color: #38B6FF;">UF</label>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <!-- Começo da área de Telefone e Email  -->
                            <div>
                                <h4 id="contato" style="color: #1d5f96;">CONTATO</h4>
                                <div style="display: flex; flex-wrap: wrap;">
                                    <!-- Input do telefone  -->
                                    <div class="group" style="margin-top: 20px;">
                                        <input required="" name="telefone" id="telefone" type="tel" class="input" value="<?php echo $row['telefone'];?>" onkeypress="$(this).mask('(00)00000-0000');">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label style="color: #38B6FF;">Telefone</label>
                                    </div>
                                    <!-- Input do Email  -->
                                    <div class="group" style="margin-top: 20px;">
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
                                    <button name="manter_dados" type="submit" class="btn" style="background-color: #38B6FF;">Manter Alterações</button>
                                </div>
                                <br>
                                <br>
                                <!-- Texto dos direitos reservados -->
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
    </div>

    <!-- //////////////////////////// TODOS OS MODAIS ///////////////////////////////////////// -->

    <div class="modal fade" id="modal_foto" tabindex="-1" role="dialog" aria-labelledby="modal_foto_centro" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-title" id="modal_foto_titulo" style="display: flex; justify-content: center; align-items: center;">
                        <img src="../images/logo_areas.png" width="100vw" alt="">
                    </div>
                    <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                    </button>
                    <div class="modal-body">
                        <!-- Formulário para trocar a foto de perfil -->
                        <form action="config_perfil.php" method="post" enctype="multipart/form-data">
                            <div class="text-center">
                                <h3>Alterar Foto</h3>
                            </div>    
                            <!-- Imagem Atual -->
                            <label for="imagem_perfil_atual">Foto de Perfil Atual:</label><br>
                            <img src="../fotos_usuarios/<?php echo $row['imagem']; ?>" width="30%" class="img-responsive" alt="" srcset="">
                            <input type="hidden" name="imagem_perfil_atual" id="imagem_perfil_atual" value="<?php echo $row['imagem'];?>">
                            <br> <br>
                            <!-- Imagem Nova -->
                            <label for="imagem_perfil">Nova Foto de Perfil:</label>
                            <input type="file" name="imagem_perfil" id="imagem_perfil" class="form-control" accept="image/*"><!-- Input que escolhe a foto de perfil -->
                            <br>
                            <div class="text-center">
                                <button class="btn btn-primary" name="alterar" type="submit">Alterar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal não encontrou cep -->
        <div class="modal fade" id="modal_cep_n" tabindex="-1" role="dialog" aria-labelledby="modal_cep_n_centro" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-title" id="modal_cep_n_titulo" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                        <img c src="../images/logo_areas.png" width="100vw" alt="">
                        <h5>Buscar CEP</h5>
                        <button style="background-color: white; border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><ion-icon style="color: black; font-size: 2vw;" name="close-outline"></ion-icon></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Erro ao buscar CEP. Verifique se o CEP digitado está correto.</p>        
                        <div style="display: flex; justify-content: end;">
                            <button  type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- código para o Modal não encontrou cep -->
        <?php if(isset($_GET['cep']) && ($_GET['cep'] == "n")){?>
            <script>
                $(document).ready(function() {
                    $('#modal_cep_n').modal('show');
                });
            </script>
        <?php }?>  
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
<script>
    document.getElementById('logradouro').value = '<?php echo $logradouro; ?>'; 
    document.getElementById('cidade').value = '<?php echo $cidade; ?>';
    document.getElementById('uf').value = '<?php echo $uf; ?>';
    document.getElementById('numero').value = 'Digite o número'
</script>
<script>
    function validaForm() {
        var numero = document.getElementById("numero");
        if (numero.value === "Digite o número") {
            alert("Por favor, digite um número de endereço válido .");
            return false;
        }
        return true;
    }
    </script>
</html>