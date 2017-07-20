function exibirPasso2() {
    document.getElementById('passo2').style.display = 'block';
    document.getElementById('opcao').value = getOpcao();
    document.getElementById('Download').value = getOpcao();
}

function getOpcao() {
    return document.getElementById("lista_tabelas").value;
}

function exibirDownload() {
    // oculta as opções de baixar ou fazer upload dos modelos
    document.getElementById('passo2_1').style.display = 'none';

    // Exibe o formulario de download do modelo
    document.getElementById('passo2_2').style.display = 'block';
}

function exibirUpload() {
    document.getElementById('passo2_1').style.display = 'none';
    document.getElementById('uploadLabel').style.display = 'block';
    exibirPasso3();
}

function exibirPasso3() {
    document.getElementById('opcao').value = getOpcao();
    document.getElementById('passo3').style.display = 'block';
}

function acionaInputFile() {
    document.getElementById('input_file').click();
}

function selecionaArquivo() {
    var arquivo = document.getElementById('input_file').value;
    var textField = document.getElementById('file');

    textField.value = arquivo.split('\\').pop().split('/').pop();
}

function prepararImportacao() {
    var loader = document.getElementById('loader');
    var result = document.getElementById('result');
    loader.style.display = 'block';

    var form = document.getElementById("upload");
    var xhr = new XMLHttpRequest();
    var formData = new FormData(form);

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            loader.style.display = 'none';
            result.innerHTML = this.responseText;
        }
    };
    xhr.open("POST", form.action, true);
    xhr.send(formData);
}
