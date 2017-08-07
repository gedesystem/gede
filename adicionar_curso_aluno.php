<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$id_gede = $_POST["id_gede"];
?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Vínculo do Aluno ao Curso</h2> 

        <HR NOSHADE SIZE="4">

        <p>Código do Curso:<input type="text" class="form-control" required="required" name="nCodigoCurso" pattern="[0-9]+$" placeholder="Código do Curso."></p>

        <p>Código do Polo:<input type="text" class="form-control" required="required" name="nCodigoPolo" pattern="[0-9]+$" placeholder="Código do Polo."></p>

        <p>Turno do Aluno no Curso</p>
        <div class="radio">
            <label><input type="radio" name="nTurnoAluno" value="0" checked/>Matutino</label>
            <label><input type="radio" name="nTurnoAluno" value="1">Vespertino</label>
            <label><input type="radio" name="nTurnoAluno" value="2">Noturno</label>
            <label><input type="radio" name="nTurnoAluno" value="3">Integral</label>
            <label><input type="radio" name="nTurnoAluno" value="4">EAD</label>
        </div>

        <p>Situação do Vínculo do Aluno no Curso</p>
        <div class="radio">
            <label><input type="radio" name="nSituacaoAluno" value="2" checked/>Cursando</label>
            <label><input type="radio" name="nSituacaoAluno" value="3">Matrícula Trancada</label>
            <label><input type="radio" name="nSituacaoAluno" value="4">Desvinculado do Curso</label>
            <label><input type="radio" name="nSituacaoAluno" value="5">Transferido para Outro Curso da Mesma IES</label>
            <label><input type="radio" name="nSituacaoAluno" value="6">Formado</label>
            <label><input type="radio" name="nSituacaoAluno" value="7">Falecido</label>
        </div>

        <p>Carga Horária Total: <input type="text" size="4" name="nCargaHorariaTotal" pattern="[0-9]+$" title="Carga Horária Total."></p>

        <p>Carga Horária Integralizada: <input type="text" size="4" name="nCargaHorariaIntegralizada" pattern="[0-9]+$" title="Carga Horária Integralizada."></p>

        <p>Semestre de Conclusão do Curso:</p>
        <div class="radio">
            <label><input type="radio" name="nSemestreConclusao" value="1" checked/>Primeiro</label>
            <label><input type="radio" name="nSemestreConclusao" value="2">Segundo</label>
        </div>

        <p>Aluno PARFOR?:</p>
        <div class="radio">
            <label><input type="radio" name="nPARFOR" value="1" checked/>Sim</label>
            <label><input type="radio" name="nPARFOR" value="0">Não</label>
        </div>

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

        <HR NOSHADE SIZE="4">
    </form>
    
    <form method="post" action="detalhes_aluno.php">
        <input style="display: none;" type="text" name="id_gede" value="<?php echo($id_gede); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<?php include("fim_pagina.php"); ?>