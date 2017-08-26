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

    <h2 class="Titulo">Informações do docente</h2>

    <div id="botoesEdicao">
        <form style="display: inline;" method="post" action="docente_editar_cadastro.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" onclick="return confirm('Deseja editar?')">Editar</button>
        </form>
        <form style="display: inline;" method="post" action="bd_docente_excluir_cadastro.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir?')">Excluir</button>
        </form>

        <button type="button" class="btn btn-warning" onclick="location.href = 'modulo_professores.php'">Cancelar</button>

    </div>

    <HR NOSHADE SIZE="4">

    <p>Nome do docente: <span style="color: #737373"> <?php echo($res['nome']); ?></span> </p>

    <p>Matrícula: <span style="color: #737373"> <?php echo($res['matricula_uefs']); ?></span> </p>

    <p>ID INEP: <span style="color: #737373"> <?php echo($res['id_inep']); ?></span> </p>

    <p>CPF do docente: <span style="color: #737373"> <?php echo($res['cpf']); ?></span> </p>

    <p>Data de Nascimento: <span style="color: #737373"> <?php
            echo(DateTime::createFromFormat('Y-m-d', $res['data_nascimento'])->format('d/m/Y'));
            ?></span> </p>

    <p>Sexo do docente: <span style="color: #737373"> <?php echo(($res['sexo'] == 0) ? 'Masculino' : 'Feminino'); ?></span> </p>

    <p>Nome Completo da Mãe: <span style="color: #737373"> <?php echo($res['nome_mae']); ?></span> </p>

    <p>Cor/Raça do Docente: <span style="color: #737373"> <?php
            switch ($res['cor_raca']) {
                case 0: echo "Não Declarada";
                    break;
                case 1: echo "Branca";
                    break;
                case 2: echo "Preta";
                    break;
                case 3: echo "Parda";
                    break;
                case 4: echo "Amarela";
                    break;
                case 5: echo "Indígena";
                    break;
            }
            ?></span> </p>

    <p>Nacionalidade: <span style="color: #737373"> <?php
            switch ($res['nacionalidade']) {
                case 1: echo "Brasileira";
                    break;
                case 2: echo "Brasileira, nascido no exterior ou naturalizado";
                    break;
                case 3: echo "Estrangeira";
                    break;
            }
            ?></span> </p>

    <?php
        if ($res['nacionalidade'] != 1) {
            $codPaisOrigem = $res['codigo_pais_origem'];
            $paisOrigem = mysql_fetch_assoc(
                seleciona("SELECT `nome` FROM `gede_paises` WHERE `codigo`=$codPaisOrigem"))['nome'];
            $paisOrigem = empty($paisOrigem) ? $codPaisOrigem : $paisOrigem;
            echo ("<p>País de Origem:  <span style=\"color: #737373\"> $paisOrigem </span> </p>");
        }
    ?>

    <?php
        if ($res['nacionalidade'] == 1) {
            $coduf = $res['codigo_uf'];
            $uf = mysql_fetch_assoc(
                seleciona("SELECT `nome` FROM `gede_estados` WHERE `codigo`=$coduf"))['nome'];
            $uf = empty($uf) ? $coduf : $uf;
            echo("<p>UF de Origem: <span style=\"color: #737373\"> $uf </span> </p>");

            $codmunicipio = $res['codigo_municipio'];
            $municipio = mysql_fetch_assoc(
                seleciona("SELECT `nome` FROM `gede_municipios` WHERE `codigo`=$codmunicipio"))['nome'];
            $municipio = empty($municipio) ? $codmunicipio : $municipio;
            echo("<p>Município de Nascimento: <span style=\"color: #737373\"> $municipio </span> </p>");
        }
    ?>

    <p>Docente com Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação?:
        <span style="color: #737373"> <?php echo(($res['deficiencia'] == 0) ? "Não" : "Sim"); ?> </span> </p>

    <?php
        if ($res['deficiencia'] == 1) {
            echo("<p>Tipo de Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação:
            <span style=\"color: #737373\"> </span> </p>");
        }
    ?>

    <br>

    <HR NOSHADE SIZE="4">
    <h2 class="Titulo">Adicionar Informações</h2>

    <p>Cadastrais</p>

    <div id="botoesAddInformacoes">

        <form style="display: inline;" method="post" action="docente_adicionar_situacao.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Situação do Docente na IES</button>
        </form>

        <form style="display: inline;" method="post" action="docente_adicionar_regime_trabalho.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Regime de trabalho</button>
        </form>

        <form style="display: inline;" method="post" action="docente_adicionar_vinculacao_ies.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Vinculo com a IES</button>
        </form>

        <form style="display: inline;" method="post" action="docente_adicionar_pos.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Pós-graduação</button>
        </form>

        <form style="display: inline;" method="post" action="docente_adicionar_temporario.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Vinculo temporario</button>
        </form>

    </div>

    <HR NOSHADE SIZE="4">
    <p>Ensino</p>


    <div id="botoesAddInformacoes">
        <form style="display: inline;" method="post" action="docente_adicionar_vinculo_curso.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Curso de gradução</button>
        </form>


        <form style="display: inline;" method="post" action="docente_adicionar_ensino_ead.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Ensino de curso EAD</button>
        </form>

        <form style="display: inline;" method="post" action="docente_adicionar_ensino_graduacao_presencial.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Ensino de graduação presencial</button>
        </form>

        <form style="display: inline;" method="post" action="docente_adicionar_ensino_pos_distancia.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Ensino de pós EAD</button>
        </form>

        <form style="display: inline;" method="post" action="docente_adicionar_ensino_pos_presencial.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Ensino de pós presencial</button>
        </form>
    </div>

    <HR NOSHADE SIZE="4">
    <p>Atividade extracurricular</p>


    <div id="botoesAddInformacoes">

        <form style="display: inline;" method="post" action="docente_adicionar_pesquisa.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Pesquisa</button>
        </form>

        <form style="display: inline;" method="post" action="docente_adicionar_extensao.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Extensão</button>
        </form>

        <form style="display: inline;" method="post" action="docente_adicionar_gpa.php">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
            <button type="submit" class="btn btn-default" >Gestão, planejamento e avaliação</button>
        </form>

    </div>
</section>

<?php include("fim_pagina.php"); ?>
