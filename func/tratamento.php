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
    <title>Especificações Tratamento - <?php echo($_SESSION['nome']); ?></title>
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
                    <div style="margin: 40px;">
                        <!-- Começo do conteúdo principal -->
                        <div class="d-flex" style="justify-content: center;">
                            <div>
                                <!-- Text Adiquirida -->
                                <h5 style="color: #2b8af7;">Forma Adquirida:</h5>
                                <textarea class="TxaTratamento" name="" id="" cols="40" rows="4"></textarea>
                                <!-- Text Tempo desde a lesão -->
                                <h5 style="color: #2b8af7;">Tempo desde a lesão:</h5>
                                <textarea class="TxaTratamento" name="" id="" cols="40" rows="4"></textarea>
                                <!-- Text Medicação a se utilizar -->
                                <h5 style="color: #2b8af7;">Medicação a se utilizar:</h5>
                                <textarea class="TxaTratamento" name="" maxlength="50" id="" cols="40" rows="4"></textarea>
                                <!-- Text Exsudato -->
                                <h5 style="color: #2b8af7;">Exsudato:</h5>
                                <textarea class="TxaTratamento" name="" id="" cols="40" rows="4"></textarea>
                                <!-- Profissional que atendeu -->
                                <h5>Paciente:</h5>
                                <select style="font-size: 14pt; border-radius: 10px;">
                                    <?php 
                                        while($row = $lista->fetch_assoc()) {
                                        echo '<option value="'.$row['nome'].'">'.$row['nome'].'</option>';
                                        }?>
                                </select>
                            </div>
                            <div style="margin-left: 100px; margin-right: 100px;">
                                <h5 style="color: #2b8af7;">Odor:</h5>
                                <textarea class="TxaTratamento" name="" id="" cols="40" rows="4"></textarea>
                                <h5 style="color: #2b8af7;">Lateralidade:</h5>
                                <textarea class="TxaTratamento" name="" id="" cols="40" rows="4"></textarea>
                                <h5 style="color: #2b8af7;">Medidas:</h5>
                                <textarea class="TxaTratamento" name="" id="" cols="40" rows="4"></textarea>
                                <h5 style="color: #2b8af7;">Descrição da Região afetada:</h5>
                                <textarea class="TxaTratamento" name="" id="" cols="40" rows="4"></textarea>
                                <div style="font-size: 14pt;">
                                    <label>
                                        <input value="lado" type="radio" name="lado" id="lado" value="Frente"> Frente
                                    </label>
                                    <label>
                                        <input value="lado" type="radio" name="lado" id="lado" value="Verso"> Costas
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
                                    <span id="data"></span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <h2>Anotações</h2>
                            <textarea class="TxaTratamento" name="" id="" cols="150" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<script src="../js/script.js"></script>
<script src="../js/corpo.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>