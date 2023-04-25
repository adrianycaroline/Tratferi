<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../../CSS/estilo.css">
    <link rel="stylesheet" href="../../CSS/estilo_perfil.css">
    <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
    <title>Preferências de Email - <?php echo $_SESSION['nome'];?></title>
</head>
<body>
    <?php include '../../admin/perfil/perfil_menu.php';?>
        <div style="margin-left: 280px;">
            <div class="container">
                <div style="margin-top: 10px;">
                    <h2>PREFERÊNCIAS DE E-MAIL</h2>
                    <p>Gerencie suas preferências de e-mail da TRATFERI.</p>
                    <p>Só entraremos em contato se você solicitar, para fins como verificação de e-mail, redefinição de senha e atualizações de Autenticação de Dois Fatores.</p>
                </div>
                <div>
                    <h4>Gerenciar preferências de e-mail</h4>
                    <br>
                    <div>
                        <div class="group">
                            <input required="" type="text" class="input2" >
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Email</label>
                        </div>
                    </div>
                    <br>
                    <ul style="list-style: none;">
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkTodos" onclick="marcarTodos()">
                                <label class="form-check-label" for="checkTodos">
                                    Selecionar Todos
                                </label>
                            </div>
                        </li>
                        <ul style="list-style: none;">
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check1">
                                    <label class="form-check-label" for="check1">
                                        Enviar-me emails
                                    </label>
                                    <p style="font-size: 10pt;">Receba emails diretos sobre a TRATFERI.</p>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check2">
                                    <label class="form-check-label" for="check2">
                                        Pesquisa
                                    </label>
                                    <p style="font-size: 10pt;">Participe de pesquisas e compartilhe sua opinião com a TRATFERI.</p>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check3">
                                    <label class="form-check-label" for="check3">
                                        Atualizações
                                    </label>
                                    <p style="font-size: 10pt;">Fique sempre informado sobre as novidades e atualizações da TRATFERI.</p>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check4">
                                    <label class="form-check-label" for="check4">
                                        Cancelamentos
                                    </label>
                                    <p style="font-size: 10pt;">Receba diretamente em seu e-mail avisos sobre cancelamentos de consultas, atendimentos ou serviços.</p>
                                </div>
                            </li>
                        </ul>
                    </ul>
                </div>
                <br>
                <br>
                <div class="text-center">
                    <p> <img src="../../images/logo_areas.png" width="20vw" alt="Logo do Tratferi"> TRATFERI - TODOS OS DIREITOS RESERVADOS.</p>
                </div>
            </div>
        </div>
</body>
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