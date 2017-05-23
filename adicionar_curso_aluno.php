<?php include("topo_pagina.php"); ?>

<section>

    <form method="post" action=".php">
        
        <h2 class="Titulo">Vínculo do Aluno ao Curso</h2> 

        <HR NOSHADE SIZE="4">
        
        <p>Código do Curso:<input type="text" class="form-control" required="required" name="nCodigoCurso" pattern="[0-9]+$" placeholder="Código do Curso."></p>
        
        <p>Código do Polo:<input type="text" class="form-control" required="required" name="nCodigoPolo" pattern="[0-9]+$" placeholder="Código do Polo."></p>
        
        <p>Turno do Aluno no Curso</p>
        <div class="radio">
            <label><input type="radio" name="nTurnoAluno" value="Matutino" checked/>Matutino</label>
            <label><input type="radio" name="nTurnoAluno" value="Vespertino">Vespertino</label>
            <label><input type="radio" name="nTurnoAluno" value="Noturno">Noturno</label>
            <label><input type="radio" name="nTurnoAluno" value="Integral">Integral</label>
        </div>
        
        <p>Situação do Vínculo do Aluno no Curso</p>
        <div class="radio">
            <label><input type="radio" name="nSituacaoAluno" value="Cursando" checked/>Cursando</label>
            <label><input type="radio" name="nSituacaoAluno" value="Trancada">Matrícula Trancada</label>
            <label><input type="radio" name="nSituacaoAluno" value="Desvinculado">Desvinculado do Curso</label>
            <label><input type="radio" name="nSituacaoAluno" value="Transferido">Transferido para Outro Curso da Mesma IES</label>
            <label><input type="radio" name="nSituacaoAluno" value="Formado">Formado</label>
            <label><input type="radio" name="nSituacaoAluno" value="Falecido">Falecido</label>
        </div>
        
        <p>Carga Horária Total: <input type="text" size="4" name="nCargaHorariaTotal" pattern="[0-9]+$" title="Carga Horária Total."></p>
        
        <p>Carga Horária Integralizada: <input type="text" size="4" name="nCargaHorariaIntegralizada" pattern="[0-9]+$" title="Carga Horária Integralizada."></p>
        
        <p>Semestre de Conclusão do Curso:</p>
        <div class="radio">
            <label><input type="radio" name="nSemestreConclusao" value="Primeiro" checked/>Primeiro</label>
            <label><input type="radio" name="nSemestreConclusao" value="Segundo">Segundo</label>
        </div>
        
        <p>Aluno PARFOR?:</p>
        <div class="radio">
            <label><input type="radio" name="nPARFOR" value="Sim" checked/>Sim</label>
            <label><input type="radio" name="nPARFOR" value="Nao">Não</label>
        </div>
        
        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
    </form>
    <button type="button" class="btn btn-warning" onclick="location.href = 'modulo_alunos.php'">Cancelar</button>

</section>

<?php include("fim_pagina.php"); ?>