<?php 
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php';

    if($_POST){
        $id_usuario = $_POST['id_usuario']; 
        $nome = $_POST['nome'];
        $data = $_POST['data'];
        $cpf = $_POST['cpf'];
        $coren = $_POST['coren'];
        $crm = $_POST['crm'];
        $rg = $_POST['rg'];
        $cargo = $_POST['cargo'];
        $funcao = $_POST['funcao'];
        $periodo = $_POST['periodo'];
        $salario = $_POST['salario'];
        $adm = $_POST['adm'];
        $ativo = $_POST['ativo'];
    
            $id = $_POST['id_usuario']; 
            $updateSql = "update funcionario
                set id = '$id_usuario',
                nome = '$nome',
                data_nasc = '$data',
                cpf = '$cpf',
                coren = '$coren',
                crm = '$crm',
                rg = '$rg',
                cargo = '$cargo',
                funcao = '$funcao',
                periodo = '$periodo',
                salario = '$salario',
                adm = '$adm',
                ativo = '$ativo'
                where id = $id";
            $resultado = $conn->query($updateSql);
            if($resultado){
                header('location: ../admin/listar_funcionarios.php');
            }
        }
        if($_GET){
            $id_form = $_GET['id'];
        } else {
            $id_form = 0;
        }
        $lista = $conn->query("select * from funcionario where id = $id_form");
        $row = $lista->fetch_assoc();
        $numRow = $lista->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/cadastro.css">
    <title>Editar Funcionário</title>
</head>
<body class="fundo_areas">
    <div class="container mt-4 d-flex justify-content-center">
        <div class="card" style="width: 50%;">
            <h1 class="card-header text-center">Editar Funcionário - <?php echo $row['nome']?></h1>
            <div class="card-body">
                <!-- Formulário de Cadastro de Funcionário -->
                <form class="container" style="display: flex; justify-content: center; flex-direction: column;" action="atualizar_funcionario.php" method="post" name="form_funcionario_atualiza" enctype="multipart/form-data" onsubmit="return validaForm() && validaFormPeriodo()">
                    <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $row['id'] ?>">
                    <div class="form-row" style="display: flex; justify-content: center; flex-direction: column;">
                        <div class="form-group">
                            <label for="nome">Nome Completo</label>
                            <input type="text" name="nome" maxlength="50" class="form-control" id="nome" placeholder="Digite o nome completo do funcionário" value="<?php echo $row['nome'] ?>" required>
                        </div>
                        <br>
                        <div class="form-group ">
                            <label for="data_nasc">Data de Nascimento</label>
                            <input type="date" name="data" class="form-control" id="data_nasc" value="<?php echo $row['data_nasc'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control" id="cpf" placeholder="Digite o CPF do funcionário" value="<?php echo $row['cpf'] ?>" onkeypress="$(this).mask('000.000.000-00');" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="cargo">Cargo</label>
                            <select class="form-control" name="cargo" id="cargo" required>
                                <option value="selecione">-- Selecione uma opção --</option>
                                <option value="Enfermeiro" <?php if($row['cargo'] == 'Enfermeiro') echo 'selected' ?>>Enfermeiro</option>
                                <option value="Estagiario" <?php if($row['cargo'] == 'Estagiario') echo 'selected' ?>>Estagiario</option>
                                <option value="Medico" <?php if($row['cargo'] == 'Medico') echo 'selected' ?>>Medico</option>
                                <option value="Auxiliar" <?php if($row['cargo'] == 'Auxiliar') echo 'selected' ?>>Auxiliar Enf</option>
                                <option value="Tecnico" <?php if($row['cargo'] == 'tecnico') echo 'selected' ?>>Tecnico</option>
                                <option value="Atendente" <?php if($row['cargo'] == 'Atendente') echo 'selected' ?>>Atendente</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group ">
                            <label for="coren">COREN</label>
                            <input type="text" name="coren" class="form-control" id="coren" placeholder="Digite o COREN do funcionário" value="<?php echo $row['coren'] ?>" disabled required>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="crm">CRM</label>
                            <input type="text" name="crm" class="form-control" id="crm" placeholder="Digite o CRM do funcionário" value="<?php echo $row['CRM'] ?>" disabled required>
                        </div>
                        <br>
                        <div class="form-group ">
                            <label for="rg">RG</label>
                            <input type="text" name="rg" class="form-control" id="rg" placeholder="Digite o RG do funcionário" value="<?php echo $row['rg'] ?>" onkeypress="$(this).mask('00.000.000-0');" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="funcao">Função</label>
                            <textarea required class="form-control" name="funcao" id="funcao" rows="3" maxlength="100"><?php echo $row['funcao'] ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="periodo">Período</label>
                            <select id="periodo" name="periodo" class="form-control" required>
                                <option value="selecioneP">-- Selecione uma opção --</option>
                                <option value="Manha" <?php if($row['cargo'] == 'Manha') echo 'selected' ?>>Manha</option>
                                <option value="Tarde" <?php if($row['cargo'] == 'Tarde') echo 'selected' ?>>Tarde</option>
                                <option value="Noite" <?php if($row['cargo'] == 'Noite') echo 'selected' ?>>Noite</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="salario">Salário</label>
                            <input required type="number" name="salario" class="form-control" id="salario" placeholder="Digite o Salário do Funcionario" value="<?php echo $row['salario'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="func">
                                <input required value="func" type="radio" name="adm" id="adm" value="func" <?php echo ($row['adm'] == 'func') ? 'checked' : ''; ?>> Funcionario
                            </label>
                            <label for="adm">
                                <input required value="adm" type="radio" name="adm" id="adm" value="adm" <?php echo ($row['adm'] == 'adm') ? 'checked' : ''; ?>> Administrador
                            </label>
                        </div>
                        <br>
                        <div class="form-group ">
                            <label>Ativo?</label><br>
                            <label for="ativo">
                                <input type="checkbox" name="ativo" id="ativo" value="1" <?php echo ($row['ativo'] == '1') ? 'checked' : ''; ?>> Sim
                            </label>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary" type="submit">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</body>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        //ativa o campo caso seja enfermeiro ou medico
        const cargoSelect = document.getElementById('cargo');
        const corenInput = document.getElementById('coren');
        const crmInput = document.getElementById('crm');

        cargoSelect.addEventListener('change', () => {
            const selectedOption = cargoSelect.value;

            if (selectedOption === 'Enfermeiro' || selectedOption === 'Auxiliar') {
                corenInput.disabled = false;
                crmInput.disabled = true;
            } else if (selectedOption === 'Medico') {
                corenInput.disabled = true;
                crmInput.disabled = false;
            } else {
                corenInput.disabled = true;
                crmInput.disabled = true;
            }
        });
    </script>
    <script>
        function validaForm() {
            var selectOpcao = document.getElementById("cargo");
            if (selectOpcao.value === "selecione") {
                alert("Por favor, selecione um cargo válido .");
                return false;
            }
                return true;
        }
    </script>
    <script>
        function validaFormPeriodo() {
            var selectOpcao2 = document.getElementById("periodo");
            if (selectOpcao2.value === "selecioneP") {
                alert("Por favor, selecione um periodo válido .");
                return false;
            }
                return true;
        }
    </script>
</html>