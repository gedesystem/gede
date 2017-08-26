<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$matricula_uefs = $_POST["matricula_uefs"];
?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Adicionar Informação de Gestão, Planejamento ou Avaliação de Docente</h2>

        <HR NOSHADE SIZE="4">

        <p>Início:
            <input type="text" class="form-control" id="iData" name="nData" required="required"
                   pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                   placeholder="Data da ação realizada. Exemplo: 30/02/2016">
        </p>
        <button type="button" class="btn btn-default" name="nDataHoje" onclick="setDataHoje('iData')"> Usar data de hoje</button>

        <HR NOSHADE SIZE="4">

        <p>Especificação:<input type="text" class="form-control" pattern="[A-Z\s]+$"  name="nEspecificacao" placeholder="Especificação da ação realizada."></p>

        <HR NOSHADE SIZE="4">

        <p>Fonte:<input type="text" class="form-control" pattern="[A-Z\s]+$"  name="nFonte" placeholder="Entidade que forneceu estas informações."></p>

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

    </form>

    <HR NOSHADE SIZE="4">

    <form method="post" action="docente_detalhes.php">

        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula_uefs); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>

    </form>
</section>

<script src="js/set_data_hoje.js"></script>

<?php include("fim_pagina.php"); ?>
