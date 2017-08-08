<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$id_gede = $_POST["id_gede"];
?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Dados Censitários de Curso</h2> 

        <HR NOSHADE SIZE="4">

        <p>Ano</p>
        <input type="text" name="nTipoAno" class="form-control" placeholder="Ano referente aos dados preenchidos." checked/><br>

        <p>Curso teve aluno vinculado?</p>
        <div class="radio">
            <label><input type="radio" name="nAlunoVinculado" value="Sim" checked/>Sim</label>
            <label><input type="radio" name="nAlunoVinculado" value="Nao">Não</label>
        </div>

        <p>Motivo do Curso sem aluno vinculado:</p>
        <div class="radio">
            <label><input type="radio" name="nMotivoSemAlunoVinculado" value="Extinto" checked/>Curso Extinto</label>
            <label><input type="radio" name="nMotivoSemAlunoVinculado" value="Novo">Curso Novo</label>
            <label><input type="radio" name="nMotivoSemAlunoVinculado" value="outroCodigo">Curso representado por outro código de curso</label>
            <label><input type="radio" name="nMotivoSemAlunoVinculado" value="semDemanda">Curso ativo sem demanda</label>
        </div>

        <p>Código do Curso Representado:<input type="text" class="form-control" required="required" name="nCodigoRepresentado" pattern="[0-9]+$" placeholder="Código do Curso Representado."></p>

        <p>Curso é financiado por Convênio?:</p>
        <div class="radio">
            <label><input type="radio" name="nConvenio" value="Sim" checked/>Sim</label>
            <label><input type="radio" name="nConvenio" value="Nao">Não</label>
        </div>

        <p>Turno do Curso:</p>
        <div class="radio">
            <label><input type="radio" name="nTurno" value="Matutino" checked/>Matutino</label>
            <label><input type="radio" name="nTurno" value="Vespertino">Vespertino</label>
            <label><input type="radio" name="nTurno" value="Noturno">Noturno</label>
            <label><input type="radio" name="nTurno" value="Integral">Integral</label>
        </div>

        <p>Prazo Mínimo de Intregalização em Anos (por turno ou EAD): <input type="text" size="4" name="nPrazoMinimo" pattern="[0-9]+$" title="Prazo em anos."></p>

        <p>Vagas Novas Oferecidas (por turno ou EAD): <input type="text" size="4" name="nVagasNovas" pattern="[0-9]+$" title="Número de vagas."></p>

        <p>Inscritos em Vagas Novas Oferecidas (por turno ou EAD): <input type="text" size="4" name="nInscritosVagasNovas" pattern="[0-9]+$" title="Número de inscritos em vagas novas."></p>

        <p>Vagas Remanescentes (por turno ou EAD): <input type="text" size="4" name="nVagasRemanescentes" pattern="[0-9]+$" title="Número de vagas remanescentes."></p>

        <p>Inscritos em Vagas Remanescentes (por turno ou EAD): <input type="text" size="4" name="nInscritosVagasRemanescentes" pattern="[0-9]+$" title="Número de inscritos em vagas remanescentes."></p>

        <p>Vagas Oferecidas Para Programas Especiais (por turno ou EAD): <input type="text" size="4" name="nVagasEspeciais" pattern="[0-9]+$" title="Número de vagas especiais."></p>

        <p>Inscritos em Vagas Para Programas Especiais (por turno ou EAD): <input type="text" size="4" name="nInscritosVagasEspeciais" pattern="[0-9]+$" title="Número de vagas."></p>

        <p>Curso garante condições de ensino-aprendizagem para pessoas com deficiência?:</p>
        <div class="radio">
            <label><input type="radio" name="nCondicoesEnsino" value="Sim" checked/>Sim</label>
            <label><input type="radio" name="nCondicoesEnsino" value="Nao">Não</label>
        </div>

        <p>Recursos de Tecnologia Assistiva Disponíveis às Pessoas com Deficiência:</p>
        <div class="checkbox">
            <label><input type="checkbox" name="nRecursosAssistivos" value="Braille">Material em Braille</label>
            <label><input type="checkbox" name="nRecursosAssistivos" value="Audio">Material em Áudio</label>
            <label><input type="checkbox" name="nRecursosAssistivos" value="InformaticaAcessivel">Recursos de Informática Acessível</label>
            <label><input type="checkbox" name="nRecursosAssistivos" value="TradutorSinais">Tradutor e Intérprete de Língua Brasileira de Sinais</label><br>
            <label><input type="checkbox" name="nRecursosAssistivos" value="GuiaInterprete">Guia-Intérprete</label>
            <label><input type="checkbox" name="nRecursosAssistivos" value="MaterialSinais">Material Didático em Língua Brasileira de Sinais</label>
            <label><input type="checkbox" name="nRecursosAssistivos" value="CaractereAmpliado">Material em Formato Impresso em Caractere Ampliado</label><br>
            <label><input type="checkbox" name="nRecursosAssistivos" value="Tatil">Material Pedagógico Tátil</label>
            <label><input type="checkbox" name="nRecursosAssistivos" value="DisciplinaSinais">Inserção da Disciplina de Língua Brasileira de Sinais no Curso</label><br>
            <label><input type="checkbox" name="nRecursosAssistivos" value="ImpressoAcessivel">Material Didático em Formato Impresso Acessível</label>
            <label><input type="checkbox" name="nRecursosAssistivos" value="AcessibilidadeComunicacao">Recursos de Acessibilidade à Comunicação</label>
            <label><input type="checkbox" name="nRecursosAssistivos" value="DigitalAcessivel">Material Didático Digital Acessível</label>
        </div>

        <br>
        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>   

        <HR NOSHADE SIZE="4">
    </form>

    <form method="post" action="curso_detalhes">
        <input style="display: none;" type="text" name="id_gede" value="<?php echo($id_gede); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<?php include("fim_pagina.php"); ?>