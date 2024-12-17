<?php
require 'phpmailer/src/PHPMailerAutoload.php';

$mail=new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smpt.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'aaronglez302@gmail.com';
$mail->Password = 'lnkj full kmof mwll';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->PORT = 465;

$mail->setFrom('aaronglez302@gmail.com', 'Aaron');
$mail->addReplyTo('aaronglez302@gmail.com', 'Aaron');

$mail->addAddress('aaronglez302@gmail.com', 'Aaron');
$mail->isHTML(true);
$mail->Subject = 'Asunto del mensaje';
$mail->Body = 'Contenido del mensaje';
if(!$mail->send()){
    echo 'Error: ' .$mail->ErrorInfo;
} else{
    echo 'Correo enviado exitosamente';
}
?>