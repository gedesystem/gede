<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$matricula_uefs = $_POST["matricula_uefs"];

conexao();

$sql_seleciona = "SELECT * FROM docentes_extensao WHERE matricula_uefs = '" . $matricula_uefs . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);
?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Editar Informações de Pesquisa de Docente</h2>

        <HR NOSHADE SIZE="4">

        <!-- Abaixo alguns campos padrões que podem ser necessários ou não -->

        <p>Início:
            <input type="text" class="form-control" id="iData" name="nData" required="required"
                   pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                   placeholder="Data de início da pesquisa. Exemplo: 30/02/2016"
                   value="<?php echo(DateTime::createFromFormat('Y-m-d', $res['inicio'])->format('d/m/Y')); ?>">
        </p>
        <button type="button" class="btn btn-default" name="nDataHoje" onclick="setDataHoje('iData')"> Usar data de hoje</button>

        <HR NOSHADE SIZE="4">

        <p>Fim:
            <input type="text" class="form-control" id="iDataFim" name="nDataFim"
                   pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
                   placeholder="Data de fim da pesquisa. Exemplo: 30/02/2017"
                   value="<?php echo(DateTime::createFromFormat('Y-m-d', $res['fim'])->format('d/m/Y')); ?>">
        </p>
        <button type="button" class="btn btn-default" name="nDataHojeFim" onclick="setDataHoje('iDataFim')"> Usar data de hoje</button>

        <HR NOSHADE SIZE="4">

        <p>Título do Projeto:<input type="text" class="form-control" required="required" pattern="[A-Z\s]+$"  name="nTitulo" placeholder="Título do projeto de pesquisa. Utilize letras MAIÚSCULAS."
            value="<?php echo($res['titulo_projeto']); ?>"></p>

        <HR NOSHADE SIZE="4">

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."
            value="<?php echo($res['fonte']); ?>"></p>

        <p>Observações:<input type="text" class="form-control"  name="nObservacao" placeholder="Observações que precisem ser inseridas."
            value="<?php echo($res['observacao']); ?>"></p>

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
