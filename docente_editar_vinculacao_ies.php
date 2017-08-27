<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$matricula_uefs = $_POST["matricula_uefs"];

conexao();

$sql_seleciona = "SELECT * FROM docentes_vinculo_ies WHERE matricula_uefs = '" . $matricula_uefs . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);
?>

<section>

    <form method="post" action="bd_docente_editar_vinculacao_ies.php">

        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula_uefs); ?>">

        <h2 class="Titulo">Editar Vinculação do Docente</h2>

        <HR NOSHADE SIZE="4">

        <p>Departamento:<input type="text" class="form-control" id="idDep" name="nDep" placeholder="Código do departamento ao qual o docente está vinculado."
            value="<?php echo($res['departamento']); ?>"></p>

        <p>Classe:<input type="text" class="form-control" id="iClasse" name="nClasse" placeholder="Classe do docente na instituição."
            value="<?php echo($res['classe']); ?>"></p>

        <p>Data:
        <input type="text" class="form-control" id="iData" name="nData" required="required"
               pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
               placeholder="Data de início da atuação do docente na instituição. Ex: 31/12/1990."
               value="<?php echo(DateTime::createFromFormat('Y-m-d', $res['data'])->format('d/m/Y')); ?>">
        </p>
        <button type="button" class="btn btn-default" name="nDataHoje" onclick="setDataHoje('iData')"> Usar data de hoje</button>

        <HR NOSHADE SIZE="4">

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."
            value="<?php echo($res['fonte']); ?>"></p>

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
