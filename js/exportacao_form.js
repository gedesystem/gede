var opcaoIndex = null;

// Requisita a exportacao do arquivo
function selecionarTabela() {
    var tabelaSelect = document.getElementById('lista_tabelas');

    if (opcaoIndex === null) {

        opcaoIndex = tabelaSelect.options.selectedIndex;

        var loader = document.getElementById('loader');
        loader.style.display = 'block';

        var passo2 = document.getElementById('passo2');
        passo2.style.display = 'none';

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                loader.style.display = 'none';
                //document.getElementById('tag').value = this.responseText;
                passo2.style.display = 'block';
                opcaoIndex = null;
            }
        };
        xhr.open("POST", "preparar_exportacao.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("export=" + tabelaSelect.value);

    } else tabelaSelect.options.selectedIndex = opcaoIndex;
}
