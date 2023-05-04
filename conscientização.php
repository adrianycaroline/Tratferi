
<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href='CSS/estilo.css'>
    <link rel="shortcut icon" href="images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <title>Conscientização</title>
<!-- Fundo Conscientização -->
<style>
body {
        background: url('images/fundo_consci.webp') no-repeat;  
        background-size: cover;
    }
</style>
<!-- final fundo conscientização -->
</head>
<body ng-app="meuApp">
<?php include 'header_publico.php'?>
<br>
<main class="d-flex justify-content-center img-fluid"> 
<div class="cards "id="cards">
<!-- card 1  -->
    <div id="card1">
    <div class="card mb-3 card_focus">
          <div class="row no-gutters">
            <div class="col-md-4 h-100">
              <div class ="card text-white d-flex">
              <img src="images/celular.jpg" alt="Descrição da imagem" style="max-width: 60rem; height: 100%">
                <div class="card-body"style="max-width: 100%; padding: 0%; height: 0%;">
                  <i class="fas fa-file-code"></i>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card-body container">
                <h5 class="card-title" style="color:#1d5f96;" >Sobre Nossos serviços</h5>
                <br>
                <p class="card-text">
                Informando Sobre Como Fazemos Nossos Serviços:<br>
                 trabalharemos com voce pra levarmos o atendimento a sua <br>
                casa Com Auxilio do Site e do aplicativo,Seguramos Sua <br>
                  Mão Até a consulta  te aconselhando com deve Agir <br>
                  até a consulta Oficial e presencial Ce For Necessario.<br>
                  alguma duvida sobre entre no nossa centra de <a href="ajuda.php">Ajuda</a>. <br>
                  ou contate-nos pelo Email: <a href="mailto:tratferi_site@outlook.com?subject=Contato do Site">tratferi@outlook.com</a>.</p>
                  
</p>
  <p class="card-text"><small class="text-muted">Conscientização TRATFERI</small></p>
                
                <div class="d-inline-block mx-7 mt-2 "><div>         
  </div>
</div>
</div>
</div>
</div>
</div>
</div> 
<br>
  <!-- fim Card 1 -->
        <!-- card 2  -->
        <div id="card2">
        <div class="card mb-3 card_focus">
          <div class="row no-gutters">
            <div class="col-md-4">
              <div class ="card text-white d-flex">
              <img src="images/alimento.jpg" alt="Descrição da imagem" style="max-width: 60rem; height: 100%">
                <div class="card-body"style="max-width: 100%; padding: 0%; height: 0%;">
                  <i class="fas fa-file-code"></i>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title" style="color:#1d5f96;" >Alimento Saudavel</h5>
                <br>
                <p class="card-text">
                Quando abraçamos um estilo de vida saudável com uma dieta<br>
                equilibrada, garantimos ao nosso corpo os insumos necessários <br> 
                para o seu funcionamento, sem impor grandes limitações <br>
                em nossa rotina.Precisamos lembrar que comer é um ato prazeroso <br>
           e necessário à vida. Por isso, encontrar o equilíbrio <br> 
           é tão primordial  É necessário encontrar a dieta mais adequada para.<br>
             você, na qual caiba a sua forma de se alimentar.
</p>
  <p class="card-text"><small class="text-muted">Conscientização TRATFERI</small></p>
</div>
</div>
 </div>
</div>
  </div>
  <br>
        <!--Fim Card 2   -->
        <!-- Card 3  -->
        <div id="card3">
        <div class="card mb-3 card_focus">
          <div class="row no-gutters">
            <div class="col-md-4">
              <div class ="card text-white d-flex" img src="images/celular.jpg">
              <img src="images/exercicio.jpg" alt="Descrição da imagem" style="max-width: 60rem; height: 100%">
                <div class="card-body" style="max-width: 100%; padding: 0%; height: 0%;">
                  <i class="fas fa-file-code"></i>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title" style="color:#1d5f96;">Exercicio Fisico</h5>
                <p class="card-text">
                Temos uma recomendação pra voce indendepente <br> 
                do nossos serviços é importante a saúde fisica, <br> 
                então nos aconselhamos a minimo de exercicio fisico <br> 
                para se manter a qualidade de vida,<br>
              pois a relação causa-efeito sugere que pouca atividade <br> 
              é melhor do que nenhuma e, mais atividade, <br>
               até certo ponto é melhor 
              que pouca, ou seja, <br> 
              quanto mais ativo o indivíduo, 
              acredita-se que <br>
               mais saudável ele seja.
                </p>
                <p class="card-text">
                  <small class="text-muted">Conscientização TRATFERI</small>
                </p>          
  </div>
  </div>
  </div>
  </div>
    </div>
 <!-- fim Card 3  -->
 <br>
</main>
<?php include 'footer2.php'?>
<!-- Responsivo -->
<script>
function resizeElementOnWindowResize(cards) {
  const element = document.getElementById(cards);
  const windowHeight = window.innerHeight;
  const elementHeight = element.clientHeight;
  
  window.addEventListener('resize', () => {
    const newWindowHeight = window.innerHeight;
    
    if (newWindowHeight < windowHeight) {
      const newElementHeight = elementHeight + (windowHeight - newWindowHeight);
      element.style.height = `${newElementHeight}px`;
    }
  });
}
  
</script>

<!-- Fim responsivo -->
</body>
</html>
