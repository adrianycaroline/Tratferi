<?php
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php';

    $lista = $conn->query("SELECT *, end_func.frmPreenchido as preenchido FROM funcionario 
    LEFT JOIN end_func ON (funcionario.id = end_func.id_func) where id_func = ".$_SESSION['Id'].";");
    $row = $lista->fetch_assoc();
    $rows = $lista->num_rows;

    $formulario_preenchido = $row['preenchido'];

    if(isset($_POST['dados_endereco_primeiro_acesso'])){
        //Endereço
        $cep = $_POST['cep_end'];
        $logradouro = $_POST['logradouro'];
        $numero = $_POST['numero'];
        $cidade = $_POST['cidade'];
        $uf = $_POST['uf'];

        $sql_End = "UPDATE end_func
        set logradouro = '$logradouro',
        numero = '$numero',
        cidade = '$cidade',
        uf = '$uf',
        cep = '$cep',
        frmPreenchido = 'Sim'
        where id_func = ".$_SESSION['Id'].";";

        $resultadoEnd = $conn->query($sql_End);
        
        if($resultadoEnd){
            header('location: index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <!-- Jquery para o modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <title>Área Administrativa - <?php echo($_SESSION['nome']); ?></title>
</head>
<body class="fundo_adm">
    <?php include 'menu_adm.php'; ?>
    <?php include '../admin/adm_options.php';?>


    <div class="modal fade" id="modal_end" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Preencha as Informações Abaixo</h5>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="index.php" id="formulario" method="post" enctype="multipart/form-data">
                            <!-- input que pega o cep -->
                            <div class="form-group">
                                <label for="cep_end">CEP</label>
                                <input class="form-control" name="cep_end" id="cep_end" type="text" required>
                            </div>
                            <div class="form-group">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" class="form-control" name="logradouro" id="logradouro" required>
                            </div>
                            <div class="form-group">
                                <label for="numero">Numero</label>
                                <input type="text" class="form-control" name="numero" id="numero" required>
                            </div>
                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control" name="cidade" id="cidade" required>
                            </div>
                            <div class="form-group">
                                <label for="uf">UF</label>
                                <input type="text" class="form-control" name="uf" id="uf" required>
                            </div>
                            <br>
                            <div class="text-center">
                                <p>Antes de continuar, pedimos para que você vá até configurações de perfil e altere sua senha por segurança.</p>
                            </div>
                            <br>
                            <button type="submit" name="dados_endereco_primeiro_acesso" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if($formulario_preenchido == "Não"){?>
        <script>
            $(document).ready(function() { 
                $('#modal_end').modal({
                backdrop: 'static',
                keyboard: false
            }); 
        });
        </script>
        <script>
        // Adicione um evento para o botão "Enviar" no formulário
        $('#formulario').submit(function(e) {
            // Verifique se todos os campos obrigatórios foram preenchidos
            if ($('#cep_end').val() == '' || $('#logradouro').val() == '' || $('#numero').val() == '' || $('#cidade').val() == '' || $('#uf').val() == '') {
                alert('Por favor, preencha todos os campos obrigatórios.');
                e.preventDefault(); // Impede que o formulário seja enviado
            } else {
                $(document).ready(function(){
                    // Feche o modal
                    $('#modal').modal('hide');
                });
            }
        });
    </script>
    <?php } ?>
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

