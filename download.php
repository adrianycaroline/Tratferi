<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="shortcut icon" href="images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="CSS/estilo.css">
    <title>TRATFERI - Download</title>
</head>
<body>
    <?php include 'header_publico.php'?>
    <main >
        <br><br>
        <div style="display: flex; justify-content: space-between;">
            <div  class="text-center center">
                <h1 style="color:#1d5f96;">Faça o Download do app</h1>
                <div style="border-bottom: 2px solid #000; width: 100%; margin: 0 auto;"></div>
               <br>
                <p>
                   O aplicativo do Tratferi está disponível para <br>
                    os sistemas operacionais Android e IOS 
                </p>
                <br>
                <div class="d-flex ">
                    <div class="" >
                        <div>    
                            <a href="https://play.google.com/store/games?hl=pt_BR&gl=US" target="_blank">
                                <button class="text-light item mx-3" style="border-radius: 10px;">
                                    <div>
                                        <img src="images/dow.jpg" alt="Logo da Android" width="300px">
                                    </div>
                                </button>
                            </a>
                        </div>
                        <div>
                            <a href="https://www.apple.com/br/app-store/" target="_blank">
                                <button class="item mx-3" style="border-radius: 10px;">
                                    <div>
                                        <img src="images/dowIOS.jpg" alt="Logo da Android" width="300px" >
                                    </div>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="escondido5">
                        <img src="images/tratferi_qrcode (1).svg" width="180px" alt="">
                    </div>
                </div>
            </div>
            
        <img class="celular img-responsive escondido5" src="images/celulares1.jpg" alt="">
        </div>
    </main>  
    <div id=""><?php include 'footer2.php'?></div> 
    <script>
        function makeResponsive() {
  const mainElement = document.querySelector('main');
  if (window.innerWidth < 768) {
    mainElement.classList.add('responsive');
  } else {
    mainElement.classList.remove('responsive');
  }
}

window.addEventListener('resize', makeResponsive);
makeResponsive();
const celularImg = document.querySelector('.celular');

function checkScreenSize() {
  if (window.innerWidth < 768) {
    celularImg.classList.add('hide');
  } else {
    celularImg.classList.remove('hide');
  }
}

// Verifique o tamanho da tela quando a página carrega
checkScreenSize();

// Verifique o tamanho da tela quando a janela for redimensionada
window.addEventListener('resize', checkScreenSize);
    </script>
    <style>
        main.responsive {
  display: flex;
  flex-direction: column;
  align-items: center;
}
@media (max-width: 1023px) {
  .hide {
    display: none;
  }
}
    </style>
</body>

</html>