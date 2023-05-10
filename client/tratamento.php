<?php 
    include '../admin/acesso_com_pac.php';
    include '../connection/connect.php';
    $lista = $conn->query("SELECT *, funcionario.nome as nome_func, paciente.nome as nome_paci FROM tratamento 
    LEFT JOIN ferida on tratamento.id_ferida = ferida.id 
    LEFT JOIN funcionario on tratamento.id_func = funcionario.id 
    LEFT JOIN paciente on tratamento.id_paci = paciente.id
    WHERE tratamento.id_paci = ".$_SESSION['Id'].";");
    if ($lista->num_rows > 0) {
        // Caso tenha resultados
        $row = $lista->fetch_assoc();
    } else {
        // Caso não tenha resultados
        header('location: index.php?paciente=n');
    }

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
                        <div style="margin-right: 70px;">
                                <h5 style="color: #2b8af7;">Odor:</h5>
                                <textarea class="TxaTratamento" name="odor" id="odor" cols="40" rows="4" disabled><?php echo $row['odor'];?></textarea>
                                <h5 style="color: #2b8af7;">Lateralidade:</h5>
                                <textarea class="TxaTratamento" name="lateralidade" id="lateralidade" cols="40" rows="4" disabled><?php echo $row['lateralidade'];?></textarea>
                                <h5 style="color: #2b8af7;">Medidas:</h5>
                                <textarea class="TxaTratamento" name="medidas" id="medidas" cols="40" rows="4" disabled><?php echo $row['medidas'];?></textarea>
                                <h5 style="color: #2b8af7;">Previsão de Finalização</h5>
                                <textarea class="TxaTratamento" name="finalizacao" id="finalizacao" cols="40" rows="4" disabled><?php echo $row['finalizacao'];?></textarea>
                                <!-- Text Adiquirida -->
                                <h5 style="color: #2b8af7;">Forma Adquirida:</h5>
                                <textarea class="TxaTratamento" name="forma" id="forma" cols="40" rows="4" disabled><?php echo $row['forma_adquirida'];?></textarea>
                            </div>
                            <div>
                                <h5 style="color: #2b8af7;">Acompanhamento</h5>
                                <textarea class="TxaTratamento" name="acompanhamento" id="acompanhamento" cols="40" rows="4" disabled><?php echo $row['acompanhamento'];?></textarea>
                                <div>
                                    <div class="d-flex">
                                        <div>
                                            <!-- Text Medicação a se utilizar -->
                                            <h5>Medicação:</h5>
                                            <select name="medicamento" id="medicamento" style="font-size: 14pt; border-radius: 10px;" disabled>
                                                <?php 
                                                    //seleciona os medicamentos 
                                                    $medicamentos = $conn->query("SELECT * FROM medicamento;");
                                                
                                                    while($row_med = $medicamentos->fetch_assoc()) {
                                                        echo '<option value="'.$row_med['remedio'].'">'.$row_med['remedio'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                            <br><br>
                                            <!-- Paciente -->
                                            <h5>Funcionario:</h5>
                                            <select name="paciente" style="font-size: 14pt; border-radius: 10px;" disabled>
                                                <?php 
                                                    while($row = $lista->fetch_assoc()) {
                                                        echo '<option value="'.$row['nome_func'].'">'.$row['nome_func'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div style="font-size: 14pt; margin-left: 15px;">
                                            <h5>Lado do Corpo:</h5>
                                            <label>
                                                <input value="Frente" type="radio" name="lado" id="lado1" <?php echo ($row['area'] == 'Frente') ? 'checked' : ''; ?> disabled> Frente
                                            </label>
                                            <label>
                                                <input value="Verso" type="radio" name="lado" id="lado2" <?php echo ($row['area'] == 'Verso') ? 'checked' : ''; ?> disabled> Costas
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <div>
                                            <h5>Dia da Lesão</h5>
                                            <input type="date" name="tempo" id="tempo" style="border-radius: 10px;" value="<?php echo $row['tempo_ferida'] ?>" disabled>
                                        </div>
                                        <br>
                                        <div>
                                            <h5>Tipo de Membro:</h5>
                                            <select name="membro" style="font-size: 14pt; border-radius: 10px;" disabled>
                                                <option value="superior" <?php if($row['membro'] == 'superior') echo 'selected' ?>>Superior</option>
                                                <option value="inferior" <?php if($row['membro'] == 'inferior') echo 'selected' ?>>Inferior</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div>
                                            <h5>Exsudato</h5>
                                            <select name="exsudato" id="exsudato" style="font-size: 14pt; border-radius: 10px;" disabled>
                                                <option value="alto" <?php if($row['exsudato'] == 'alto') echo 'selected' ?>>Alto</option>
                                                <option value="baixo" <?php if($row['exsudato'] == 'baixo') echo 'selected' ?>>Baixo</option>
                                            </select>
                                        </div>
                                    </div>
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