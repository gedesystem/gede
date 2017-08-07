<?php include("topo_pagina.php"); ?>

<section>

    <form method="post" action=".php">
        
        <h2 class="Titulo">Adicionar Informação de Gestão, Planejamento ou Avaliação de Docente</h2> 

        <HR NOSHADE SIZE="4">
        
        <p>Data: <input type="text" class="form-control" required="required" name="nData" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data da ação realizada, separada por barras. Ex: 01/05/2015."></p>
        
        <p>Especificação:<input type="text" class="form-control" pattern="[A-Z\s]+$"  name="nEspecificacao" placeholder="Especificação da ação realizada."></p>
        
        <p>Observações:<input type="text" class="form-control" pattern="[A-Z\s]+$"  name="nObservacao" placeholder="Observações que precisem ser inseridas."></p>

        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
    </form>
    <button type="button" class="btn btn-warning" onclick="location.href = '.php'">Cancelar</button>

</section>

<?php include("fim_pagina.php"); ?>