<?php 
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php';
    if(isset($_POST['atualizar'])){
        $id_paciente = $_POST['id_paciente']; 
        $nome = $_POST['nome'];
        $data_nasc = $_POST['data_nasc'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $card_SUS = $_POST['card_SUS'];
    
            $id = $_POST['id_paciente']; 
            $updateSql = "update paciente
                set id = '$id_paciente',
                nome = '$nome',
                data_nasc = '$data_nasc',
                cpf = '$cpf',
                rg = '$rg',
                card_SUS = '$card_SUS'
                where id = $id";
            $resultado = $conn->query($updateSql);
            if($resultado){
                header('location: ../func/pacientes_lista.php');
            }
        }
        if($_GET){
            $id_form = $_GET['id'];
        } else {
            $id_form = 0;
        }
        $lista = $conn->query("select * from paciente where id = $id_form");
        $row = $lista->fetch_assoc();
        $numRow = $lista->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/cadastro.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Editar Paciente</title>
</head>
<body class="fundo_areas">
<div class="fixed-top" style="background-color: #38B6FF;">
        <br> <br>
    </div>
    <?php include 'menu_cadastrar.php' ?>
    <br>
    <br>
    <div class="container mt-4 d-flex justify-content-center">
        <div class="card" style="width: 50%;">
            <h1 class="card-header text-center" style="color: #38B6FF;">Editar Paciente - <?php echo $row['nome']?></h1>
            <div class="card-body">
            <form class="container" style="display: flex; justify-content: flex-start; flex-direction: column;" action="atualizar_paciente.php?id=<?php echo $id_form;?>" method="post" name="form_paciente_atualizar" enctype="multipart/form-data">
            <input type="hidden" name="id_paciente" id="id_paciente" value="<?php echo $row['id'] ?>">
                    <div class="form-row" style="display: flex; justify-content: center; flex-direction: column;">
                        <div class="form-group">
                            <label for="nome">Nome Completo</label>
                            <input type="text" name="nome" maxlength="50" class="form-control" id="nome" value="<?php echo $row['nome']?>" required>
                        </div>
                        <br>
                        <div class="form-group ">
                            <label for="data_nasc">Data de Nascimento</label>
                            <input type="date" name="data_nasc" class="form-control" id="data_nasc" value="<?php echo $row['data_nasc'] ?>" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control" id="cpf" placeholder="Digite o CPF do paciente" value="<?php echo $row['cpf'] ?>" onkeypress="$(this).mask('000.000.000-00');" required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="rg">RG</label>
                            <input type="text" name="rg" class="form-control" id="rg" placeholder="Digite o RG do paciente" value="<?php echo $row['rg'] ?>" onkeypress="$(this).mask('00.000.000-0');" required>
                        </div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="card_SUS">Cartão do SUS</label>
                            <input type="text" name="card_SUS" class="form-control" id="card_SUS" value="<?php echo $row['card_SUS']?>" onkeypress="$(this).mask('000.0000.0000-00');" required>
                        </div>
                        <br>
                    </div>
                    <br>
                    
                    <button class="btn" style="background-color: #38B6FF;" name="atualizar" type="submit">Atualizar</button>
                    
                </form>
            </div>
        </div>
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