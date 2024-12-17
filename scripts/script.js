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