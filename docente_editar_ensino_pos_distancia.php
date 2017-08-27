<?php include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$matricula_uefs = $_POST["matricula_uefs"];

conexao();

$sql_seleciona = "SELECT * FROM docentes_ensino_pos_distancia WHERE matricula_uefs = '" . $matricula_uefs . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);
?>

<section>

    <form method="post" action="bd_docente_ediar_ensino_pos_distancia.php">

        <h2 class="Titulo">Editar Informações de Curso de Pós-Graduação à Distância de Docente</h2>

        <HR NOSHADE SIZE="4">

        <p>Início:

        <input type="text" class="form-control" id="iData" name="nData" required="required"
               pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
               placeholder="Data de início do curso de pós-graduação à distância, separada por barras. Ex: 01/05/2015."
               value="<?php echo(DateTime::createFromFormat('Y-m-d', $res['data'])->format('d/m/Y')); ?>">
        </p>
        <button type="button" class="btn btn-default" name="nDataHoje" onclick="setDataHoje('iData')"> Usar data de hoje</button>

        <HR NOSHADE SIZE="4">

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."
            value="<?php echo($res['fonte']); ?>"></p>

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

<?php include("fim_pagina.php"); ?>
