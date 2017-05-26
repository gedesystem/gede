<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$id_gede = $_POST["id_gede"];
?>

<section>

    <form method="post" action="bd_inserir_pos_graduacao.php">
        <input style="display: none;" type="text" name="id_gede" value="<?php echo($id_gede); ?>">

        <h2 class="Titulo">Pós Graduação de Docente</h2>

        <HR NOSHADE SIZE="4">

        <p>Pós-Graduação:</p>
        <div class="radio">
            <label><input type="radio" name="nPosGraduacaoDocente" value=0 checked/>Especialização</label>
            <label><input type="radio" name="nPosGraduacaoDocente" value=1>Mestrado</label>
            <label><input type="radio" name="nPosGraduacaoDocente" value=2>Doutorado</label>
            <label><input type="radio" name="nPosGraduacaoDocente" value=3>Não Possui</label>
        </div>

        <HR NOSHADE SIZE="4">

        <p>Data da Titulação:</p>
        <input type="text" class="form-control" id="iData" name="nData" required="required"
            pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
            placeholder="Data da titulação do docente. Ex: 31/12/1990.">
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
        <input style="display: none;" type="text" name="id_gede" value="<?php echo($id_gede); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<script src="js/adcionar_pos_docente_form.js"></script>

<?php include("fim_pagina.php"); ?>
