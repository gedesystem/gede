<?php include("topo_pagina.php"); ?>

<section>

    <form method="post" action=".php">
        
        <h2 class="Titulo">Pós Graduação de Docente</h2> 

        <HR NOSHADE SIZE="4">
        
        <p>Pós-Graduação:</p>
        <div class="radio">
            <label><input type="radio" name="nPosGraduacaoDocente" value="Especializacao" checked/>Especialização</label>
            <label><input type="radio" name="nPosGraduacaoDocente" value="Mestrado">Mestrado</label>
            <label><input type="radio" name="nPosGraduacaoDocente" value="Doutorado">Doutorado</label>
            <label><input type="radio" name="nPosGraduacaoDocente" value="NaoPossui">Não Possui</label>
        </div>
        
        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
    </form>
    <button type="button" class="btn btn-warning" onclick="location.href = '.php'">Cancelar</button>

</section>

<?php include("fim_pagina.php"); ?>