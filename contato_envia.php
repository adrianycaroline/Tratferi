<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo_minimizada.png" type="image/x-icon">
    <link rel="stylesheet" href="CSS/estilo.css">
    <title>Contato</title>
</head>
    <body class="fundo_cont">
        <?php
        $nome = $_POST['nome_contato'];
        $email = $_POST['email_contato'];
        $mensagem = $_POST['comentario_contato'];

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

require './lib/vendor/autoload.php';

        $mail = new PHPMailer(true);

        try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tratferi_site@outlook.com';
            $mail->Password = 'Trat@123';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('tratferi_site@outlook.com', 'Atendimento TratFeri'); // site
            $mail->addAddress('tratferi@gmail.com', 'TratFeri'); //ADM
            
            $mail->isHTML(true);                                 
            $mail->Subject = "Mensagem de $nome";
            $mail->Body = "$mensagem<br>Email de contato: $email";

            $mail->send(); ?>
            <!-- se funcionar -->
            <h3 class="texto_contato">E-mail enviado com sucesso! Agradecemos o Contato</h3>

        <?php } catch (Exception $e) { ?>
            <!-- se não funcionar  -->
            <h3 class="texto_contato">E-mail não enviado com sucesso. Tente novamente</h3>
        <?php }?>
        
    </body>
</html>
