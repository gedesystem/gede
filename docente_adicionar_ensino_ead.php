<?php include("topo_pagina.php"); ?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Adicionar Informação de ensino de Curso de Educação à Distância</h2> 
        
        (Adicionar nota aqui)

        <HR NOSHADE SIZE="4">

        <p>Início:</p>

        <input type="text" class="form-control" id="iData" name="nData" required="required"
               pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
               placeholder="Data de início do curso EAD, separada por barras. Ex: 01/05/2015.">
        <input type="radio" name="nDataHoje" onchange="setDataHoje()"> Usar data de hoje.

        <br><br>
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