<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$id_gede = $_POST["id_gede"];
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

<?php include("fim_pagina.php"); ?>