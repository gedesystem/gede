function selecionaReservaVagas(valorClicado) {
    document.getElementById('reservaVagas')
        .style.display = (valorClicado == 0) ? 'none' : 'block';
}
