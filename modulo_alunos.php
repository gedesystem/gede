<?php include("topo_pagina.php"); ?>

<section>

    <h2 class="Titulo">Discentes da Instituição</h2>

    <form method="post" style="display: inline;" action="aluno_pesquisa.php">
        <input style="display: inline;" size="100" type="text"  id="iBusca" name="nBusca" placeholder="&nbsp;Buscar discente por...">

        <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
        </button>

        <div class="radio">
            <label><input type="radio" name="opcao" value="nome" checked/>Nome</label>
            <label><input type="radio" name="opcao" value="id_inep">ID INEP</label>            
            <label><input type="radio" name="opcao" value="cpf">CPF</label>
            <label><input type="radio" name="opcao" value="matricula_uefs">Matrícula</label>
        </div>

    </form>

    <HR NOSHADE SIZE="6">

    <h2 class="Titulo">Ações</h2> 

    <div class="btn-group" role="group" aria-label="...">
        <button type="button" class="btn btn-default" onclick="location.href = 'aluno_adicionar_cadastro.php'">Adicionar discente</button>

    </div>

    <HR NOSHADE SIZE="6">

    <h2 class="Titulo">Dados sobre discentes</h2> 

    Total de discentes: 
    <br>

</section>

<?php include("fim_pagina.php"); ?>
