<?php include("topo_pagina.php"); ?>

<section>

    <h2 class="Titulo">Histório Avançado</h2>

    <form method="post" style="display: inline;" action=".php">
        <input style="display: inline;" size="100" type="text"  id="iBusca" name="nBusca" placeholder="&nbsp;Buscar elemento por...">

        <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Exibir
        </button>

        <div class="radio">
            <label><input type="radio" name="opcao" value="aluno" checked/>Discente</label>
            <label><input type="radio" name="opcao" value="professor">Docente</label>

        </div>
    </form>

    <HR NOSHADE SIZE="6">
    
    <img id="timeline" width="500" src="imagens/timeline.png"/>

    

</section>

<?php include("fim_pagina.php"); ?>

