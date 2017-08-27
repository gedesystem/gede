function selecionarMobilidade(valorClicado){
    document.getElementById('iInternacional').style.display =
        (valorClicado == 2) ? 'block' : 'none';

    document.getElementById('iNacional').style.display =
        (valorClicado == 2) ? 'none' : 'block';
}
