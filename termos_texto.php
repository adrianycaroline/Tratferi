<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termos Texto</title>
</head>
<style>
    .termos{
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        margin-bottom: 35px;
        font-size: 18pt;
    }

    .termos a{
        text-decoration: none;
        color: white;
    }

    .termos a:hover{
        color: #FFB800 !important;
	    -webkit-transition: all 0.5s ease;
	    -moz-transition: all 0.5s ease;
	    -o-transition: all 0.5s ease;
	    transition: all 0.5s ease;
	    text-decoration: none;
    }

    .shieldbtn{
        color: white;
    }
</style>
<body>
    <div class="termos">
        <ion-icon class="shieldbtn" name="shield-checkmark-outline"></ion-icon> <a href="../termos.php">Termos de Uso</a>
    </div>
    
</body>
</html>