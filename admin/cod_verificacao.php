<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='../CSS/estilo.css'>
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <title>Verificação de duas Etapas</title>
</head>
<body>
<section id="fundo_cli" style="display: flex; flex-direction: column;">
        <?php include '../logo_superior.php'?>
        <form class="form">
        <div class="info">
        <span class="title">Verificação de duas Etapas</span>
        <p class="description">Por favor insira o código que lhe enviamos.</p>
        </div>
            <div class="inputs">
            <input placeholder="" type="tel" maxlength="1">
            <input placeholder="" type="tel" maxlength="1">
            <input placeholder="" type="tel" maxlength="1">
            <input placeholder="" type="tel" maxlength="1">
        </div>
            <a class="validate"  href="verifica.php">Verificar</a>
        <p class="resend">Você não recebeu o código?<a class="resend-action">reenviar</a></p>

        </form>
        <?php include '../termos_texto.php';?>
    </section>
    
</body>
</html>