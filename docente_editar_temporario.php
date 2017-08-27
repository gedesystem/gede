<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$matricula_uefs = $_POST["matricula_uefs"];

conexao();

$sql_seleciona = "SELECT * FROM docentes_temporarios WHERE matricula_uefs = '" . $matricula_uefs . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);
?>

<section>

    <form method="post" action="bd_docente_editartemporario.php">

        <h2 class="Titulo">Editar Informação de Docente Temporário</h2>

        <HR NOSHADE SIZE="4">

        <!-- Abaixo alguns campos padrões que podem ser necessários ou não -->

        <p>Início:
            <input type="text" class="form-control" id="iData" name="nData" required="required"
                   pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                   placeholder="Data de início da atuação do docente temporário na instituição. Exemplo: 30/02/2016"
                   value="<?php echo(DateTime::createFromFormat('Y-m-d', $res['inicio'])->format('d/m/Y')); ?>">
        </p>
        <button type="button" class="btn btn-default" name="nDataHoje" onclick="setDataHoje('iData')"> Usar data de hoje</button>

        <HR NOSHADE SIZE="4">

        <p>Fim:
            <input type="text" class="form-control" id="iDataFim" name="nDataFim"
                   pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                   placeholder="Data do fim da atuação do docente temporário na instituição. Exemplo: 30/02/2016"
                   value="<?php echo(DateTime::createFromFormat('Y-m-d', $res['fim'])->format('d/m/Y')); ?>">
        </p>
        <button type="button" class="btn btn-default" name="nDataHoje" onclick="setDataHoje('iDataFim')"> Usar data de hoje</button>

        <HR NOSHADE SIZE="4">

        <p>Tipo do Docente Temporário:</p>
        <div class="radio">
            <label><input type="radio" name="nVisitante" value="0" <?php
                echo(($res['tipo_docente_temporario'] == 0) ? "checked" : ""); ?> onclick="selecionarTipoVinculo(this.value)"/>Substituto</label>
            <label><input type="radio" name="nVisitante" value="1" <?php
                echo(($res['tipo_docente_temporario'] == 1) ? "checked" : ""); ?> onclick="selecionarTipoVinculo(this.value)">Visitante</label>
        </div>

        <HR NOSHADE SIZE="4">

        <!-- Só aparece se o docente for visitante -->
        <div id="iTipo" style="<?php echo(($res['tipo_docente_temporario'] == 0) ? 'display:none' : '') ?>">
            <p>Tipo do Vínculo:</p>
            <div class="radio">
                <label><input type="radio" name="nTipo" value="1" <?php
                    echo(($res['tipo_vinculo'] == 1) ? "checked" : ""); ?>/>Em folha</label>
                <label><input type="radio" name="nTipo" value="2" <?php
                    echo(($res['tipo_vinculo'] == 2) ? "checked" : ""); ?>>Bolsista</label>
            </div>
            <HR NOSHADE SIZE="4">
        </div>

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."
            value="<?php echo($res['fonte']); ?>"></p>

        <HR NOSHADE SIZE="4">

        <p>Observações:<input type="text" class="form-control"  name="nObservacao" placeholder="Observações que precisem ser inseridas."
            value="<?php echo($res['observacoes']); ?>"></p>

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
