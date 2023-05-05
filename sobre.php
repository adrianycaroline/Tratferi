<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="shortcut icon" href="images/logo_minimizada.png" type="image/x-icon">
    <title>Sobre - TRATFERI</title>
</head>
<body>
    <?php include 'header_publico.php';?>
   <br><br>
   <main>
  <div class="d-flex flex-wrap">
    <!--responsivo sumir imagem -->
    <div class="escondido4" style="flex: 1; margin-right: 20px;">
      <img class="img-responsive img-fluid w-100 rounded mx-auto d-block" src="images/image.jpg" style="border-radius: 50px; max-width: 100%; height: auto; object-fit: contain;" alt="">
    </div>  
    <div style="flex: 1;">
    <!-- texto sobre -->
      <h1 style="color:#1d5f96; text-align: center;">Sobre Nos</h1>
      <div style="border-bottom: 2px solid #000; width: 20%; margin: 0 auto;"></div>
      <br>
      <p style="text-align: justify;">O TRATFERI, fundado em 2023 pelo grupo de Enfermagem do Senac Itaquera veio ao mundo como uma ideia de aplicação Web e Software 
      que auxiliasse os profissionais de saúde com os pacientes , além de ser voltado para adultos que desejam consultar suas informações e progresso do atendimento. Assim, o TRATFERI<br>
       (Tratamento de Feridas) foi oficialmente produzido. Atendendo as melhores funcionalidades esse sistema é de grande ajuda a profissionais que precisam de respostas <br>
       rápidas para certos atendimentos e até oferece um auxílio de ponta na organização e no atendimento.</p>
<br><br>

<h1 style="color:#1d5f96; text-align: center;">Duvidas frequentes</h1>
<div style="border-bottom: 2px solid #000; width: 38%; margin: 0 auto;"></div>
<br><br>

<p>Para mais informaçoes sobre como funcionam nossos serviços, entre na nossa <a href="Politica_Privacidade.php">Politica de privacidade</a>.<br>
Ce existir alguma duvida acesse nossa aba de <a href="ajuda.php"></a>Ajuda lá estara as duvidas frequentes, ou entre em 
<a href="contato.php">Contato</a>.<br>
conosco qualquer duvida nos notifique.</p>

<small style="color:#1d5f96; display:flex; justify-content:center; margin-top:13%;">Conte conosco TRATFERI</small>
<!-- fim texto sobre -->

</div>
</div>
</main>

<!-- responsivo -->

<!-- fim responsivo -->
<br><br><br>
<?php include 'footer2.php';?>
</body>
<style>
@media (max-width: 1023px) {
    .img-fluid {
      display: none;
    }
  }
  </style> 
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