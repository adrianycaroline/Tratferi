<?php 
    include '../admin/acesso_com_pac.php';
    include '../connection/connect.php';
    $lista = $conn->query("SELECT *, funcionario.nome as nome_func, paciente.nome as nome_paci FROM tratamento 
    LEFT JOIN ferida on tratamento.id_ferida = ferida.id 
    LEFT JOIN funcionario on tratamento.id_func = funcionario.id 
    LEFT JOIN paciente on tratamento.id_paci = paciente.id
    WHERE tratamento.id_paci = ".$_SESSION['Id']." LIMIT 1;");
    $row = $lista->fetch_assoc();
    $rows = $lista->num_rows;

    date_default_timezone_set('America/Sao_Paulo'); // define o fuso horário para São Paulo
    $diaDaSemana = date('l'); // obtém o dia da semana
    switch($diaDaSemana) {
        case 'Monday':
            $diaDaSemana = 'Segunda-feira';
            break;
        case 'Tuesday':
            $diaDaSemana = 'Terça-feira';
            break;
        case 'Wednesday':
            $diaDaSemana = 'Quarta-feira';
            break;
        case 'Thursday':
            $diaDaSemana = 'Quinta-feira';
            break;
        case 'Friday':
            $diaDaSemana = 'Sexta-feira';
            break;
        case 'Saturday':
            $diaDaSemana = 'Sábado';
            break;
        case 'Sunday':
            $diaDaSemana = 'Domingo';
            break;
    }

    // CÓDIGO QUE CALCULA QUANDO FOI A FERIDA E DIZ POR ESCRITO COMPARANDO COM O DIA ATUAL
    $dataLesao = strtotime($row['tempo_ferida']);
    $dataAtual = time();
    $diferenca = $dataAtual - $dataLesao;

    $segundos = $diferenca % 60;
    $minutos = floor(($diferenca / 60) % 60);
    $horas = floor(($diferenca / 3600) % 24);
    $dias = floor($diferenca / (3600 * 24));

    $tempoDecorrido = "";
    if ($dias > 0) {
        $tempoDecorrido .= $dias . " dia" . ($dias == 1 ? "" : "s") . " ";
    }
    if ($horas > 0) {
        $tempoDecorrido .= $horas . " hora" . ($horas == 1 ? "" : "s") . " ";
    }
    if ($minutos > 0) {
        $tempoDecorrido .= $minutos . " minuto" . ($minutos == 1 ? "" : "s") . " ";
    }
    if ($segundos > 0) {
        $tempoDecorrido .= $segundos . " segundo" . ($segundos == 1 ? "" : "s") . " ";
    }

    // Recupera o valor do banco de dados
    $regiao_afetada = $row['regiao'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="../CSS/corpo.css">
    <title>Especificações Tratamento - <?php echo($_SESSION['nome']); ?></title>
</head>
<body onload="atualizarHoras()" class="fundo_areas">
    <?php include 'menu_paci.php'; ?>
    <div style="margin-left: 280px;">
        <div class="bg-azul"> 
            <figure id="img-bloqueado" style="position:absolute; cursor: pointer;">
                <img src="../images/menu-svgrepo-com.svg" style="margin-left: 5px;" width="40vw" alt="" srcset="">
            </figure>
            <div class="text-light" style="display: flex; justify-content: end; margin-right: 20px;">
                <div style="margin: 10px;">
                    <span><?php echo $diaDaSemana; ?> -&nbsp;</span>
                    <span id="horas"></span>
                </div>
            </div>
        </div>
            <br>
            <h1 style="margin-left: 20px;">Tratamento</h1>
            <br>
            <div class="border-bottom border-2 border-dark" style="width: 97%; margin-left: 15px; margin-bottom: 10px;"></div>
        <main>
            <div style="margin: 20px;"> <!-- Afasta o conteúdo das bordas -->
                <div style="border: 4px solid #2b8af7; border-radius: 35px; background-color: white;">
                    <div style="margin: 40px;">
                        <!-- Começo do conteúdo principal -->
                        <div class="d-flex" style="justify-content: center;">
                            <div>
                                <!-- Text Adiquirida -->
                                <h5 style="color: #2b8af7;">Forma Adquirida:</h5>
                                <textarea class="TxaTratamento" name="" id="" cols="40" rows="4" disabled><?php echo $row['forma_adquirida'];?></textarea>
                                <!-- Text Tempo desde a lesão -->
                                <h5 style="color: #2b8af7;">Tempo desde a lesão:</h5>
                                <textarea class="TxaTratamento" name="" id="" cols="40" rows="4" disabled><?php echo $tempoDecorrido;?></textarea>
                                <!-- Text Medicação a se utilizar -->
                                <h5 style="color: #2b8af7;">Medicação a se utilizar:</h5>
                                <textarea class="TxaTratamento" name="" id="" cols="40" rows="4" disabled><?php echo $row['medicamento_usado'];?></textarea>
                                <!-- Text Exsudato -->
                                <h5 style="color: #2b8af7;">Exsudato:</h5>
                                <textarea class="TxaTratamento" name="" id="" cols="40" rows="4" disabled><?php echo $row['exsudato'];?></textarea>
                                <!-- Profissional que atendeu -->
                                <h5>Profissional Responsável:</h5>
                                <p style="font-size: 14pt;"><?php echo $row['nome_func']?></p>
                            </div>
                            <div style="margin-left: 100px; margin-right: 100px;">
                                <h5 style="color: #2b8af7;">Odor:</h5>
                                <textarea class="TxaTratamento" name="" id="" cols="40" rows="4" disabled><?php echo $row['odor'];?></textarea>
                                <h5 style="color: #2b8af7;">Lateralidade:</h5>
                                <textarea class="TxaTratamento" name="" id="" cols="40" rows="4" disabled><?php echo $row['lateralidade'];?></textarea>
                                <h5 style="color: #2b8af7;">Medidas:</h5>
                                <textarea class="TxaTratamento" name="" id="" cols="40" rows="4" disabled><?php echo $row['medidas'];?></textarea>
                                <h5 style="color: #2b8af7;">Descrição da Região afetada:</h5>
                                <textarea class="TxaTratamento" name="" id="" cols="40" rows="4" disabled><?php echo $row['anotacao_func'];?></textarea>
                                <div style="font-size: 14pt;">
                                    <label>
                                        <input disabled value="lado" type="radio" name="lado" id="lado" value="Frente" <?php echo ($row['area'] == 'Frente') ? 'checked' : ''; ?>> Frente
                                    </label>
                                    <label>
                                        <input disabled value="lado" type="radio" name="lado" id="lado" value="Verso" <?php echo ($row['area'] == 'Verso') ? 'checked' : ''; ?>> Costas
                                    </label>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h5 style="color: #2b8af7;">Membro/ Região Afetada</h5>
                                    <?php include 'corpo.php';?>
                                </div>
                                <div id="area">
                                    Area: <br>
                                    <span id="data">
                                        <?php 
                                        // Verifica se é uma região conhecida
                                        if ($regiao_afetada == 'Cabeça' || $regiao_afetada == 'Peitoral' || $regiao_afetada == 'Ombros' || $regiao_afetada == 'Tronco' || $regiao_afetada == 'Braços' || $regiao_afetada == 'Mãos' || $regiao_afetada == 'Pernas') {
                                            echo '<p>' . $regiao_afetada . '</p>';
                                        }?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="../js/script.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>