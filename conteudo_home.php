<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/estilo.css">
    <title>Conteudo Home</title>
    <style>
      .d-flex {
        display: flex;
      }
      
      .gap-5 {
        gap: 5px;
      }
      
      .justify-content-around {
        justify-content: space-around;
      }
      
      .img_card4 {
        max-width: 100%;
        height: auto;
      }
      
      .img_card5 {
        max-width: 100%;
        height: auto;
      }
      
      .img_card6 {
        max-width: 100%;
        height: auto;
      }
      
      .flip-card {
        background-color: transparent;
        width: 100%;
        height: 350px;
        perspective: 1000px;
        font-family: sans-serif;
        margin-bottom: 10px;
      }
      
      .title {
        font-size: 1.5em;
        font-weight: 900;
        text-align: center;
        margin: 0;
      }
      
      .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.8s;
        transform-style: preserve-3d;
      }
      
      .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
      }
      
      .flip-card-front, .flip-card-back {
        box-shadow: 0 8px 14px 0 rgba(0, 0, 0, 0.2);
        position: absolute;
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        border: 4px solid #5CE1E6;
        border-radius: 1rem;
        background-color: white; 
      }
      
      .flip-card-front {
        background-color: white; 
      }
      
      .flip-card-back {
        transform: rotateY(180deg);
      }
      
      .borda {
        border: 2px solid;
        border-radius: 2rem;
      }
      
      .card-text {
        text-align: center;
      }
      
      .card-text:hover {
        cursor: pointer;
        color: #38B6FF;
      }
    </style>
</head>
<body>
  <!-- banner -->
  <div class="position-relative">
    <img src="images/bann.jpg" class="img-responsive" width="100%">
    <!-- barra de pesquisa -->
    <nav class="navbar bg-body-tertiary position-absolute top-50 start-50 translate-middle navbar-expand-lg">
      <div class="container-fluid">
        <form class="d-flex" role="search">
          <div class="embaixo">
            <img src="images/logoPesq.png" class="img-responsive" width="250">
            <div class="flex">
              <input class="pesquisar" type="search" placeholder="O que você procura?" aria-label="Search" width="100%">
              <button class="border" type="submit" style="background-color: #38B6FF;">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="35" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" style="color: #fff;">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
              </button>
            </div>
          </div>
        </form>
      </div>
    </nav>
  </div> <!-- fim barra de pesquisa -->
  <!-- fim do banner -->
  <div style="background-color: #ccfafb;">
    <br>
    <br>
    <!-- começo dos cards  -->
    <div class="container">
  <div class="row justify-content-around">
    <div class="col-lg-3 col-md-6 mb-5">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/atendimento.jpg" class="img_card1" alt="">
            <br> 
            <p class="card-text"> Quais os nossos ideias como empresa ?</p>
            <p class="card-text" style="color: #38B6FF;">Saiba mais...</p>
            <small class="text-muted">©2023 Tratferi-Todos os direitos reservados</small>
          </div>
          <div class="flip-card-back">
            <br> 
            <p class="card-text text-muted">
              Quais os nossos ideias como empresa ?
            </p>
            <img src="images/linha.svg" alt="">
            <br>
            <p>
              é pensar na acessibilidade entre
              Paciente e cliente dessa forma colocando você e sua saúde em
              Primeiro lugar sempre esse é nosso objetivo como uma marca.
            </p>
          </div>
        </div>
      </div>
    </div>
<!-- Fim Card 1,Começo Card 2  -->
<div class="col-lg-3 col-md-6 mb-5">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/anota.jpg" class="img_card2" alt="">
            <br> 
            <p class="card-text">Como Entregamos nosso atendimento ?</p>
            <p class="card-text" style="color: #38B6FF;">Saiba mais...</p>
            <small class="text-muted">©2023 Tratferi-Todos os direitos reservados</small>
          </div>
          <div class="flip-card-back">
            <br>
            <p class="card-text text-muted">
              Como Entregamos nosso atendimento ?
            </p>
            <img src="images/linha.svg" alt="">
            <br>
            <p>
              dentro da sua casa.
              Nossos profissionais acompanharão o seu tratamento
              Pensando na melhor forma pra você sentir-se bem.   
            </p>
          </div>
        </div>
      </div>
    </div>
<!-- Fim Card 2,Começo Card 3  -->
<div class="col-lg-3 col-md-6 mb-5">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/pc.jpg" class="img_card3" alt="">
            
            <p class="card-text">Porque confiar no tratferi ?</p>
            <p class="card-text" style="color: #38B6FF;">Saiba mais...</p>
            <small class="text-muted">©2023 Tratferi-Todos os direitos reservados</small>
          </div>
          <div class="flip-card-back">
            <p class="card-text text-muted">
              <br>
              Porque confiar no tratferi ?
            </p>
            <img src="images/linha.svg" alt="">
            <br>
            <p>
              Precisamos de informações basicas sobre o paciente
              Para atender da melhor forma possivel apenas isso,<br>
              Nosso plano é a sua saúde. 
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
        <!-- começo dos cards  -->
        <div class="container">
  <div class="row justify-content-around">
    <div class="col-lg-3 col-md-6 mb-5">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/atendimento.jpg" class="img_card1" alt="">
            <br> 
            <p class="card-text"> Quais os nossos ideias como empresa ?</p>
            <p class="card-text" style="color: #38B6FF;">Saiba mais...</p>
            <small class="text-muted">©2023 Tratferi-Todos os direitos reservados</small>
          </div>
          <div class="flip-card-back">
            <br> 
            <p class="card-text text-muted">
              Quais os nossos ideias como empresa ?
            </p>
            <img src="images/linha.svg" alt="">
            <br>
            <p>
              é pensar na acessibilidade entre
              Paciente e cliente dessa forma colocando você e sua saúde em
              Primeiro lugar sempre esse é nosso objetivo como uma marca.
            </p>
          </div>
        </div>
      </div>
    </div>
<!-- Fim Card 1,Começo Card 2  -->
<div class="col-lg-3 col-md-6 mb-5">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/anota.jpg" class="img_card2" alt="">
            <br> 
            <p class="card-text">Como Entregamos nosso atendimento ?</p>
            <p class="card-text" style="color: #38B6FF;">Saiba mais...</p>
            <small class="text-muted">©2023 Tratferi-Todos os direitos reservados</small>
          </div>
          <div class="flip-card-back">
            <br>
            <p class="card-text text-muted">
              Como Entregamos nosso atendimento ?
            </p>
            <img src="images/linha.svg" alt="">
            <br>
            <p>
              dentro da sua casa.
              Nossos profissionais acompanharão o seu tratamento
              Pensando na melhor forma pra você sentir-se bem.   
            </p>
          </div>
        </div>
      </div>
    </div>
<!-- Fim Card 2,Começo Card 3  -->
<div class="col-lg-3 col-md-6 mb-5">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="images/pc.jpg" class="img_card3" alt="">
            <br> 
            <p class="card-text">Porque confiar no tratferi ?</p>
            <p class="card-text" style="color: #38B6FF;">Saiba mais...</p>
            <small class="text-muted">©2023 Tratferi-Todos os direitos reservados</small>
          </div>
          <div class="flip-card-back">
            <p class="card-text text-muted">
              <br>
              Porque confiar no tratferi ?
            </p>
            <img src="images/linha.svg" alt="">
            <br>
            <p>
              Precisamos de informações basicas sobre o paciente
              Para atender da melhor forma possivel apenas isso,<br>
              Nosso plano é a sua saúde. 
            </p>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
