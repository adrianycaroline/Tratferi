<?php 
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php';

    // if($_POST){
    //     if(isset($_POST['enviar'])){
    //         $nome_img = $_FILES['imagem_produto']['name'];
    //         $tmp_img = $_FILES['imagem_produto']['tmp_name'];
    //         $dir_img = "../images".$nome_img;
    //         move_uploaded_file($tmp_img, $dir_img);
    //     }
    //     $id_tipo = $_POST['id_tipo_produto'];
    //     $destaque = $_POST['destaque_produto'];
    //     $descri = $_POST['descri_produto'];
    //     $resumo = $_POST['resumo_produto'];
    //     $valor = $_POST['valor_produto'];
    //     $imagem = $_FILES['imagem_produto']['name'];

    //     $insereProd = "INSERT INTO tbprodutos 
    //     (id_tipo_produto, destaque_produto, descri_produto, resumo_produto, valor_produto, imagem_produto)
    //     VALUES
    //     ('$id_tipo','$destaque','$descri','$resumo','$valor','$imagem')
    //     ";
    //     $resultado = $conn->query($insereProd);
    //     // Após a gravação bem sucedida do produto, volta (atualiza) para lista
    //     if(mysqli_insert_id($conn)){
    //         header('location: produtos_lista.php');
    //     } 
    // }
    //     // Selecionar os dados de chave estrangeira (lista de tipos de produto)
    //     $consulta_fk = "select * from tbtipos order by rotulo_tipo asc";
    //     $lista_fk = $conn->query($consulta_fk);
    //     $row_fk = $lista_fk->fetch_assoc();
    //     $nlinhas = $lista_fk->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <title>Cadastro de Usuários</title>
</head>
<body class="fundo_areas">
    <main class="container">
        <div class="text-center">
            <h1>Cadastro de Usuários</h1>
        </div>
        <div>
        <form action="../admin/adm_cadastrar_user.php" method="post" name="form_usuario_insere" enctype="multipart/form-data" id="form_usuario_insere">
            <label for="id_tipo_usuario">Função:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                    </span>
                    <select name="id_tipo_usuario" id="id_tipo_usuario" class="form-control" required>
                        <?php do { ?>
                            <option value="<?php echo $row_fk['id_tipo']; ?>">
                                <?php echo $row_fk['rotulo_tipo']; ?>
                            </option>
                        <?php }while($row_fk=$lista_fk->fetch_assoc()); ?>
                    </select>
                </div>
            <label for="destaque_usuario">Ativo:</label>
                            <div class="input-group">
                                <label for="destaque_usuario_s" class="radio-inline">
                                        <input type="radio" name="destaque_usuario" id="destaque_usuario" value="Sim">Sim
                                </label>
                                <label for="destaque_usuario_n" class="radio-inline">
                                        <input type="radio" name="destaque_usuario" id="destaque_usuario" value="Não" >Não
                                </label>
                            </div>
                            <label for="descri_usuario">Descrição:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="descri_usuario" id="descri_usuario" class="form-control" placeholder="Digite a descrição do usuario" maxlength="100" required>
                            </div>
                            <label for="resumo_usuario">Resumo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                </span>
                                <textarea name="resumo_usuario" id="resumo_usuario" 
                                    class="form-control" placeholder="Digite o resumo do usuario" 
                                    cols="30" rows="8" required></textarea>
                            </div>
                            <label for="valor_usuario">Valor:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                                </span>
                                <input type="number" name="valor_usuario" id="valor_usuario" 
                                class="form-control" placeholder="Digite a descrição do usuario" 
                                maxlength="100" required min="0" step="0.01">
                            </div>  
                            <label for="imagem_usuario">Imagem:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                                </span>
                                <img src="" name="imagem" id="imagem" class="img-responsive">
                                <input type="file" name="imagem_usuario" id="imagem_usuario" class="form-control" accept="image/*">
                            </div>
                            <br>
                            <hr>
                            <input type="submit" name="Inserir" class="bt btn-danger btn-block" id="Inserir" value="Inserir">
                        </form>
        </div>
    </main>
</body>
<!-- link para bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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
</html>