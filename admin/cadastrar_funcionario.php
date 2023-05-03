<?php 
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php';
    
    if($_POST){
        $nome = $_POST['nome'];
        $data = $_POST['data'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $coren = isset($_POST['coren']) ? $_POST['coren'] : '';
        $crm = isset($_POST['crm']) ? $_POST['crm'] : '';
        $rg = $_POST['rg'];
        $cargo = $_POST['cargo'];
        $funcao = $_POST['funcao'];
        $periodo = $_POST['periodo'];
        $salario = $_POST['salario'];
        $adm = $_POST['adm'];
        //GERADOR DE HASHCODE
        $cpf_prefix = substr($cpf, 0, 3); // extrai os três primeiros dígitos do CPF
        $id_unic = uniqid(); // gera um ID único
        $hashcode = "TRAT-" . $cpf_prefix . "-" . $id_unic; // concatena tudo

        // verifica se já existe um funcionário com o mesmo CPF
        $verificaCPF = "SELECT cpf FROM funcionario WHERE cpf = '$cpf'";
        $resultadoCPF = $conn->query($verificaCPF);

        if(mysqli_num_rows($resultadoCPF) > 0) {
            // exibe mensagem de erro e interrompe o script
            echo "Já existe um funcionário com esse CPF!";
            exit;
        }
        //inserir funcionario
        $insereFunc = "INSERT INTO funcionario 
        (nome, data_nasc, cpf, coren, crm, rg, cargo, funcao, periodo, salario, adm, imagem, hash, ativo)
        VALUES ('$nome','$data','$cpf','$coren','$crm','$rg','$cargo','$funcao','$periodo','$salario','$adm','user_sem_foto.png','$hashcode','1')";

        $resultado = $conn->query($insereFunc);
        //inserir email do funcionário
        $id_func = mysqli_insert_id($conn);
        $insereEmail = "INSERT INTO email_func (id, email, id_func) VALUES('', '$email', '$id_func')";
        
        $conexao = $conn;
        $resultadoEmail = $conexao->query($insereEmail);

        if(mysqli_insert_id($conn)){
            $id = mysqli_insert_id($conn);
            $selectHash = "SELECT id FROM funcionario where cpf = '$cpf'";
            $resultado2 = $conn->query($selectHash);
            $row = mysqli_fetch_assoc($resultado2);
            $funcionario_id = $row['id'];

            $cpf_sem_ponto = str_replace('.', '', $cpf); // remove os pontos do CPF
            $cpf_tratado = substr($cpf_sem_ponto, 0, 5); // extrai os primeiros cinco dígitos do CPF sem ponto
            $insereSenha = "INSERT INTO login_func VALUES ('', '$cpf_tratado', '$funcionario_id')";
            $resultado3 = $conn->query($insereSenha);
            //enviar senha por email
            include '../envia_cadastro.php';
            header('location: ../admin/listar_funcionarios.php');
        } 
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/cadastro.css">
    <title>Cadastrar Funcionário</title>
</head>
<!-- ---------------------------------------------------------------------------- -->
<body class="fundo_areas">
<div class="barra fixed-top" style="background-color: #38B6FF;">
        <br> <br>
 </div>
    <br><br>
    <div class="container mt-4 d-flex justify-content-center">
        <div class="card" style="width: 50%;">
            <h1 class="card-header text-center" style="color: #38B6FF;">Cadastro de Funcionário</h1>
            <div class="card-body">
                <!-- Formulário de Cadastro de Funcionário -->
                <form class="container" style="display: flex; justify-content: flex-start; flex-direction: column;" action="cadastrar_funcionario.php" method="post" name="form_funcionario_cadastro" enctype="multipart/form-data" onsubmit="return validaForm() && validaFormPeriodo()">
                    <div class="form-row" style="display: flex; justify-content: center; flex-direction: column;">
                        <div class="form-group">
                            <label for="nome">Nome Completo</label>
                            <input type="text" name="nome" maxlength="50" class="form-control" id="nome" placeholder="Digite o nome completo do funcionário" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nome">Email</label>
                            <input type="email" name="email" maxlength="50" class="form-control" id="email" placeholder="Digite o email do paciente completo " required>
                        </div>
                        <br>
                        <div class="form-group ">
                            <label for="data_nasc">Data de Nascimento</label>
                            <input type="date" name="data" class="form-control" id="data_nasc" min="1940-01-01" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control" id="cpf" placeholder="Digite o CPF do funcionário" onkeypress="$(this).mask('000.000.000-00');" required>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="cargo">Cargo</label>
                                <select class="form-control" name="cargo" id="cargo">
                                    <option value="selecione">-- Selecione uma opção --</option>
                                    <option value="enfermeiro">Enfermeiro</option>
                                    <option value="estagiario">Estagiario</option>
                                    <option value="auxiliar">Auxiliar Enf</option>
                                    <option value="tecnico">Tecnico</option>
                                    <option value="medico">Medico</option>
                                    <option value="atendente">Atendente</option>
                                </select>
                            </div>
                            <br>
                        <div class="form-group ">
                            <label for="coren">COREN</label>
                            <input type="text" name="coren" class="form-control" id="coren" placeholder="Digite o COREN do funcionário" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="crm">CRM</label>
                            <input type="text" name="crm" class="form-control" id="crm" placeholder="Digite o CRM do funcionário" disabled required>
                        </div>
                        <br>
                        <div class="form-group ">
                            <label for="rg">RG</label>
                            <input type="text" name="rg" class="form-control" id="rg" placeholder="Digite o RG do funcionário" onkeypress="$(this).mask('00.000.000-0');" required>
                        </div>
                    </div>
                    <br>
                        <div class="form-group ">
                            <label for="funcao">Função</label>
                            <textarea class="form-control" name="funcao" id="funcao" rows="3" maxlength="100" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="periodo">Período</label>
                            <select id="periodo" name="periodo" class="form-control" required>
                                <option value="selecioneP">-- Selecione uma opção --</option>
                                <option>Manha</option>
                                <option>Tarde</option>
                                <option>Noite</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="salario">Salário</label>
                            <input type="number" name="salario" class="form-control" id="salario" placeholder="Digite o Salário do Funcionario" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group ">
                            <label for="func">
                                <input value="func" type="radio" name="adm" id="adm"> Funcionario
                            </label>
                            <label for="adm">
                                <input value="adm" type="radio" name="adm" id="adm"> Administrador
                            </label>
                        </div>
                    </div>
                    <br>
                    <button class="btn" type="submit" style="background-color: #38B6FF;">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- --------------------- -->
<div>
        <div class="d-flex flex-column flex-shrink-0 p-3 " style="position: fixed; top: 0; left: 0; bottom: 0; width: 280px; background-color: #38B6FF; z-index: 9999;">
            <div>
                <figure style="display: flex;">
                    <img src="../images/logoPesq.png" alt="Logo Tratferi" width="75vw"> 
                    <a href="../index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none" style="font-size: 32pt;">
                        Tratferi
                    </a> 
                </figure>
            </div>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="../admin/index.php" class="nav-link" aria-current="page" style="color: #fff;">
                        <img src="../images/dashboard.svg" alt="" width="20vw">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="../admin/cadastrar_funcionario.php" class="nav-link" style="color: #fff;">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                        Cadastrar
                    </a>
                </li>
                <li>
                    <a href="funcionarios_arquivados.php" class="nav-link" style="color: #fff;">
                        <img src="../images/usuarios.svg" alt="" width="20vw">
                        Usuarios Arquivados
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link" style="color: #fff;">
                        <img src="../images/cama.svg" alt="" width="20vw">
                        Leitos
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link" style="color: #fff;">
                        <img src="../images/predio.svg" alt="" width="20vw">    
                        Departamentos
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link" style="color: #fff;">
                        <img src="../images/predio.svg" alt="" width="20vw">    
                        Designação
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link" style="color: #fff;">
                        <img src="../images/predio.svg" alt="" width="20vw">    
                        RH
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link" style="color: #fff;">
                        <img src="../images/coracao.svg" alt="" width="20vw">    
                        Ajuda
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link" style="color: #fff;">
                        <img src="../images/anuncio.svg" alt="" width="20vw">
                        Anuncios
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <img src="../fotos_usuarios/<?php echo $_SESSION['Imagem']; ?>" alt="Foto de Perfil - <?php echo $_SESSION['nome']?>" width="32" height="32" class="rounded-circle me-2">
                <strong><a style="text-decoration: none; color: white;"><?php echo $_SESSION['nome'];?></a></strong>
                <button class="dropdown-toggle border-0" style="background-color: #38B6FF; color: white;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu user" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="../admin/perfil/config_perfil.php"><ion-icon name="person-outline"></ion-icon>Perfil</a>
                    <a class="dropdown-item" href="../admin/logout_Fun.php"><ion-icon name="exit-outline"></ion-icon>Sair</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------------- -->
    

    <br>
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

            if (selectedOption === 'enfermeiro' || selectedOption === 'auxiliar') {
                corenInput.disabled = false;
                crmInput.disabled = true;
            } else if (selectedOption === 'medico') {
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