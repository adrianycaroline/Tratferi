<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="shortcut icon" href="images/logo_minimizada.png" type="image/x-icon">
    <title>Sobre - TRATFERI</title>
</head>
<body>
    <?php include 'header_publico.php';?>
    <main>
        <div style="display: flex;">
            <div>
                <img src="images/image.jpg" height="620px" width="800px" alt="">
            </div>
            <div class="container">
                <br>
                <h1 class="text-center">Sobre</h1>
                <div class="border-bottom border-2 border-dark mx-auto" style="width: 20%; "></div>
                <br>
                <p>O TRATFERI, fundado em 2023 pelo grupo de Enfermagem do Senac Itaquera veio ao mundo como 
                    uma idéia de aplicação Web e Software que auxiliasse os profissionais de saúde com os 
                    pacientes, além de ser voltado para adultos que desejam consultar suas informações
                    e progresso do atendimento. <br>
                    Assim, o TRATFERI (Tratamento de Feridas) foi oficialmente produzido. Atendendo as
                    melhores funcionalidades esse sistema é de grande ajuda a profissionais que precisam
                    de respostas rápidas para certos atendimentos e até oferece um auxílio de ponta na
                    organização e no atendimento.</p>
            </div>
        </div>
    </main>
    <br>
    <?php include 'footer.php';?>
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