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
            <input placeholder="" type="tel" maxlength="1" id="meuInput">
            <input placeholder="" type="tel" maxlength="1" id="meuInput">
            <input placeholder="" type="tel" maxlength="1" id="meuInput">
            <input placeholder="" type="tel" maxlength="1" id="meuInput">
        </div>
            <a class="validate"  href="verifica.php">Verificar</a>
        <p class="resend">Você não recebeu o código?<a class="resend-action">reenviar</a></p>

        </form>
        <?php include '../termos_texto.php';?>
    </section>
    
</body>
<script>
    // Selecionar todos os campos de entrada
    const inputs = document.querySelectorAll('input[type="tel"]');

    // Adicionar ouvinte de evento de entrada para cada campo
    inputs.forEach((input, index) => {
        input.addEventListener('input', (event) => {
            // Se o campo atual estiver preenchido
            if (input.value.length === input.maxLength) {
                // Se houver um próximo campo de entrada, mover o foco para ele
                if (index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            }else if (input.value.length != input.maxLength){
                if (index < inputs.length + 1) {
                    inputs[index - 1].focus();
                }
            }
        });
    });
</script>
<script>
const input = document.getElementById("meuInput");

input.addEventListener("keydown", (event) => {
  // Obtem o código da tecla pressionada
  const keyCode = event.keyCode || event.which;

  // Verifica se a tecla pressionada é um número
  if (keyCode < 48 || keyCode > 57) {
    // Impede a propagação do evento
    event.preventDefault();
  }
});
</script>
</html>