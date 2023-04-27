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
                header('location: ../func/pacientes_lista.php?upd=s');
            }else{
                header('location: ../func/pacientes_lista.php?upd=n');
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
    <!-- Menu lateral -->
    <div>
        <div class="d-flex flex-column flex-shrink-0 p-3 " style="position: fixed; top: 0; left: 0; bottom: 0; width: 280px; background-color: #38B6FF; z-index: 9999;">
            <div>
                <figure style="display: flex;">
                    <img src="../images/logoPesq.png" alt="Logo Tratferi" width="75vw"> 
                    <a href="../index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none" style="font-size: 32pt;">
                        Tratferi
                    </a> 
                </figure>
            </div>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="../admin/index.php" class="nav-link" aria-current="page" style="color: #fff;">
                        <img src="../images/dashboard.svg" alt="" width="20vw">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="../admin/cadastrar_funcionario.php" class="nav-link" style="color: #fff;">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                        Cadastrar
                    </a>
                </li>
                <li>
                    <a href="funcionarios_arquivados.php" class="nav-link" style="color: #fff;">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                        Usuarios Arquivados
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link" style="color: #fff;">
                        <img src="../images/cama.svg" alt="" width="20vw">
                        Leitos
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link" style="color: #fff;">
                        <img src="../images/predio.svg" alt="" width="20vw">    
                        Departamentos
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link" style="color: #fff;">
                        <img src="../images/predio.svg" alt="" width="20vw">    
                        Designação
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link" style="color: #fff;">
                        <img src="../images/predio.svg" alt="" width="20vw">    
                        RH
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link" style="color: #fff;">
                        <img src="../images/coracao.svg" alt="" width="20vw">    
                        Ajuda
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link" style="color: #fff;">
                        <img src="../images/anuncio.svg" alt="" width="20vw">
                        Anuncios
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <img src="../fotos_usuarios/<?php echo $_SESSION['Imagem']; ?>" alt="Foto de Perfil - <?php echo $_SESSION['nome']?>" width="32" height="32" class="rounded-circle me-2">
                <strong><a style="text-decoration: none; color: white;"><?php echo $_SESSION['nome'];?></a></strong>
                <button class="dropdown-toggle border-0" style="background-color: #38B6FF; color: white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu user" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="../admin/perfil/config_perfil.php"><ion-icon name="person-outline"></ion-icon>Perfil</a>
                    <a class="dropdown-item" href="../admin/logout_Fun.php"><ion-icon name="exit-outline"></ion-icon>Sair</a>
                </div>
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