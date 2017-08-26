<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$matricula_uefs = $_POST["matricula_uefs"];

conexao();

$sql_seleciona = "SELECT * FROM docentes_pos_graduacao WHERE matricula_uefs = '" . $matricula_uefs . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);
?>

<section>

    <form method="post" action="bd_inserir_pos_graduacao.php">
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula_uefs); ?>">

        <h2 class="Titulo">Editar Pós Graduação de Docente</h2>

        <HR NOSHADE SIZE="4">

        <p>Pós-Graduação:</p>
        <div class="radio">
            <label><input type="radio" name="nPosGraduacaoDocente" value=1 <?php
                echo(($res['titulacao'] == 1) ? "checked" : ""); ?>/>Especialização</label>
            <label><input type="radio" name="nPosGraduacaoDocente" value=2 <?php
                echo(($res['titulacao'] == 2) ? "checked" : ""); ?>>Mestrado</label>
            <label><input type="radio" name="nPosGraduacaoDocente" value=3 <?php
                echo(($res['titulacao'] == 3) ? "checked" : ""); ?>>Doutorado</label>
        </div>

        <HR NOSHADE SIZE="4">

        <p>Data da Titulação:
        <input type="text" class="form-control" id="iData" name="nData" required="required"
            pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
            placeholder="Data da titulação do docente. Ex: 31/12/1990."
            value="<?php echo(DateTime::createFromFormat('Y-m-d', $res['data'])->format('d/m/Y')); ?>">
        </p>
        <button type="button" class="btn btn-default" name="nDataHoje" onclick="setDataHoje('iData')"> Usar data de hoje</button>

        <HR NOSHADE SIZE="4">

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."
            value="<?php echo($res['fonte']); ?>"></p>

        <HR NOSHADE SIZE="4">

        <p>Observações:<input type="text" class="form-control"  name="nObservacao" placeholder="Observações que precisem ser inseridas."
            value="<?php echo($res['observacoes']); ?>"></p>

        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

        <HR NOSHADE SIZE="4">

    </form>

    <form method="post" action="docente_detalhes.php">
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula_uefs); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<script src="js/set_data_hoje.js"></script>

<?php include("fim_pagina.php"); ?>
