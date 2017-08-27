function recuperarSenha() {
    var form = document.getElementById('recuperarSenha');

    var xhr = new XMLHttpRequest();
    var formData = new FormData(form);

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        }
    };
    xhr.open("POST", "email_recuperar_senha.php", true);
    xhr.send(formData);
}
