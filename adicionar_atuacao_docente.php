<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$matricula_uefs = $_POST["matricula_uefs"];
?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Atuação de Docente</h2>

        Esta sessão refere-se aos tipos de trabalho ou atividades realizadas pelo docente na IES.
        <HR NOSHADE SIZE="4">

        <p>Atuação:</p>
        <div class="checkbox">
            <label><input type="checkbox" name="nAtuacao" value="EnsinoPosDistancia">Ensino de Pós-Graduação <i>stricto sensu</i> à Distância</label> <br>
            <label><input type="checkbox" name="nAtuacao" value="EnsinoGraduacaoPresencial">Ensino em Curso de Graduação Presencial</label> <br>
            <label><input type="checkbox" name="nAtuacao" value="EnsinoDistancia">Ensino em Curso à Distância</label><br>
            <label><input type="checkbox" name="nAtuacao" value="EnsinoPosPresencial">Ensino de Pós-Graduação <i>stricto sensu</i> Presencial</label> <br>
            <label><input type="checkbox" name="nAtuacao" value="CursoSequencial">Ensino em Curso Sequencial de Formação Específica</label><br>
            <label><input type="checkbox" name="nAtuacao" value="Pesquisa">Pesquisa</label><br>
            <label><input type="checkbox" name="nAtuacao" value="Extensao">Extensão</label><br>
            <label><input type="checkbox" name="nAtuacao" value="Gestao">Gestão, Planejamento e Avaliação</label>
        </div>

        <p>Possui Bolsa Pesquisa (Somente para Docentes com Atuação em Pesquisa)?</p>
        <div class="radio">
            <label><input type="radio" name="nBolsaPesquisa" value="Sim">Sim</label>
            <label><input type="radio" name="nBolsaPesquisa" value="Nao" checked/>Não</label>
        </div>

        <HR NOSHADE SIZE="4">

        <p>Data:</p>
        <input type="text" class="form-control" id="iData" name="nData" required="required"
            pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"
            placeholder="Ex: 31/12/1990.">
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
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula_uefs); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<script src="js/set_data_hoje.js"></script>

<?php include("fim_pagina.php"); ?>
