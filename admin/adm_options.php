<?php
    include '../admin/acesso_com_fun.php';
    include '../connection/connect.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa</title>
</head>
<body>
<div>
    <main style="margin-left: 280px; bottom: 0;">
        <div class="bg-dark">
            <br><br>
        </div>
        <div>
            <figure style="display: flex; margin: 10px;">
                <img src="../images/logo_dark.png" alt="Logo Tratferi" width="45vw" height="45vw">
                <h1>Área Administrativa - <?php echo($_SESSION['nome']); ?> </h1>
            </figure>
            <div style="display: flex; justify-content: end;">
                <div class="border-bottom border-2 border-dark" style="width: 96%; margin-right: 30px;"></div>
            </div>
        </div>
        <div>
            <br>
            <div style="display: flex; flex-wrap: wrap; margin-left: 20px;">
                <div class="card card2 bg-dark" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">1</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light"><a href="../admin/listar_funcionarios.php" id="AdmOpcoesbtn">Funcionários Ativos</a></h5>
                    </div>
                </div>
                <div class="card card2 bg-dark" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">2</p>
                    </div>    
                    <div class="card-body">
                        <h5 class="card-title text-light"><a href="../admin/adm_solicitacoes_user.php" id="AdmOpcoesbtn">Pacientes Ativos</a></h5>
                    </div>
                </div>
                <div class="card card2 bg-dark" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">3</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light"><a href="../admin/funcionarios_arquivados.php" id="AdmOpcoesbtn">Usuarios Arquivados</a></h5>
                    </div>
                </div>
                <div class="card card2 bg-dark" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">4</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light">Enfermeiros Ativos</h5>
                    </div>
                </div>
                <div class="card card2 bg-dark" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">5</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light">Farmacêuticos</h5>
                    </div>
                </div>
                <div class="card card2 bg-dark" style="width: 18rem; height: 12rem;">
                    <div class="d-flex" style="justify-content: space-between;">
                        <img src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                        <p class="text-light" style="font-size: 28pt; margin-right: 15px;">6</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-light">Recepcionistas</h5>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>