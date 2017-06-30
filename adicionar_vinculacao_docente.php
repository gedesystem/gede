<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$matricula_uefs = $_POST["matricula_uefs"];
?>

<section>

    <form method="post" action="bd_inserir_vinculacao.php">
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula_uefs); ?>">
        <h2 class="Titulo">Vinculação do Docente</h2>

        Esta sessão refere-se à vinculação do docente à IES.

        <HR NOSHADE SIZE="4">

        <p>Código do Curso:<input type="text" class="form-control" id="iCodCurso" name="nCodCurso" placeholder="Código do curso ao qual o docente está vincculado."></p>

        <p>Departamento:<input type="text" class="form-control" id="idDep" name="nDep" placeholder="Código do departamento ao qual o docente está vincculado."></p>

        <p>Classe:<input type="text" class="form-control" id="iClasse" name="nClasse" placeholder="Classe do docente na instituição."></p>

        <HR NOSHADE SIZE="4">

        <p>Data:</p>
        <input type="text" class="form-control" id="iData" name="nData" required="required"
            pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
            placeholder="Ex: 31/12/1990.">
        Usar data de hoje: <input type="radio" name="nDataHoje" onchange="setDataHoje()">

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
