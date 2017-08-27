function selecionarAlunoVinculado(valorClicado) {
    document.getElementById('iMotivoSemAluno').style.display =
        (valorClicado == 0) ? 'block' : 'none';
}

function selecionarMotivoSemAluno(valorClicado) {
    document.getElementById('iCodCursoRepresentado').style.display =
        (valorClicado == 3) ? 'block' : 'none';
}
