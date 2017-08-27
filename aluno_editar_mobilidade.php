<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');

$matricula_uefs = $_POST["matricula_uefs"];

conexao();

$sql_seleciona = "SELECT * FROM alunos_mobilidade WHERE matricula_uefs = '" . $matricula_uefs . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);
?>

<section>

    <form method="post" action="bd_aluno_editar_mobilidade.php">

        <h2 class="Titulo">Editar Informações de Mobilidade de Aluno</h2>

        <HR NOSHADE SIZE="4">

<!--        <p>Matrícula do Aluno:<input type="text" class="form-control" required="required" name="nMatricula" pattern="[0-9]+$" placeholder="Número de matrícula na IES."></p>-->

        <p>Tipo de mobilidade:</p>
        <div class="radio">
            <label><input type="radio" name="nTipo" value="1"
                <?php echo(($res['tipo'] == 1) ? "checked" : ""); ?>
                onclick="selecionarMobilidade(this.value)"/>Nacional</label>
            <label><input type="radio" name="nTipo" value="2"
                <?php echo(($res['tipo'] == 2) ? "checked" : ""); ?>
                onclick="selecionarMobilidade(this.value)">Internacional</label>
        </div>

        <div id="iInternacional" style="<?php echo(($res['tipo'] != 2) ? 'display:none' : ''); ?>">
            <p>Tipo de Mobilidade Acadêmica Internacional:</p>
            <div class="radio">
                <label><input type="radio" name="nTipoInternacional" value="1"
                    <?php echo(($res['tipo_mobilidade_internacional'] == 1) ? "checked" : ""); ?>>Intercâmbio</label>
                <label><input type="radio" name="nTipoInternacional" value="2"
                    <?php echo(($res['tipo_mobilidade_internacional'] == 2) ? "checked" : ""); ?>>Ciência sem Fronteiras</label>
            </div>

            <p>País de Destino - Mobilidade Internacional:<input type="text" class="form-control" name="nPaisDestino" pattern="[A-Z\s]+$" placeholder="Codigo do país de destino para mobilidade internacional. Utilize letras MAIÚSCULAS."
                value="<?php echo($res['pais_destino']); ?>"></p>
        </div>

        <div id="iNacional" style="<?php echo(($res['tipo'] != 1) ? 'display:none' : ''); ?>">
            <p>IES de Destino - Mobilidade Nacional:<input type="text" class="form-control" name="nIESDestino" pattern="[0-9]+$" placeholder="Código da IES de destino para mobilidade nacional."
                value="<?php echo($res['ies_destino']); ?>"></p>
        </div>

        <p>Início: <input type="text" class="form-control" required="required" name="nInicio" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de início da mobilidade, separada por barras. Ex: 01/05/2015."
            value="<?php echo(DateTime::createFromFormat('Y-m-d', $res['inicio'])->format('d/m/Y')); ?>"></p>

        <p>Fim: <input type="text" class="form-control" required="required" name="nFim" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de fim da mobilidade, separada por barras. Ex: 01/05/2016."
            value="<?php echo(DateTime::createFromFormat('Y-m-d', $res['fim'])->format('d/m/Y')); ?>"></p>

        <p>Observações:<input type="text" class="form-control"  name="nObservacao" placeholder="Observações que precisem ser inseridas."
            value="<?php echo($res['observacao']); ?>"></p>

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."
            value="<?php echo($res['fonte']); ?>"></p>

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

    </form>

    <HR NOSHADE SIZE="4">

    <form method="post" action="aluno_editar_cadastro.php">
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula_uefs); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<script src="js/aluno_adicionar_mobilidade_form.js"></script>

<?php include("fim_pagina.php"); ?>
