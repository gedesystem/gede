<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');

$matricula_uefs = $_POST["matricula_uefs"];

conexao();

$sql_seleciona = "SELECT * FROM alunos_dados_cursos WHERE matricula_uefs = '" . $matricula_uefs . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);

?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Editar Vínculo do Aluno ao Curso</h2>

        <HR NOSHADE SIZE="4">

        <p>Código do Curso:<input type="text" class="form-control" required="required" name="nCodigoCurso" pattern="[0-9]+$" placeholder="Código do Curso."
            value="<?php echo($res['codigo_curso']); ?>"></p>

        <p>Turno do Aluno no Curso</p>
        <div class="radio">
            <label><input type="radio" name="nTurnoAluno" value="1" <?php
                echo(($res['turno'] == 1) ? "checked" : ""); ?>/>Matutino</label>
            <label><input type="radio" name="nTurnoAluno" value="2" <?php
                echo(($res['turno'] == 2) ? "checked" : ""); ?>>Vespertino</label>
            <label><input type="radio" name="nTurnoAluno" value="3" <?php
                echo(($res['turno'] == 3) ? "checked" : ""); ?>>Noturno</label>
            <label><input type="radio" name="nTurnoAluno" value="4" <?php
                echo(($res['turno'] == 4) ? "checked" : ""); ?>>Integral</label>
            <label><input type="radio" name="nTurnoAluno" value="5" <?php
                echo(($res['turno'] == 5) ? "checked" : ""); ?>>EAD</label>
        </div>

        <p>Situação do Vínculo do Aluno no Curso</p>
        <div class="radio">
            <label><input type="radio" name="nSituacaoAluno" value="2"
                <?php echo(($res['situacao'] == 2) ? "checked" : ""); ?>
                onclick="selecionarSituacaoAluno(this.value)"/>Cursando</label>
            <label><input type="radio" name="nSituacaoAluno" value="3"
                <?php echo(($res['situacao'] == 3) ? "checked" : ""); ?>
                onclick="selecionarSituacaoAluno(this.value)">Matrícula Trancada</label>
            <label><input type="radio" name="nSituacaoAluno" value="4"
                <?php echo(($res['situacao'] == 4) ? "checked" : ""); ?>
                onclick="selecionarSituacaoAluno(this.value)">Desvinculado do Curso</label>
            <label><input type="radio" name="nSituacaoAluno" value="5"
                <?php echo(($res['situacao'] == 5) ? "checked" : ""); ?>
                onclick="selecionarSituacaoAluno(this.value)">Transferido para Outro Curso da Mesma IES</label>
            <label><input type="radio" name="nSituacaoAluno" value="6"
                <?php echo(($res['situacao'] == 6) ? "checked" : ""); ?>
                onclick="selecionarSituacaoAluno(this.value)">Formado</label>
            <label><input type="radio" name="nSituacaoAluno" value="7"
                <?php echo(($res['situacao'] == 7) ? "checked" : ""); ?>
                onclick="selecionarSituacaoAluno(this.value)">Falecido</label>
        </div>

        <p>Semestre de Ingresso do Curso:<input type="text" class="form-control" required="required" name="nSemestreIngresso" pattern="0(1|2)[0-9]{4}" placeholder="Semestre e ano no seguinte formato: SSAAAA. Exemplo:012014"
            value="<?php echo($res['semestre_ingresso']); ?>"></p>

        <div id='iSemestreConclusao' style="<?php echo(($res['situacao'] == 6) ? 'display:block' : 'display:none'); ?>">
            <p>Semestre de Conclusão do Curso:<input type="text" class="form-control" name="nSemestreConclusao" pattern="0(1|2)[0-9]{4}" placeholder="Semestre e ano no seguinte formato: SSAAAA. Exemplo:012014"
                value="<?php echo($res['semestre_conclusao']); ?>"></p>
        </div>

        <p>Carga Horária Total: <input type="text" size="4" name="nCargaHorariaTotal" pattern="[0-9]+$" title="Carga Horária Total."
            value="<?php echo($res['ch_total']); ?>"></p>

        <p>Carga Horária Integralizada: <input type="text" size="4" name="nCargaHorariaIntegralizada" pattern="[0-9]+$" title="Carga Horária Integralizada."
            value="<?php echo($res['ch_integralizada']); ?>"></p>

        <p>Aluno PARFOR?:</p>
        <div class="radio">
            <label><input type="radio" name="nPARFOR" value="1"
                <?php echo(($res['aluno_parfor'] == 1) ? "checked" : ""); ?>/>Sim</label>
            <label><input type="radio" name="nPARFOR" value="0"
                <?php echo(($res['aluno_parfor'] == 0) ? "checked" : ""); ?>>Não</label>
        </div>

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."
            value="<?php echo($res['fonte']); ?>"></p>

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

        <HR NOSHADE SIZE="4">
    </form>

    <form method="post" action="aluno_editar_cadastro.php">
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula_uefs); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<script src="js/aluno_adicionar_curso_form.js"></script>

<?php include("fim_pagina.php"); ?>
