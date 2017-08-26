<?php
include("topo_pagina.php");

require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$matricula_uefs = $_POST["matricula_uefs"];

conexao();

$sql_seleciona = "SELECT * FROM docentes_dados_cadastrais WHERE matricula_uefs = '" . $matricula_uefs . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);
?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Editar informações básicas do docente</h2>

        <HR NOSHADE SIZE="4">

        <p>Matrícula:<input type="text" class="form-control" id="iMatricula" required="required" name="nMatricula" pattern="[0-9]+$" placeholder="Número de matrícula da IES." value="<?php echo($res['matricula_uefs']); ?>"></p>

        <p>ID do docente:<input type="text" class="form-control" id="iIdDocente" name="nIdDocente" pattern="[0-9]+$" placeholder="Número fornecido pelo INEP." value="<?php echo($res['id_inep']); ?>"></p>

        <p>CPF do docente:<input type="text" class="form-control" id="iCpf" required="required" pattern="[0-9]+$" name="nCpf" placeholder="Utilize apenas números." value="<?php echo($res['cpf']); ?>"></p>

        <p>Nome do docente:<input type="text" class="form-control" id="iNome" required="required" name="nNome" pattern="[A-Z\s]+$" placeholder="Preencha o campo com o nome completo. Utilize letras MAIÚSCULAS."
            value="<?php echo($res['nome']); ?>"></p>

        <p>Data de Nascimento: <input type="text" class="form-control" id="iNacimento" name="nNascimento" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de nascimento separada por barras. Ex: 31/12/1990."
            value="<?php echo(DateTime::createFromFormat('Y-m-d', $res['data_nascimento'])->format('d/m/Y')); ?>"></p>

        <p>Sexo do docente:</p>
        <div class="radio">
            <label><input type="radio" name="nSexo" id="iMasc" value="0" <?php
                echo(($res['sexo'] == 0) ? "checked" : ""); ?>/>Masculino</label>
            <label><input type="radio" name="nSexo" id="iFemi" value="1" <?php
                echo(($res['sexo'] == 1) ? "checked" : ""); ?>>Feminino</label>
        </div>

        <p>Nome Completo da Mãe:<input type="text" class="form-control" pattern="[A-Z\s]+$" id="iNomeMae" name="nNomeMae" placeholder="Nome da mãe do docente. Utilize letras MAIÚSCULAS."
            value="<?php echo($res['nome_mae']); ?>"></p>

        <p>Cor/Raça do Docente:</p>
        <div class="radio">
            <label><input type="radio" id="iBranca" name="nCor" value="1" <?php
                echo(($res['cor_raca'] == 1) ? "checked" : ""); ?>> Branca</label>

            <label><input type="radio" id="iPreta" name="nCor" value="2" <?php
                echo(($res['cor_raca'] == 2) ? "checked" : ""); ?>> Preta</label>

            <label><input type="radio" id="iParda" name="nCor" value="3" <?php
                echo(($res['cor_raca'] == 3) ? "checked" : ""); ?>> Parda</label>

            <label><input type="radio" id="iAmarela" name="nCor" value="4" <?php
                echo(($res['cor_raca'] == 4) ? "checked" : ""); ?>> Amarela</label>

            <label><input type="radio" id="iIndígina" name="nCor" value="5" <?php
                echo(($res['cor_raca'] == 5) ? "checked" : ""); ?>> Indígina</label>

            <label><input type="radio" id="iSemDeclarar" name="nCor" value="0" <?php
                echo(($res['cor_raca'] == 0) ? "checked" : ""); ?>/> Docente não quis declarar cor/raça</label>
        </div>

        <p>Nacionalidade:</p>
        <div class="radio">
            <label><input type="radio" id="iBrasileira" name="nNacionalidade" value="1" <?php
                echo(($res['nacionalidade'] == 1) ? "checked" : ""); ?>
                onclick="selecionarNacionalidade(this.value)"/> Brasileira</label>

            <label><input type="radio" id="iNaturalizado" name="nNacionalidade" value="2" <?php
                echo(($res['nacionalidade'] == 2) ? "checked" : ""); ?>
                onclick="selecionarNacionalidade(this.value)"> Brasileira - nascido no exterior ou naturalizado</label>

            <label><input type="radio" id="iEstrangeiro" name="nNacionalidade" value="3" <?php
                echo(($res['nacionalidade'] == 3) ? "checked" : ""); ?>
                onclick="selecionarNacionalidade(this.value)"> Estrangeira</label>
        </div>

        <!-- Informações do Docente estrangeiro -->
        <div id="iInfoEstrangeiro" style="<?php echo(($res['nacionalidade'] == 1) ? 'display:none' : ''); ?>" >
            <p>País de Origem: <input type="text" class="form-control" pattern="[A-Z\s]+$" id="iPaisOrigem" name="nPaisOrigem" placeholder="Código de 3 letras do País do Origem do Docente."
                value="<?php echo($res['codigo_pais_origem']); ?>"></p>
        </div>

        <!-- Informações do docente brasileiro -->
        <div id="iInfoBrasileiro" style="<?php echo(($res['nacionalidade'] != 1) ? 'display:none' : ''); ?>">
            <p>Código do município: <input type="text" class="form-control" name="nCodigoMuni" placeholder="Código do município de nascimento do docente."
                value="<?php echo($res['codigo_municipio']); ?>"> <p>

            <p>Código do estado: <input type="text" class="form-control" name="nCodigoEstado" placeholder="Código da UF de origem do docente."
                value="<?php echo($res['codigo_uf']); ?>"> <p>
        </div>

        <p>Docente com Deficiência:</p>

        <div class="radio">
            <label><input type="radio" name="nDeficienciaHabilidades" value="1" <?php
                echo(($res['deficiencia'] == 1) ? "checked" : ""); ?>
                onclick="selecionarTemDeficiencia(this.value)">Sim</label>

            <label><input type="radio" name="nDeficienciaHabilidades" value="0" <?php
                echo(($res['deficiencia'] == 0) ? "checked" : ""); ?>
                onclick="selecionarTemDeficiencia(this.value)"/>Não</label>

            <label><input type="radio" name="nDeficienciaHabilidades" value="2" <?php
                echo(($res['deficiencia'] == 2) ? "checked" : ""); ?>
                onclick="selecionarTemDeficiencia(this.value)">Não dispõe dessa informação</label>
        </div>

        <div id="iDeficiencia" style="<?php echo(($res['deficiencia'] != 1) ? 'display:none' : ''); ?>">
            <p>Tipo de Deficiência:</p>

            <input type="checkbox" name="nCegueira" value="1" <?php
                echo(($res['deficiencia_cegueira'] == 1) ? "checked" : ""); ?>> Cegueira
            <input type="checkbox" name="nBaixaVisao" value="1" <?php
                echo(($res['deficiencia_baixa_visao'] == 1) ? "checked" : ""); ?>> Baixa visão
            <input type="checkbox" name="nSurdez" value="1" <?php
                echo(($res['deficiencia_surdez'] == 1) ? "checked" : ""); ?>> Surdez
            <input type="checkbox" name="nAuditiva" value="1" <?php
                echo(($res['deficiencia_auditiva'] == 1) ? "checked" : ""); ?>> Deficiência auditiva<br>
            <input type="checkbox" name="nFisica" value="1" <?php
                echo(($res['deficiencia_fisica'] == 1) ? "checked" : ""); ?>> Deficiência física
            <input type="checkbox" name="nSurdocegueira" value="1" <?php
                echo(($res['deficiencia_surdocegueira'] == 1) ? "checked" : ""); ?>> Surdocegueira
            <input type="checkbox" name="nMultipla" value="1" <?php
                echo(($res['deficiencia_multipla'] == 1) ? "checked" : ""); ?>> Deficiência múltipla
            <input type="checkbox" name="nIntelectual" value="1" <?php
                echo(($res['deficiencia_intelectual'] == 1) ? "checked" : ""); ?>> Deficiência intelectual<br>
        </div>

        <HR NOSHADE SIZE="4">

        <p>Fonte:<input type="text" class="form-control" pattern="[A-Z\s]+$"  name="nFonte" placeholder="Entidade que forneceu estas informações."
            value="<?php echo($res['fonte']); ?>"></p>

        <HR NOSHADE SIZE="4">

        <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
    </form>

    <!-- Botões para edição de informações adicionais -->
    <HR NOSHADE SIZE="4">
    <h2 class="Titulo">Editar Informações Adicionais</h2>

    <p>Cadastrais</p>

    <div id="botoesEditInformacoes">

        <form style="display: inline;" method="post" action="docente_editar_situacao.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Situação do Docente na IES</button>
        </form>

        <form style="display: inline;" method="post" action="docente_editar_regime_trabalho.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Regime de trabalho</button>
        </form>

        <form style="display: inline;" method="post" action="docente_editar_vinculacao_ies.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Vinculo com a IES</button>
        </form>

        <form style="display: inline;" method="post" action="docente_editar_pos.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Pós-graduação</button>
        </form>

        <form style="display: inline;" method="post" action="docente_editar_temporario.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Vinculo temporario</button>
        </form>

    </div>

    <HR NOSHADE SIZE="4">
    <p>Ensino</p>


    <div id="botoesEditInformacoes">
        <form style="display: inline;" method="post" action="docente_editar_vinculo_curso.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Curso de gradução</button>
        </form>


        <form style="display: inline;" method="post" action="docente_editar_ensino_ead.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Ensino de curso EAD</button>
        </form>

        <form style="display: inline;" method="post" action="docente_editar_ensino_graduacao_presencial.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Ensino de graduação presencial</button>
        </form>

        <form style="display: inline;" method="post" action="docente_editar_ensino_pos_distancia.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Ensino de pós EAD</button>
        </form>

        <form style="display: inline;" method="post" action="docente_editar_ensino_pos_presencial.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Ensino de pós presencial</button>
        </form>
    </div>

    <HR NOSHADE SIZE="4">
    <p>Atividade extracurricular</p>


    <div id="botoesEditInformacoes">

        <form style="display: inline;" method="post" action="docente_editar_pesquisa.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Pesquisa</button>
        </form>

        <form style="display: inline;" method="post" action="docente_editar_extensao.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Extensão</button>
        </form>

        <form style="display: inline;" method="post" action="docente_editar_gpa.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Gestão, planejamento e avaliação</button>
        </form>

    </div>

    <HR NOSHADE SIZE="4">

    <form method="post" action="docente_detalhes.php">

        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula_uefs); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>

    </form>

</section>

<script src="js/adicionar_cadastro_form.js"></script>

<?php include("fim_pagina.php"); ?>
