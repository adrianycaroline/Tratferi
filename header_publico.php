<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="shortcut icon" href="images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="CSS/estilo.css">
    <title>Header Publico</title>
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #38B6FF;">
            <div class="container-fluid">
            <a class="navbar-brand" href="index.php#">
                    <img src="images/logo.png" class="img-responsive" alt="logo" width="150">
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto me-auto d-flex gap-5">
                    <li class="nav-item buttonBoxMenu" id="nav-item2-flutuante">
                            <a class="nav-link" href="index.php" style="color: #fff; font-size: 20px;">Home</a>
                        </li>
                        <li class="nav-item buttonBoxMenu" id="nav-item2-flutuante">
                            <a class="nav-link" href="conscientização.php" style="color: #fff; font-size: 20px;">Conscientização</a>
                        </li>
                        <li class="nav-item buttonBoxMenu" id="nav-item2-flutuante">
                            <a class="nav-link" href="download.php" style="color: #fff; font-size: 20px;">Downloads</a>
                        </li>
                        <li class="nav-item buttonBoxMenu" id="nav-item2-flutuante">
                            <a class="nav-link" href="sobre.php" style="color: #fff; font-size: 20px;">Sobre</a>
                        </li>
                    </ul>
                    <div class="navbar-nav px-2">
                        <div class="nav-item redondobtn" style="background-color: #E88F07;">
                            <?php 
                                session_start();
                            ?>
                            <?php if((isset($_SESSION['login'])) && ($_SESSION['login'] != "tratferi")) {?>
                                <?php if($_SESSION['login'] == "tratferiFun") {?>
                                    <a href="func/index.php" class="nav-link" style="color: #fff; font-size: 20px;">
                                    <?php echo $_SESSION['nome'];?>
                                <?php }elseif($_SESSION['login'] == "tratferiAdm") {?>
                                    <a href="admin/index.php" class="nav-link" style="color: #fff; font-size: 20px;">
                                    <?php echo $_SESSION['nome'];?>
                                <?php }?>
                            <?php }elseif((isset($_SESSION['login'])) && ($_SESSION['login'] == "tratferi")){?>
                                <a href="client/index.php" class="nav-link" style="color: #fff; font-size: 20px;">
                                    <?php echo $_SESSION['nome'];?>
                            <?php }else{?>   
                                <a href="admin/verifica.php" class="nav-link" style="color: #fff; font-size: 20px;"> Entrar
                            <?php }?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
            <!-- agrupamento mobile -->
            <div class="pos-f-t">
                <div class="nav-item active" id="active-menu-item">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="p-4">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="index.php#">Home</a>
                            <hr style="color: #fff;">
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="conscientização.php#">Conscientização</a>
                            <hr style="color: #fff;">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="download.php#">Downloads</a>
                            <hr style="color: #fff;">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="sobre.php#">Sobre</a>
                            <hr style="color: #fff;">
                        </li>
                        <li class="nav-item">
                            <?php if((isset($_SESSION['login'])) && ($_SESSION['login'] != "tratferi")) {?>
                                <?php if($_SESSION['login'] == "tratferiFun") {?>
                                    <a href="func/index.php" class="nav-link" style="color: #fff;">
                                    <?php echo $_SESSION['nome'];?>
                                <?php }elseif($_SESSION['login'] == "tratferiAdm") {?>
                                    <a href="admin/index.php" class="nav-link" style="color: #fff;">
                                    <?php echo $_SESSION['nome'];?>
                                <?php }?>
                            <?php }elseif((isset($_SESSION['login'])) && ($_SESSION['login'] == "tratferi")){?>
                                <a href="client/index.php" class="nav-link" style="color: #fff;">
                                    <?php echo $_SESSION['nome'];?>
                            <?php }else{?>   
                                <a href="admin/verifica.php" class="nav-link" style="color: #fff;"> Entrar
                            <?php }?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                            </a>
                        </li>

                    </ul>
                    </div>
                </div>
                <nav class="navbar">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon" style="color: #fff;"></span>
                    </button>
                </nav>
            </div>
            <!-- fecha agrupamento mobile  -->
            </div>
        </div>
        </nav>

        <div class="linha container-fluid py-5"></div>
    </div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
<script>
    window.addEventListener("resize", function() {
    if (window.innerWidth > 992) { // altere o valor aqui para corresponder ao ponto de interrupção do seu responsivo
        var menu = document.querySelector("#navbarToggleExternalContent");
        if (menu.classList.contains("show")) {
            var activeItem = document.querySelector("#active-menu-item");
            activeItem.classList.remove("active");
            menu.classList.remove("show");
        }
    }
});
</script>

</html>

