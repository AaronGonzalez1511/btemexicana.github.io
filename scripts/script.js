document.getElementById("contactForm").addEventListener("submit", function(event){
    event.preventDefault();
    const formData=new FormData(this);
    fetch('envio.php', {
        method: 'POST',
        body: formData
    })
    .then(Response=>Response.text())
    .then(data=>{
        alert(data);
    })
    .catch(error=>{
        console.error('Error:', error);
    });
});
/*if (isset($_POST['enviar'])) {
    if (!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['asunto'])) {
        $name= $_POST ['nombre'];
        $email= $_POST['email'];
        $tel= $_POST['tel'];
        $asunto= $_POST['asunto'];
        $header= "From: aaronglez302@example.com" . "\r\n";
        $header="Reply-To: aaronglez302@example.com" . "\r\n";
        $header= "X-Mailer: PHP/". phpversion();
        $mail= @mail($email, $tel, $nombre, $asunto, $header);
        if ($mail) {
            echo "<h4>¡Mail enviado exitosamente!</h4>";
        }
    }
}*/