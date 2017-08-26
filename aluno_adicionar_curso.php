<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$matricula = $_POST['matricula_uefs'];
?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Vínculo do Aluno ao Curso</h2>

        <HR NOSHADE SIZE="4">

        <p>Código do Curso:<input type="text" class="form-control" required="required" name="nCodigoCurso" pattern="[0-9]+$" placeholder="Código do Curso."></p>

        <p>Turno do Aluno no Curso</p>
        <div class="radio">
            <label><input type="radio" name="nTurnoAluno" value="1" checked/>Matutino</label>
            <label><input type="radio" name="nTurnoAluno" value="2">Vespertino</label>
            <label><input type="radio" name="nTurnoAluno" value="3">Noturno</label>
            <label><input type="radio" name="nTurnoAluno" value="4">Integral</label>
            <label><input type="radio" name="nTurnoAluno" value="5">EAD</label>
        </div>

        <p>Situação do Vínculo do Aluno no Curso</p>
        <div class="radio">
            <label><input type="radio" name="nSituacaoAluno" value="2" checked
                onclick="selecionarSituacaoAluno(this.value)"/>Cursando</label>
            <label><input type="radio" name="nSituacaoAluno" value="3"
                onclick="selecionarSituacaoAluno(this.value)">Matrícula Trancada</label>
            <label><input type="radio" name="nSituacaoAluno" value="4"
                onclick="selecionarSituacaoAluno(this.value)">Desvinculado do Curso</label>
            <label><input type="radio" name="nSituacaoAluno" value="5"
                onclick="selecionarSituacaoAluno(this.value)">Transferido para Outro Curso da Mesma IES</label>
            <label><input type="radio" name="nSituacaoAluno" value="6"
                onclick="selecionarSituacaoAluno(this.value)">Formado</label>
            <label><input type="radio" name="nSituacaoAluno" value="7"
                onclick="selecionarSituacaoAluno(this.value)">Falecido</label>
        </div>

        <p>Semestre de Ingresso do Curso:<input type="text" class="form-control" required="required" name="nSemestreIngresso" pattern="0(1|2)[0-9]{4}" placeholder="Semestre e ano no seguinte formato: SSAAAA. Exemplo:012014"></p>

        <div id='iSemestreConclusao' style="display:none">
            <p>Semestre de Conclusão do Curso:<input type="text" class="form-control" name="nSemestreConclusao" pattern="0(1|2)[0-9]{4}" placeholder="Semestre e ano no seguinte formato: SSAAAA. Exemplo:012014"></p>
        </div>

        <p>Carga Horária Total: <input type="text" size="4" name="nCargaHorariaTotal" pattern="[0-9]+$" title="Carga Horária Total."></p>

        <p>Carga Horária Integralizada: <input type="text" size="4" name="nCargaHorariaIntegralizada" pattern="[0-9]+$" title="Carga Horária Integralizada."></p>

        <p>Aluno PARFOR?:</p>
        <div class="radio">
            <label><input type="radio" name="nPARFOR" value="1" checked/>Sim</label>
            <label><input type="radio" name="nPARFOR" value="0">Não</label>
        </div>

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."></p>

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

        <HR NOSHADE SIZE="4">
    </form>

    <form method="post" action="aluno_detalhes.php">
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<script src="js/aluno_adicionar_curso_form.js"></script>

<?php include("fim_pagina.php"); ?>
