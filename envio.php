<?php

if($_SERVER["REQUEST_METHOD"]  == "POST"){
    $nombre= htmlspecialchars($_POST['nombre']);
    $email= htmlspecialchars($_POST['email']);
    $tel= htmlspecialchars($_POST['tel']);
    $mensaje= htmlspecialchars($_POST['asunto']);
    $destinatario= "aaronglez302@gmail.com";
    $asunto= "Nuevo mensaje del formulario";
    $cuerpo= "Nombre: $nombre\n";
    $cuerpo= "Correo: $email\n";
    $cuerpo= "Telefono: $tel\n";
    $cuerpo= "Mensaje: $asunto\n";
    $headers= "From: $email\r\n";
    $headers .="Reply-To: $email\r\n";
    if (@mail($destinatario, $asunto, $cuerpo, $headers)) {
        echo "Correo enviado exitosamente.";
    } else{
        echo "Hubo un error al enviar el correo.";
    }
}
?>
<a href="index.html"><br>Volver a inicio</a>
