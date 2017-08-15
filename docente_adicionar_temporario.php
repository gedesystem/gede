<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$matricula_uefs = $_POST["matricula_uefs"];
?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Adicionar Informação de Docente Temporário</h2>

        <HR NOSHADE SIZE="4">

        <!-- Abaixo alguns campos padrões que podem ser necessários ou não -->

        <p>Início:
            <input type="text" class="form-control" id="iData" name="nData" required="required"
                   pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                   placeholder="Data de início da atuação do docente substituto na instituição. Exemplo: 30/02/2016">
        </p>
        <button type="button" class="btn btn-default" name="nDataHoje" onclick="setDataHoje('iData')"> Usar data de hoje</button>

        <HR NOSHADE SIZE="4">

        <p>Fim:
            <input type="text" class="form-control" id="iDataFim" name="nDataFim" required="required"
                   pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                   placeholder="Data do fim da atuação do docente substituto na instituição. Exemplo: 30/02/2016">
        </p>
        <button type="button" class="btn btn-default" name="nDataHoje" onclick="setDataHoje('iDataFim')"> Usar data de hoje</button>

        <HR NOSHADE SIZE="4">

        <p>Docente visitante?:</p>
        <div class="radio">
            <label><input type="radio" name="nVisitante" value="0" checked onclick="selecionarTipoVinculo(this.value)"/>Não</label>
            <label><input type="radio" name="nVisitante" value="1" onclick="selecionarTipoVinculo(this.value)">Sim</label>
        </div>

        <HR NOSHADE SIZE="4">

        <!-- Só aparece se o docente for visitante -->
        <div id="iTipo" style="display:none">
            <p>Tipo:</p>
            <div class="radio">
                <label><input type="radio" name="nTipo" value="1" checked/>Em folha</label>
                <label><input type="radio" name="nTipo" value="2">Bolsista</label>
            </div>
            <HR NOSHADE SIZE="4">
        </div>

        <p>Observações:<input type="text" class="form-control" pattern="[A-Z\s]+$"  name="nObservacao" placeholder="Observações que precisem ser inseridas."></p>

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
<script src="js/docente_adicionar_temporario_form.js"></script>

<?php include("fim_pagina.php"); ?>
