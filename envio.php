<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['nombre']); // Evita inyeccion de codigo
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['tel']);
    $message = htmlspecialchars($_POST['asunto']);
    
    $to = 'aaronglez302@gmail.com';

    // Configuracion de la API
    $apiKey = 're_7SNb1jQe_LDNEx42WrMm5ue4PjFqNewQV';
    $endpoint = 'https://api.resend.com/emails';

    // Da el mensaje en formato HTML
    $htmlMessage = "
        <p><strong>Nombre:</strong> $name</p>
        <p><strong>Correo:</strong> $email</p>
        <p><strong>Telefono:</strong> $subject</p>
        <p><strong>Mensaje:</strong><br>$message</p>
    ";

    // Datos del correo
    $data = [
        'from' => 'no-reply@resend.dev',
        'to' => [$to],
        'subject' => "Nuevo mensaje de: $name",
        'html' => $htmlMessage
    ];

    // Se convirten los datos a JSON
    $jsonData = json_encode($data);

    // Configura la solicitud cURL
    $ch = curl_init($endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

    // Ejecuta la solicitud
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200) {
        echo '<script> alert("El mensaje se ha enviado correctamente. Gracias por contactarnos."); location.href="contacto.html" </script>';
    } else {
        echo "Hubo un error al enviar tu mensaje. Por favor, intenta nuevamente.";
        echo "<br><strong>Código HTTP:</strong> $httpCode";
        echo "<br><strong>Respuesta de la API:</strong> $response";
    }
} else {
    echo "Acceso no permitido.";
}
?>
