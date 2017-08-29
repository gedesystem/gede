<?php include("topo_pagina.php");
require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$matricula_uefs = $_POST["matricula_uefs"];

conexao();

$sql_seleciona = "SELECT * FROM alunos_dados_cadastrais WHERE matricula_uefs = '" . $matricula_uefs . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);
?>
<section>

    <form method="post" action="bd_aluno_editar_cadastro.php">

        <h2 class="Titulo">Editar Informações básicas do Aluno</h2>

        <HR NOSHADE SIZE="4">

        <p>ID do Aluno:<input type="text" class="form-control" name="nIdAluno" pattern="[0-9]+$" placeholder="Número fornecido pelo INEP."
            value="<?php echo($res['id_inep']); ?>"></p>

        <p>Código IES:<input type="text" class="form-control" name="nIdIES" placeholder="Código do Aluno na IES."
            value="<?php echo($res['id_ies']); ?>"></p>

        <p>CPF do Aluno:<input type="text" class="form-control" required="required" pattern="[0-9]+$" name="nCpf" placeholder="Utilize apenas números."
            value="<?php echo($res['cpf']); ?>"></p>
        
        <p>Nome do Aluno:<input type="text" class="form-control" required="required" name="nNome" pattern="[A-Z\s]+$" placeholder="Preencha o campo com o nome completo. Utilize letras MAIÚSCULAS."
            value="<?php echo($res['nome']); ?>"></p>

        <p>Data de Nascimento: <input type="text" class="form-control" name="nNascimento" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de nascimento, separada por barras. Ex: 31/12/1990."
            value="<?php echo(DateTime::createFromFormat('Y-m-d', $res['data_nascimento'])->format('d/m/Y')); ?>"></p>

        <p>Sexo do Aluno:</p>
        <div class="radio">
            <label><input type="radio" name="nSexo" id="iMasc" value="0" <?php
                echo(($res['sexo'] == 0) ? "checked" : ""); ?>/>Masculino</label>
            <label><input type="radio" name="nSexo" id="iFemi" value="1" <?php
                echo(($res['sexo'] == 1) ? "checked" : ""); ?>>Feminino</label>
        </div>

        <p>Nome Completo da Mãe:<input type="text" class="form-control" pattern="[A-Z\s]+$" id="iNomeMae" name="nNomeMae" placeholder="Nome da mãe do Aluno. Utilize letras MAIÚSCULAS."
            value="<?php echo($res['nome_mae']); ?>"></p>

        <p>Cor/Raça do Aluno:</p>
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

        <!-- Informações do aluno estrangeiro -->
        <div id="iInfoEstrangeiro" style="<?php echo(($res['nacionalidade'] == 1) ? 'display:none' : ''); ?>" >
            <p>País de Origem: <input type="text" class="form-control" pattern="[A-Z\s]+$" id="iPaisOrigem" name="nPaisOrigem" placeholder="Código de 3 letras do País do Origem do aluno. Utilize letras MAIÚSCULAS."
                value="<?php echo($res['codigo_pais_origem']); ?>"></p>
            
            <p>Documento estrangeiro do aluno:<input type="text" class="form-control" pattern="[0-9]+$" name="nDocumentoEstrangeiro" placeholder="Documento estrangeiro do aluno. Utilize apenas números."></p>
        </div>

        <!-- Informações do aluno brasileiro -->
        <div id="iInfoBrasileiro" style="<?php echo(($res['nacionalidade'] != 1) ? 'display:none' : ''); ?>">
            <p>Código do município: <input type="text" class="form-control" name="nCodigoMuni" placeholder="Código do município de nascimento do aluno."
                value="<?php echo($res['codigo_municipio']); ?>"> <p>

            <p>Código do estado: <input type="text" class="form-control" name="nCodigoEstado" placeholder="Código da UF de origem do aluno."
                value="<?php echo($res['codigo_estado']); ?>"> <p>
        </div>

        <p>Aluno com Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação:</p>

        <div class="radio">
            <label><input type="radio" name="nDeficienciaHabilidades" value="1" <?php
                echo(($res['deficiencia_transtorno_superdotacao'] == 1) ? "checked" : ""); ?>
                onclick="selecionarTemDeficiencia(this.value)">Sim</label>

            <label><input type="radio" name="nDeficienciaHabilidades" value="0" <?php
                echo(($res['deficiencia_transtorno_superdotacao'] == 0) ? "checked" : ""); ?>
                onclick="selecionarTemDeficiencia(this.value)"/>Não</label>

            <label><input type="radio" name="nDeficienciaHabilidades" value="2" <?php
                echo(($res['deficiencia_transtorno_superdotacao'] == 2) ? "checked" : ""); ?>
                onclick="selecionarTemDeficiencia(this.value)">Não dispõe dessa informação</label>
        </div>

        <div id="iDeficiencia" style="<?php echo(($res['deficiencia_transtorno_superdotacao'] != 1) ? 'display:none' : ''); ?>">
        <p>Tipo de Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação:</p>

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
        <input type="checkbox" name="nAutismo" value="1" <?php
            echo(($res['deficiencia_autismo'] == 1) ? "checked" : ""); ?>> Autismo
        <input type="checkbox" name="nAsperger" value="1" <?php
            echo(($res['deficiencia_asperger'] == 1) ? "checked" : ""); ?>> Síndrome de Asperger
        <input type="checkbox" name="nRett" value="1" <?php
            echo(($res['deficiencia_rett'] == 1) ? "checked" : ""); ?>> Síndrome de Rett <br>
        <input type="checkbox" name="nTDI" value="1" <?php
            echo(($res['deficiencia_desintegrativo'] == 1) ? "checked" : ""); ?>> Transtorno desintegrativo de infância
        <input type="checkbox" name="nAltasHabilidades" value="1" <?php
            echo(($res['superdotacao'] == 1) ? "checked" : ""); ?>> Altas Habilidades/Superdotação
        </div>

        <HR NOSHADE SIZE="4">

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."
            value="<?php echo($res['fonte']); ?>"></p>

        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
        </div>
    </form>

    <!-- botões para edição de informações adicionais -->
    <HR NOSHADE SIZE="4">

    <h2 class="Titulo">Editar Informações Adicionais</h2>

    <p>Cadastrais</p>
    <div id="botoesAddInformacoes">

        <form style="display: inline;" method="post" action="aluno_editar_curso.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Informações sobre o Curso</button>
        </form>

        <form style="display: inline;" method="post" action="aluno_editar_mobilidade.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Mobilidade Acadêmica</button>
        </form>

        <form style="display: inline;" method="post" action="aluno_editar_ingresso.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Informações de Ingresso</button>
        </form>

    </div>

    <HR NOSHADE SIZE="4">
    <p>Atividade extracurricular</p>

    <div id="botoesAddInformacoes">

        <form style="display: inline;" method="post" action="aluno_editar_estagio.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Estágio</button>
        </form>

        <form style="display: inline;" method="post" action="aluno_editar_extensao.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Extensão</button>
        </form>

        <form style="display: inline;" method="post" action="aluno_editar_pesquisa.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Pesquisa</button>
        </form>

        <form style="display: inline;" method="post" action="aluno_editar_monitoria.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Monitoria</button>
        </form>

    </div>

    <HR NOSHADE SIZE="4">

    <form method="post" action="aluno_detalhes.php">
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula_uefs); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<script src="js/adicionar_cadastro_form.js"></script>

<?php include("fim_pagina.php"); ?>
