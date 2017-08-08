<?php include("topo_pagina.php"); ?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Título</h2> 
        (Nota da página)

        <HR NOSHADE SIZE="4">

        <!-- Abaixo alguns campos padrões que podem ser necessários ou não -->
        
        <p>Início: 
            <input type="text" class="form-control" id="iData" name="nData" required="required"
                   pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                   placeholder="Exemplo: 30/02/2016">
            <input type="radio" name="nDataHoje" onchange="setDataHoje()"> Usar data de hoje.
        </p>

        <p>Observações:<input type="text" class="form-control" pattern="[A-Z\s]+$"  name="nObservacao" placeholder="Observações que precisem ser inseridas."></p>

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

    </form>

    <HR NOSHADE SIZE="4">

    <form method="post" action="docente_detalhes.php">

        <input style="display: none;" type="text" name="matricula_uefs" value="">
        <button type="submit" class="btn btn-default"> Voltar </button>

    </form>
    
</section>

<script src="js/set_data_hoje.js"></script>

<?php include("fim_pagina.php"); ?>
