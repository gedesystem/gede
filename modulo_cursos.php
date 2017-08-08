<?php

include("topo_pagina.php");

error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
?>


<section>

    <h2 class="Titulo">Cursos da Instituição</h2>

    <form method="post" style="display: inline;" action="curso_pesquisa.php">
        <input style="display: inline;" size="100" type="text"  id="iBusca" name="nBusca" placeholder="&nbsp;Buscar curso por...">

        <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
        </button>

        <div class="radio">
            <label><input type="radio" name="opcao" value="nome" checked/>Nome</label>
            <label><input type="radio" name="opcao" value="codigo_curso" >Código</label>
            <label><input type="radio" name="opcao" value="grau">Grau acadêmico</label>
        </div>

    </form>

    <HR NOSHADE SIZE="6">

    <h2 class="Titulo">Ações</h2> 

    <div class="btn-group" role="group" aria-label="...">
        <button type="button" class="btn btn-default" onclick="location.href = 'curso_adicionar_cadastro.php'">Adicionar cursos</button>
        <button type="button" class="btn btn-default" onclick="location.href = 'curso_listar_todos.php'">Listar cursos</button>
    </div>

    <HR NOSHADE SIZE="6">

    <h2 class="Titulo">Dados sobre cursos</h2> 

    Total de cursos: 
    <br>

</section>

<?php include("fim_pagina.php"); ?>
