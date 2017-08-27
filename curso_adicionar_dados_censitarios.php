<?php include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$codigo_curso = $_POST["codigo_curso"];
?>

<section>

    <form method="post" action="bd_curso_adicionar_dados_censitarios.php">

        <h2 class="Titulo">Dados Censitários de Curso</h2>

        <HR NOSHADE SIZE="4">

        <p>Ano:</p>
        <input type="text" name="nTipoAno" class="form-control" pattern="[0-9]+$" placeholder="Ano referente aos dados preenchidos." checked/><br>

        <p>Curso teve aluno vinculado?:</p>
        <div class="radio">
            <label><input type="radio" name="nAlunoVinculado" value="1" checked onclick="selecionarAlunoVinculado(this.value)"/>Sim</label>
            <label><input type="radio" name="nAlunoVinculado" value="0" onclick="selecionarAlunoVinculado(this.value)">Não</label>
        </div>

        <div id="iMotivoSemAluno" style="display:none">
            <p>Motivo do curso sem aluno vinculado:</p>
            <div class="radio">
                <label><input type="radio" name="nMotivoSemAlunoVinculado" value="1" checked
                    onclick="selecionarMotivoSemAluno(this.value)"/>Curso Extinto</label>
                <label><input type="radio" name="nMotivoSemAlunoVinculado" value="2"
                    onclick="selecionarMotivoSemAluno(this.value)">Curso Novo</label>
                <label><input type="radio" name="nMotivoSemAlunoVinculado" value="3"
                    onclick="selecionarMotivoSemAluno(this.value)">Curso representado por outro código de curso</label>
                <label><input type="radio" name="nMotivoSemAlunoVinculado" value="4"
                    onclick="selecionarMotivoSemAluno(this.value)">Curso ativo sem demanda</label>
            </div>
        </div>

        <div id="iCodCursoRepresentado" style="display:none">
            <p>Código do curso representado:<input type="text" class="form-control" required="required" name="nCodigoRepresentado" pattern="[0-9]+$" placeholder="Código do Curso Representado."></p>
        </div>

        <p>Curso é financiado por convênio?:</p>
        <div class="radio">
            <label><input type="radio" name="nConvenio" value="1" checked/>Sim</label>
            <label><input type="radio" name="nConvenio" value="0">Não</label>
        </div>

        <p>Turno do curso:</p>
        <div class="radio">
            <label><input type="radio" name="nTurno" value="0" checked/>Matutino</label>
            <label><input type="radio" name="nTurno" value="1">Vespertino</label>
            <label><input type="radio" name="nTurno" value="2">Noturno</label>
            <label><input type="radio" name="nTurno" value="3">Integral</label>
            <label><input type="radio" name="nTurno" value="4">EAD</label>
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
            <label><input type="radio" name="nCondicoesEnsino" value="1" checked/>Sim</label>
            <label><input type="radio" name="nCondicoesEnsino" value="0">Não</label>
        </div>

        <p>Recursos de Tecnologia Assistiva Disponíveis às Pessoas com Deficiência:</p>
        <div class="checkbox">
            <label><input type="checkbox" name="nBraille" value="1">Material em Braille</label>
            <label><input type="checkbox" name="nAudio" value="1">Material em Áudio</label>
            <label><input type="checkbox" name="nInformaticaAcessivel" value="1">Recursos de Informática Acessível</label>
            <label><input type="checkbox" name="nTradutorLibras" value="1">Tradutor e Intérprete de Língua Brasileira de Sinais</label><br>
            <label><input type="checkbox" name="nGuiaInterprete" value="1">Guia-Intérprete</label>
            <label><input type="checkbox" name="nMaterialLibras" value="1">Material Didático em Língua Brasileira de Sinais</label>
            <label><input type="checkbox" name="nCaractereAmpliado" value="1">Material em Formato Impresso em Caractere Ampliado</label><br>
            <label><input type="checkbox" name="nTatil" value="1">Material Pedagógico Tátil</label>
            <label><input type="checkbox" name="nDisciplinaLibras" value="1">Inserção da Disciplina de Língua Brasileira de Sinais no Curso</label><br>
            <label><input type="checkbox" name="nMaterialImpressoAcessivel" value="1">Material Didático em Formato Impresso Acessível</label>
            <label><input type="checkbox" name="nRecursosAcessibilidade" value="1">Recursos de Acessibilidade à Comunicação</label>
            <label><input type="checkbox" name="nMaterialAcessivel" value="1">Material Didático Digital Acessível</label>
        </div>

        <br>
        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

        <HR NOSHADE SIZE="4">
    </form>

    <form method="post" action="curso_detalhes.php">

        <input style="display: none;" type="text" name="codigo_curso" value="<?php echo($codigo_curso); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>

    </form>

</section>

<script src="js/curso_adicionar_dados_censitarios.js"></script>

<?php include("fim_pagina.php"); ?>
