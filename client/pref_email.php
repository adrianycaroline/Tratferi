<?php
    include '../admin/acesso_com_pac.php';
    include '../connection/connect.php';

    $lista = $conn->query("SELECT email FROM perfil_paci where id = ".$_SESSION['Id'].";");
    $row = $lista->fetch_assoc();
    $rows = $lista->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="../CSS/estilo_perfil.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <title>Preferências de Email - <?php echo $_SESSION['nome'];?></title>
</head>
<body class="fundo_adm">
    <?php include 'perfil_menu.php';?>
        <div style="margin-left: 280px;">
            <div class="container">
                <div style="margin-top: 10px;">
                    <h2 class="text-center" style="color: #38B6FF;">PREFERÊNCIAS DE E-MAIL</h2>
                    <p class="text-center">Gerencie suas preferências de e-mail da TRATFERI.</p>
                    <p class="text-center">Só entraremos em contato se você solicitar, para fins como verificação de e-mail, redefinição de senha e atualizações de Autenticação de Dois Fatores.</p>
                    <div class="border-bottom border-2 border-dark" style="width: 97%; margin-left: 15px; margin-bottom: 10px;"></div>
                </div>
                
                <form action="pref_email.php" method="post" > <!-- Começo do Formulário -->
                    <h4 style="color: #1d5f96;">Gerenciar preferências de e-mail</h4>
                    <br>
                        <!-- Input do Email -->
                        <div class="group">
                            <input required="" type="email" class="input2" value="<?php echo $row['email']?>">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Email</label>
                        </div>
                    <br>
                    <ul style="list-style: none;">
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" style="background-color: #38B6FF;" type="checkbox" value="" id="checkTodos" onclick="marcarTodos()">
                                <label class="form-check-label" for="checkTodos">
                                   <strong>Selecionar Todos</strong>
                                </label>
                            </div>
                        </li>
                        <ul style="list-style: none;">
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" style="background-color: #38B6FF;" type="checkbox" value="" id="check1">
                                    <label class="form-check-label" for="check1" style="color: #1d5f96;">
                                        Enviar-me emails
                                    </label>
                                    <p style="font-size: 10pt;">Receba emails diretos sobre a TRATFERI.</p>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" style="background-color: #38B6FF;" type="checkbox" value="" id="check2">
                                    <label class="form-check-label" for="check2" style="color: #1d5f96;">
                                        Pesquisa
                                    </label>
                                    <p style="font-size: 10pt;">Participe de pesquisas e compartilhe sua opinião com a TRATFERI.</p>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" style="background-color: #38B6FF;" type="checkbox" value="" id="check3">
                                    <label class="form-check-label" for="check3" style="color: #1d5f96;">
                                        Atualizações
                                    </label>
                                    <p style="font-size: 10pt;">Fique sempre informado sobre as novidades e atualizações da TRATFERI.</p>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" style="background-color: #38B6FF;" type="checkbox" value="" id="check4">
                                    <label class="form-check-label" for="check4" style="color: #1d5f96;">
                                        Cancelamentos
                                    </label>
                                    <p style="font-size: 10pt;">Receba diretamente em seu e-mail avisos sobre cancelamentos de consultas, atendimentos ou serviços.</p>
                                </div>
                            </li>
                        </ul>
                    </ul>
                </form> <!-- Final do formulário -->
                <br>
                <br>
                <!-- Linha dos Direitos Reservados -->
                <div class="text-center">
                    <p> <img src="../images/logo_areas.png" width="20vw" alt="Logo do Tratferi"> TRATFERI - TODOS OS DIREITOS RESERVADOS.</p>
                </div>
            </div>
        </div>
</body>
<!-- Links para a Biblioteca de icones do Ionic Icons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- link para bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
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
<script type="text/javascript">
    $('.delete').on('click',function(){
        var nome = $(this).data('nome'); //busca o nome com a descrição (data-nome)
        var id = $(this).data('id'); // busca o id (data-id)
        //console.log(id + ' - ' + nome); //exibe no console
        $('span.nome').text(nome); // insere o nome do item na confirmação
        $('a.delete-yes').attr('href','usuario_excluir.php?id='+id); //chama o arquivo php para excluir o produto
        $('#modalEdit').modal('show'); // chamar o modal
    });
</script>
<!-- Links para jquery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<!-- Função que marca todos os checkboxes -->
<script>
  function marcarTodos() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var checkTodos = document.querySelector('#checkTodos');

    for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].checked = checkTodos.checked;
    }
  }
</script>
</html>