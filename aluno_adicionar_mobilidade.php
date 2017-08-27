<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$matricula = $_POST['matricula_uefs'];
?>

<section>

    <form method="post" action="bd_aluno_adicionar_mobilidade.php">

        <h2 class="Titulo">Adicionar Informação de Mobilidade de Aluno</h2>

        <HR NOSHADE SIZE="4">

<!--        <p>Matrícula do Aluno:<input type="text" class="form-control" required="required" name="nMatricula" pattern="[0-9]+$" placeholder="Número de matrícula na IES."></p>-->

        <p>Tipo de mobilidade:</p>
        <div class="radio">
            <label><input type="radio" name="nTipo" value="1" checked
                onclick="selecionarMobilidade(this.value)"/>Nacional</label>
            <label><input type="radio" name="nTipo" value="2"
                onclick="selecionarMobilidade(this.value)">Internacional</label>
        </div>

        <div id="iInternacional" style="display:none">
            <p>Tipo de Mobilidade Acadêmica Internacional:</p>
            <div class="radio">
                <label><input type="radio" name="nTipoInternacional" value="1">Intercâmbio</label>
                <label><input type="radio" name="nTipoInternacional" value="2">Ciência sem Fronteiras</label>
            </div>

            <p>País de Destino - Mobilidade Internacional:<input type="text" class="form-control" name="nPaisDestino" pattern="[A-Z\s]+$" placeholder="Codigo do país de destino para mobilidade internacional. Utilize letras MAIÚSCULAS."></p>
        </div>

        <div id="iNacional">
            <p>IES de Destino - Mobilidade Nacional:<input type="text" class="form-control" name="nIESDestino" pattern="[0-9]+$" placeholder="Código da IES de destino para mobilidade nacional."></p>
        </div>

        <p>Início: <input type="text" class="form-control" required="required" name="nInicio" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de início da mobilidade, separada por barras. Ex: 01/05/2015."></p>

        <p>Fim: <input type="text" class="form-control" required="required" name="nFim" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de fim da mobilidade, separada por barras. Ex: 01/05/2016."></p>

        <p>Observações:<input type="text" class="form-control"  name="nObservacao" placeholder="Observações que precisem ser inseridas."></p>

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."></p>

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

    </form>

    <HR NOSHADE SIZE="4">

    <form method="post" action="aluno_detalhes.php">
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<script src="js/aluno_adicionar_mobilidade_form.js"></script>

<?php include("fim_pagina.php"); ?>
