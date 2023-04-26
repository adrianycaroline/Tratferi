<?php 
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php';
    $lista = $conn->query("SELECT * FROM funcionario where ativo = 1"); //Seleciona todos os funcionarios que estejam ativos.
    $row = $lista->fetch_assoc();
    $rows = $lista->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Lista de Funcionarios Ativos</title>
</head>
<body class="fundo_adm">
    <?php include '../admin/menu_adm.php';?>
    <div style="margin-left: 280px; bottom: 0;">
        <div class="bg-dark">
            <br><br>
        </div>
        <main class="container">
            <br>
            <h2 class="text-center" style="color: #38B6FF;">Lista de Funcionarios Ativos</h2>
            <br>
            <div class="border-bottom border-2 border-dark" style="width: 97%; margin-left: 15px; margin-bottom: 10px;"></div>
            <table class="table table-hover table-condensed tb-opacidade">
                <thead>
                    <th hidden>ID</th>
                    <th style="color: #1d5f96;">Nome</th>
                    <th style="color: #1d5f96;">Nivel</th>
                    <th style="color: #1d5f96;">CPF</th>
                    <th style="color: #1d5f96;">Cargo</th>
                    <th style="color: #1d5f96;">Salario</th>
                    <th style="color: #1d5f96;">Periodo</th>
                    <th>Hashcode</th>
                    <th class="d-flex">
                        <a href="../admin/cadastrar_funcionario.php" target="_self" class="btn btn-block btn-xs" style="background-color: #38B6FF;" role="button">
                            <ion-icon name="add-circle-outline"></ion-icon>
                            <span class="hidden-xs">ADICIONAR</span>
                        </a>
                    </th>
                </thead>
                <tbody>
                    <!-- Estrutura de Repetição -->
                    <?php do {?>
                        <tr>
                            <td hidden><?php echo $row['id'];?></td>
                            <td><?php echo $row['nome'];?></td>
                            <td><?php echo $row['adm'];?></td>
                            <td><?php echo $row['cpf'];?></td>
                            <td><?php echo $row['cargo'];?></td>
                            <td><?php echo $row['salario'];?></td>
                            <td><?php echo $row['periodo'];?></td>
                            <td><?php echo $row['hash'];?></td>
                            <td>
                                <!-- Condição que verifica se o usuário logado é o mesmo que o que for clicado para alterar -->
                                <?php if ($_SESSION['Id'] != $row['id']){ ?>
                                <a href="atualizar_funcionario.php?id=<?php echo $row['id']; ?>" role="button" class="btn btn-block btn-xs" style="background-color: #66CDAA;"> 
                                    <ion-icon name="refresh-outline"></ion-icon>
                                    <span class="hidden-xs">ALTERAR</span>
                                </a>
                                <?php }else{ ?>  
                                <a data-toggle="modal" data-target="#modal_user_igual" role="button" class="btn btn-block btn-xs" style="background-color: #66CDAA;"> 
                                    <ion-icon name="refresh-outline"></ion-icon>
                                    <span class="hidden-xs">ALTERAR</span>
                                </a>  
                                <?php } ?>
                            </td>
                        </tr>
                    <?php }while($row = $lista->fetch_assoc())?> <!-- Fim da Estrutura de repetição -->
                </tbody>
            </table>
            <!-- Modal do user_igual  -->
            <div class="modal fade" id="modal_user_igual" tabindex="-1" role="dialog" aria-labelledby="modal_user_igual_centro" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal_user_igual_titulo"><img src="../../images/logo_areas.png" width="50vw" alt=""></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="background-color: #EFE9F1;">
                            <p><b>ATENÇÃO:</b> Não é possível modificar seu próprio usuário.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
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