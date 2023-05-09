<?php 
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php';
    $lista = $conn->query("SELECT * FROM paciente;");
    if ($lista->num_rows > 0) {
        // Caso tenha resultados
        $row = $lista->fetch_assoc();
    } else {
        // Caso não tenha resultados
        // header('location: index.php?paciente=n');
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

    if(isset($_POST['concluir'])){
        // Variaveis gerais
        $paciente = $_POST['paciente'];

        // variaveis do tratamento
        $medicamento = $_POST['medicamento'];
        $acompanhamento = $_POST['acompanhamento'];
        $finalizacao = $_POST['finalizacao'];
        $anotacao = $_POST['anotacao'];
        $lado = $_POST['lado'];
        
        // variaveis da ferida
        $forma_adquirida = $_POST['forma'];
        $tempo = $_POST['tempo'];
        $exsudato = $_POST['exsudato'];
        $odor = $_POST['odor'];
        $lateralidade = $_POST['lateralidade'];
        $medidas = $_POST['medidas'];
        $desc = $_POST['desc'];
        $area = $_POST['area'];
        $membro = $_POST['membro'];

        // seleciona o id do paciente baseado no nome escolhido no select
        $selectIdPaci = $conn->query("SELECT id FROM paciente where nome = '".$paciente."';");
        $row_PaciId = $selectIdPaci->fetch_assoc();
        $id_paci = $row_PaciId['id'];

        // Insert da Ferida
        $insert_ferida = "INSERT INTO ferida
        (forma_adquirida, tempo_ferida, regiao, membro, exsudato, odor, lateralidade, medidas, id_paci, id_func)
        VALUES ('$forma_adquirida','$tempo','$area','$membro','$exsudato','$odor','$lateralidade','$medidas', '$id_paci','".$_SESSION['Id']."')";

        $insert_ferida_result = $conn->query($insert_ferida);

        // Obtém o ID gerado na última inserção
        $id_ferida = mysqli_insert_id($conn);

        // insere o tratamento com o id_ferida
        $insert_tratamento = "INSERT INTO tratamento
        (anotacao_func, acompanhamento, medicamento_usado, finalizacao, area, id_func, id_paci, id_ferida)
        VALUES ('$anotacao','$acompanhamento','$medicamento','$finalizacao','$lado','".$_SESSION['Id']."', '$id_paci','$id_ferida')";

        $insert_tratamento_result = $conn->query($insert_tratamento);

        if($insert_tratamento_result && $insert_ferida_result){
            header('location: listar_tratamento.php?tratamento=s');
        }else{
            header('location: listar_tratamento.php?tratamento=n');
        }

    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/estilo.css">
    <link rel="stylesheet" href="../CSS/corpo2.css">
    <title>Novo Tratamento</title>
</head>
<body onload="atualizarHoras()" class="fundo_areas">
    <?php include 'menu_fun.php'; ?>
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
            <h1 style="margin-left: 20px;">Novo Tratamento</h1>
            <br>
            <div class="border-bottom border-2 border-dark" style="width: 97%; margin-left: 15px; margin-bottom: 10px;"></div>
        <main>
            <div style="margin: 20px;"> <!-- Afasta o conteúdo das bordas -->
                <div style="border: 4px solid #2b8af7; border-radius: 35px; background-color: white;">
                    <form action="tratamento.php" method="post" enctype="multipart/form-data" style="margin: 40px;">
                        <!-- Começo do conteúdo principal -->
                        <div class="d-flex" style="justify-content: center;">
                            <div style="margin-right: 70px;">
                                <h5 style="color: #2b8af7;">Odor:</h5>
                                <textarea class="TxaTratamento" name="odor" id="odor" cols="40" rows="4" required></textarea>
                                <h5 style="color: #2b8af7;">Lateralidade:</h5>
                                <textarea class="TxaTratamento" name="lateralidade" id="lateralidade" cols="40" rows="4" required></textarea>
                                <h5 style="color: #2b8af7;">Medidas:</h5>
                                <textarea class="TxaTratamento" name="medidas" id="medidas" cols="40" rows="4" required></textarea>
                                <h5 style="color: #2b8af7;">Descrição da Região afetada:</h5>
                                <textarea class="TxaTratamento" name="desc" id="desc" cols="40" rows="4" required></textarea>
                                <h5 style="color: #2b8af7;">Previsão de Finalização</h5>
                                <textarea class="TxaTratamento" name="finalizacao" id="finalizacao" cols="40" rows="4" required></textarea>
                            </div>
                            <div>
                                <!-- Text Adiquirida -->
                                <h5 style="color: #2b8af7;">Forma Adquirida:</h5>
                                <textarea class="TxaTratamento" name="forma" id="forma" cols="40" rows="4" required></textarea>
                                <h5 style="color: #2b8af7;">Acompanhamento</h5>
                                <textarea class="TxaTratamento" name="acompanhamento" id="acompanhamento" cols="40" rows="4" required></textarea>
                                <div>
                                    <div class="d-flex">
                                        <div>
                                            <!-- Text Medicação a se utilizar -->
                                            <h5>Medicação:</h5>
                                            <select name="medicamento" id="medicamento" style="font-size: 14pt; border-radius: 10px;" required>
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
                                            <h5>Paciente:</h5>
                                            <select name="paciente" style="font-size: 14pt; border-radius: 10px;" required>
                                                <?php 
                                                    while($row = $lista->fetch_assoc()) {
                                                        echo '<option value="'.$row['nome'].'">'.$row['nome'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div style="font-size: 14pt; margin-left: 15px;">
                                            <h5>Lado do Corpo:</h5>
                                            <label>
                                                <input value="lado" type="radio" name="lado" id="lado" value="Frente" required> Frente
                                            </label>
                                            <label>
                                                <input value="lado" type="radio" name="lado" id="lado" value="Verso" required> Costas
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <div>
                                            <h5>Dia da Lesão</h5>
                                            <input type="date" name="tempo" id="tempo" style="border-radius: 10px;" required>
                                        </div>
                                        <br>
                                        <div>
                                            <h5>Tipo de Membro:</h5>
                                            <select name="membro" style="font-size: 14pt; border-radius: 10px;" required>
                                                <option value="superior">Superior</option>
                                                <option value="inferior">Inferior</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div>
                                            <h5>Exsudato</h5>
                                            <select name="exsudato" id="exsudato" style="font-size: 14pt; border-radius: 10px;" required>
                                                <option value="alto">Alto</option>
                                                <option value="baixo">Baixo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-left: 50px;">
                                <div>
                                    <h5 style="color: #2b8af7;">Membro/ Região Afetada</h5>
                                    <?php include 'corpo.php';?>
                                </div>
                                <div id="area">
                                    Area: <br>
                                    <span id="data"></span>
                                    <input type="hidden" name="area" id="area_input" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <h2>Anotações</h2>
                            <textarea class="TxaTratamento" name="anotacao" id="anotacao" cols="150" rows="10" required></textarea>
                            <br><br>
                            <button class="btn btn-primary" type="submit" name="concluir">Criar</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="../js/script.js"></script>
<script src="../js/corpo.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>