<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa</title>
</head>
<body>
    <main style="margin-left: 280px;">
        <div class="bg-dark">
            <br><br>
        </div>
        <div>
            <figure style="display: flex; margin: 10px;">
                <img src="../images/logo_dark.png" alt="Logo Tratferi" width="50vw">
                <h1>Área Administrativa - <?php echo($_SESSION['nome']); ?></h1>
            </figure>
            <div style="display: flex; justify-content: end;">
                <div class="border-bottom border-2 border-dark" style="width: 75%; margin-right: 30px;"></div>
            </div>
        </div>
        <div>
            <br>
            <div style="display: flex; justify-content: end; flex-wrap: wrap;">
                <div class="card bg-dark" style="width: 18rem; height: 12rem;">
                    <img class="" src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                    <div class="card-body">
                        <h5 class="card-title text-light">Médicos Ativos</h5>
                    </div>
                </div>
                <div class="card bg-dark" style="width: 18rem; height: 12rem;">
                    <img class="" src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                    <div class="card-body">
                        <h5 class="card-title text-light">Pacientes Ativos</h5>
                    </div>
                </div>
                <div class="card bg-dark" style="width: 18rem; height: 12rem;">
                    <img class="" src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                    <div class="card-body">
                        <h5 class="card-title text-light">Representantes</h5>
                    </div>
                </div>
                <div class="card bg-dark" style="width: 18rem; height: 12rem;">
                    <img class="" src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                    <div class="card-body">
                        <h5 class="card-title text-light">Enfermeiros Ativos</h5>
                    </div>
                </div>
                <div class="card bg-dark" style="width: 18rem; height: 12rem;">
                    <img class="" src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                    <div class="card-body">
                        <h5 class="card-title text-light">Farmacêuticos</h5>
                    </div>
                </div>
                <div class="card bg-dark" style="width: 18rem; height: 12rem;">
                    <img class="" src="../images/users.png" alt="Usuários" style="margin: 10px;" width="50vw">
                    <div class="card-body">
                        <h5 class="card-title text-light">Recepcionistas</h5>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>