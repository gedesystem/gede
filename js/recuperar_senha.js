function recuperarSenha() {
    var form = document.getElementById('recuperarSenha');
    var loader = document.getElementById('loader');

    var xhr = new XMLHttpRequest();
    var formData = new FormData(form);

    loader.style.display = 'block';

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            loader.style.display = 'none';
            alert(this.responseText);
        }
    };
    xhr.open("POST", "email_recuperar_senha.php", true);
    xhr.send(formData);
}
