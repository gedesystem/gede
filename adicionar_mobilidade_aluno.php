<?php include("topo_pagina.php"); ?>

<section>

    <form method="post" action=".php">
        
        <h2 class="Titulo">Mobilidade Acadêmica de Aluno</h2> 

        <HR NOSHADE SIZE="4">
        
        <p>Tipo de Mobilidade:</p>
        <div class="radio">
            <label><input type="radio" name="nTipoMobilidade" value="Nacional" checked/>Nacional</label>
            <label><input type="radio" name="nTipoMobilidade" value="Internacional">Internacional</label>
        </div>
        
        <p>Tipo de Mobilidade Acadêmica Internacional:</p>
        <div class="radio">
            <label><input type="radio" name="nTipoMobilidadeInternacional" value="Intercambio" checked/>Intercâmbio</label>
            <label><input type="radio" name="nTipoMobilidadeInternacional" value="CSF">Ciência sem Fronteiras</label>
        </div>
        
        <p>IES Destino - Mobilidade Acadêmica Nacional:<input type="text" class="form-control" required="required" name="nCodigoIESDestino" pattern="[0-9]+$" placeholder="Código da IES Destino."></p>
        
        <p>País Destino - Mobilidade Acadêmica Internacional:<input type="text" class="form-control" required="required" name="nPaisDestino" pattern="[0-9]+$" placeholder="Código do País Destino."></p>
                
        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
    </form>
    <button type="button" class="btn btn-warning" onclick="location.href = '.php'">Cancelar</button>

</section>

<?php include("fim_pagina.php"); ?>