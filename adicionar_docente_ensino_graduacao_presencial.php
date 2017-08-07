<?php include("topo_pagina.php"); ?>

<section>

    <form method="post" action=".php">
        
        <h2 class="Titulo">Adicionar Informação de Curso de Graduação Presencial de Docente</h2> 

        <HR NOSHADE SIZE="4">
        
        <p>Início: <input type="text" class="form-control" required="required" name="nInicio" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de início do curso de graduação presencial, separada por barras. Ex: 01/05/2015."></p>
        
        <p>Observações:<input type="text" class="form-control" pattern="[A-Z\s]+$"  name="nObservacao" placeholder="Observações que precisem ser inseridas."></p>

        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
    </form>
    <button type="button" class="btn btn-warning" onclick="location.href = '.php'">Cancelar</button>

</section>

<?php include("fim_pagina.php"); ?>