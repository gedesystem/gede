function selecionarNacionalidade(valorClicado) {
    var iInfoEstrangeiro = document.getElementById('iInfoEstrangeiro');
    //iInfoEstrangeiro.value =
    iInfoEstrangeiro.style.display = (valorClicado == 1) ? 'none' : 'block';

    document.getElementById('iInfoBrasileiro').style.display =
            (valorClicado == 1) ? 'block' : 'none';
}

function selecionarTemDeficiencia(valorClicado) {
    var iDeficiencia = document.getElementById('iDeficiencia');

    iDeficiencia.style.display = (valorClicado == 1) ? 'block' : 'none';
}
