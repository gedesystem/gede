<?php include("topo_pagina.php"); ?>

<section>

    <h2 class="Titulo">Censo de Educação Superior</h2>
    Utilize esta sessão para exportar informações no layout de importação para o INEP.
    <HR NOSHADE SIZE="4">
    <br>
    Selecione o formato de saída dos arquivos:<br><br>
    <SELECT NAME = "lista_cursos" SIZE=1>

        <OPTION value =""> Layout 2015
        <OPTION value =""> Layout 2016

    </SELECT>
    <HR NOSHADE SIZE="4">
    <br>
    Exportar docentes
    <br>
    <br>
    <form method="post" action=".php">
        <input style="display: none;" type="text" name="opcao" value="1">
        <button type="submit" class="btn btn-primary">Gerar arquivo texto</button>
    </form>

    <HR NOSHADE SIZE="4">

    Exportar discentes
    <br>
    <br>

    <SELECT NAME = "lista_cursos" SIZE=1>

        <OPTION value =""> Curso 1
        <OPTION value =""> Curso 2

    </SELECT>

    <br><br>
    <form method="post" action=".php">
        <input style="display: none;" type="text" name="opcao" value="2">
        <button type="submit" class="btn btn-primary">Gerar arquivo texto</button>
    </form>

    <HR NOSHADE SIZE="4">

    Exportar cursos
    <br>
    <br>

    <p>
    <form method="post" action=".php">
        <input style="display: none;" type="text" name="opcao" value="3">
        <button type="submit" class="btn btn-primary">Gerar arquivo texto</button>
    </form>




</section>

<?php include("fim_pagina.php"); ?>
