<?php 
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php';
    $lista = $conn->query("SELECT * FROM funcionario where ativo = 0");
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
    <title>Lista de Funcionarios Arquivados</title>
</head>
<body class="fundo_areas">
    <?php include '../admin/menu_adm.php';?>
    <div style="margin-left: 280px; bottom: 0;">
        <div class="bg-dark">
            <br><br>
        </div>
        <main class="container">
            <br>
            <h2 class="text-center">Lista de Funcionarios Arquivados</h2>
            <div class="border-bottom border-2 border-dark" style="width: 97%; margin-left: 15px; margin-bottom: 10px;"></div>
            <?php if ($rows > 0) { ?>
                <table class="table table-hover table-condensed tb-opacidade">
                    <thead>
                        <th hidden>ID</th>
                    <th>Nome</th>
                    <th>Nivel</th>
                    <th>CPF</th>
                    <th>Cargo</th>
                    <th>Salario</th>
                    <th>Periodo</th>
                    <th>Hashcode</th>
                </thead>
                <tbody>
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
                                <a href="funcionarios_restaurar.php?id=<?php echo $row['id']; ?>" role="button" class="btn btn-success btn-block btn-xs"> 
                                    <ion-icon name="refresh-outline"></ion-icon>
                                    <span class="hidden-xs">RESTAURAR</span>
                                </a>
                                <button data-nome="<?php echo $row['nome']; ?>" 
                                data-id="<?php echo $row['id']; ?>"
                                class="delete btn btn-xs btn-block btn-danger">
                                <ion-icon name="trash-outline"></ion-icon>
                                <span class="hidden-xs">EXCLUIR</span>
                            </button>
                            </td>
                        </tr>
                    <?php }while($row = $lista->fetch_assoc())?>
                </tbody>
            </table>
            <?php }else {?>
                <div class="text-center">
                    <h3>NÃO EXISTEM FUNCIONARIOS ARQUIVADOS.</h3>
                </div>
            <?php }?>
        </main>
    </div>
     <!-- inicio do modal para excluir... -->
     <div class="modal fade" id="modalEdit" role="dialog">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    Deseja mesmo excluir o Funcionario?
                    <h4><span class="nome text-danger"></span></h4>
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-success delete-yes">
                        Confirmar
                    </a>
                    <button class="btn btn-danger" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
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
</html>