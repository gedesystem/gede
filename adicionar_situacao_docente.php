<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$matricula_uefs = $_POST["matricula_uefs"];
?>

<section>

    <form method="post" action=".php">
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula_uefs); ?>">

        <h2 class="Titulo">Situação do Docente na IES</h2>

        <HR NOSHADE SIZE="4">

        <p>Situação:</p>
        <div class="radio">
            <label><input type="radio" name="nSituacao" value=1>Esteve em exercício</label><br>
            <label><input type="radio" name="nSituacao" value=2>Afastado para qualificação</label><br>
            <label><input type="radio" name="nSituacao" value=3>Afastado para exercício em outros órgãos/entidades</label><br>
            <label><input type="radio" name="nSituacao" value=4>Afastado por outros motivos</label><br>
            <label><input type="radio" name="nSituacao" value=5>Afastado para tratamento de saúde</label><br>
        </div>

        <HR NOSHADE SIZE="4">

        <p>Data:</p>
        <input type="text" class="form-control" id="iData" name="nData" required="required"
            pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
            placeholder="Ex: 31/12/1990.">
        Usar data de hoje: <input type="radio" name="nDataHoje" onchange="setDataHoje()">

        <HR NOSHADE SIZE="4">

        <p>Observações:</p>
        <textarea id="iObs" name="nObs" rows="8" cols="80" class="form-control"></textarea>

        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

        <HR NOSHADE SIZE="4">

    </form>

    <form method="post" action="detalhes_docente.php">
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula_uefs); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<script src="js/set_data_hoje.js"></script>

<?php include("fim_pagina.php"); ?>
