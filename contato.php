<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/estilo.css">
    <title>Contato</title>
</head>
<body>
  <!-- inclusão do header -->
<?php 
    include 'header_publico.php';
?>
<main>
    <div class="content">
        <div class="left-side">
            <!-- area de contatos  -->
        <div>
            <div class="panel-footer" style="background: none;">
                    <h4>Contato</h4>
                    <form action="contato_envia.php" name="form_contato" id="form_contato" method="post">
                        <p>
                            <span class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                                <input type="text" name="nome_contato" placeholder="digite seu nome" aria-describedby="basic-addon1" class="form-control" required>
                            </span>
                        </p>
                        <p>
                            <span class="input-group">
                                <span class="input-group-addon" id="basic-addon2">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="text" name="email_contato" placeholder="digite seu email" aria-describedby="basic-addon1" class="form-control" required>
                            </span>
                        </p>
                        <p>
                            <span class="input-group">
                                <span class="input-group-addon" id="basic-addon3">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </span>
                                <textarea type="text" name="comentario_contato" cols="30" rows="5" placeholder="digite seu comentário" aria-describedby="basic-addon1" class="form-control" required></textarea>
                            </span>
                        </p>
                        <p>
                            <button class="btn btn-primary btn-block botao" aria-label="enviar" role="button">
                                Enviar
                                <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                
                            </button>
                        </p>
                    </form>
            </div>
        </div>
        </div>
        <div class="rigth-side">
            <img src="images/contato.jpg"> 
        </div>
    </div>
</main>
<!-- inclusão do footer  -->
<?php 
     include 'footer.php';
?>
</body>
</html>