<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Central de ajuda </title>
  <link rel="stylesheet" href='CSS/estilo.css'>
    <link rel="shortcut icon" href="images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<style>
body {
        background: url('images/fundo_ajuda.jpeg') no-repeat;  
        background-size: cover;
    }
</style>
<h1 style=" display:flex; justify-content: center; color:white;">Central de Ajuda</h1>
<!-- Primeiro Dropdown-->
<div class="dropdown" style=" display:flex; justify-content: center; margin-top:13%; ">
  <button class="btn btn-secondary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #01a1ff; background-color:white;">
    Como funciona as consultas presencias ? 
    <span class="caret" style="color: orange;"></span>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: #01a1ff; color:white;">
    <span class="dropdown-text"> <a class="dropdown-item" >O objetivo do site é acompanhar o paciente a distancia <br>
     até a consulta presencial propriamente dita levando isso em conta ce necessario faremos  <br> 
    uma consulta presencial para o paciente...</a></span>
  </div>
</div>

<!-- Fim dropdown-->


<!-- Java dropdown-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script>
   
    let dropdownButton = document.getElementById('dropdownMenuButton');
let caret = dropdownButton.querySelector('.caret');

dropdownButton.addEventListener('click', function() {
  caret.classList.toggle('caret-up');
});
  
  </script>
  <!-- Fim Java Dropdown-->
</body>
</html>