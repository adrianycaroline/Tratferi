<?php 
include 'header_publico.php';
include 'footer.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- barra de pesquisa -->
<label for="exampleDataList" class="form-label">Datalist example</label>
<div class="input-group input-group-sm mb-3">
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
  <span class="input-group-text" id="inputGroup-sizing-sm">Buscar</span>
</div>
    <!-- fim barra de pesquisa -->

<!-- cards -->
<div class="d-flex gap-5 justify-content-around">
<div class="card" style="width: 18rem; background-color: #38B6FF;">
  <div class="card-body">
    <p class="card-text" style="color: #fff;">Consultas</p>
  </div>
</div>

<div class="card" style="width: 18rem; background-color: #38B6FF;">
  <div class="card-body">
    <p class="card-text" style="color: #fff;">Agendamentos de Exames</p>
  </div>
</div>

<div class="card" style="width: 18rem; background-color: #38B6FF;">
  <div class="card-body">
    <p class="card-text" style="color: #fff;">Vacinas</p>
  </div>
</div>

<div class="card" style="width: 18rem; background-color: #38B6FF;">
  <div class="card-body">
    <p class="card-text" style="color: #fff;">Resultados de Exames <br> . <br> . <br> .</p>
  </div>
</div>
</div>
<!-- fim cards -->

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
</body>
</html>