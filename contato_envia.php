<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo.css">
    <title>Document</title>
</head>
<body>
<?php 
$nome = $_POST['nome_contato'];
$email = $_POST['email_contato'];
$mensagem = $_POST['comentario_contato'];

require 'php-mailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

//Configurando Servidor de e-mail

$mail->Host = "smtp.office365.com";
$mail->Port = "587";
$mail->SMTPSecure = "STARTTLS";
$mail->SMTPAuth = "true";
$mail->Username = "";
$mail->Password = "";

//configuração da mensagem

$mail->setFrom($mail->Username, ""); //Rementente Site
$mail->addAddress("gustoliv10@gmail.com"); //Destinatário ADM
$mail->Subject = "Fale Conosco"; //Assunto

$conteudo_email = "Você recebeu uma mensagem de $nome. E-mail: $email.
<br><br>
Mensagem:<br>
$mensagem";

$mail->isHTML(true);
$mail->Body = $conteudo_email;

if($mail->send()){?>
    <h1>Mensagem Enviada com Sucesso. Agradecemos por Entrar em Contato!</h1>
<?php }else{ ?>
    <h1>Mensagem Não Enviada. Tente Novamente</h1>
<?php }?>

</body>
</html>