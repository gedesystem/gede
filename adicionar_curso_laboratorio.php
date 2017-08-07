<?php include("topo_pagina.php"); ?>

<section>

    <form method="post" action=".php">
        
        <h2 class="Titulo">Adicionar Informação de Laboratório de Curso</h2> 

        <HR NOSHADE SIZE="4">
        
        <p>Código:<input type="text" class="form-control" required="required" name="nCodigo" pattern="[0-9]+$" placeholder="Código do laboratório."></p>
     
        <p>Observações:<input type="text" class="form-control" pattern="[A-Z\s]+$"  name="nObservacao" placeholder="Observações que precisem ser inseridas."></p>

        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
    </form>
    <button type="button" class="btn btn-warning" onclick="location.href = '.php'">Cancelar</button>

</section>

<?php include("fim_pagina.php"); ?>