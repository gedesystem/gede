<?php include("topo_pagina.php"); ?>

<section>

    <h2 class="Titulo">Docentes da Instituição</h2>

    <form method="post" style="display: inline;" action="docente_pesquisa.php">
        <input style="display: inline;" size="100" type="text"  id="iBusca" name="nBusca" placeholder="&nbsp;Buscar docente por...">

        <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
        </button>

        <div class="radio">
            <label><input type="radio" name="opcao" value="id_inep">ID INEP</label>
            <label><input type="radio" name="opcao" value="nome" checked/>Nome</label>
            <label><input type="radio" name="opcao" value="cpf">CPF</label>
            <label><input type="radio" name="opcao" value="matricula_uefs">Matrícula</label>
            <label><input type="radio" name="opcao" value="codigo_departamento">Departamento</label>
        </div>
    </form>

    <HR NOSHADE SIZE="6">

    <h2 class="Titulo">Ações</h2> 

    <div class="btn-group" role="group" aria-label="...">
        <button type="button" class="btn btn-default" onclick="location.href = 'docente_adicionar_cadastro.php'">Adicionar docente</button>
        <button type="button" class="btn btn-default" onclick="location.href = 'docente_listar_todos.php'">Listar docentes</button>

    </div>

    <HR NOSHADE SIZE="6">

    <h2 class="Titulo">Dados sobre docentes</h2> 

    <br>

    <img class="caps" src="imagens/doc.png"/> Doutores: 0 <br><br>

    <img class="caps" src="imagens/mes.png"/> Mestres: 0<br><br>

    <img class="caps" src="imagens/esp.png"/> Especialistas: 0<br><br>

    <img class="caps" src="imagens/gradu.png"/> Graduados: 0<br><br>

    Total de docentes: 0

</section>

<?php include("fim_pagina.php"); ?>

