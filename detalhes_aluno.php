<?php
include("topo_pagina.php");

require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$id_gede = $_POST["id_gede"];

conexao();

$sql_seleciona = "SELECT * FROM alunos_dados_cadastrais WHERE id_gede = '" . $id_gede . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);
?>

<section>

    <h2 class="Titulo">Informações do discente</h2> 

    <div id="botoesEdicao">
        <form style="display: inline;" method="post" action="edicao_aluno.php">
            <input style="display: none;" type="text" name="id_gede" value="<?php echo($res['id_gede']); ?>">
            <button type="submit" class="btn btn-default" onclick="return confirm('Deseja editar?')">Editar</button>
        </form>
        <form style="display: inline;" method="post" action="bd_exclusao_aluno.php">
            <input style="display: none;" type="text" name="id_gede" value="<?php echo($res['id_gede']); ?>">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir?')">Excluir</button>
        </form>

        <button type="button" class="btn btn-warning" onclick="location.href = 'modulo_alunos.php'">Cancelar</button>

    </div>

    <HR NOSHADE SIZE="4">

    <p>Nome: <span style="color: #737373"> <?php echo($res['nome']); ?></span></p>

    <p>Matrícula: <span style="color: #737373"> <?php echo($res['matricula_uefs']); ?> </span></p>

    <p>ID INEP: <span style="color: #737373"> <?php echo($res['id_inep']); ?> </span></p>

    <p>CPF: <span style="color: #737373"> <?php echo($res['cpf']); ?> </span></p>

    <p>Data de Nascimento: <span style="color: #737373"> <?php echo($res['data_nascimento']); ?> </span></p>

    <p>Sexo: <span style="color: #737373"> <?php echo($res['sexo']); ?> </span></p>

    <p>Cor/Raça: <span style="color: #737373"> <?php echo($res['cor_raca']); ?> </span></p>

    <p>Nome da Mãe: <span style="color: #737373"> <?php echo($res['nome_mae']); ?> </span></p>

    <p>Nacionalidade: <span style="color: #737373"> <?php echo($res['nacionalidade']); ?> </span></p>

    <p>Código do Município: <span style="color: #737373"> <?php echo($res['codigo_municipio']); ?> </span></p>

    <p>Código do Estado: <span style="color: #737373"> <?php echo($res['codigo_estado']); ?> </span></p>

    <p>Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação: <span style="color: #737373"> <?php echo($res['deficiencia_transtorno_superdotacao']); ?> </span></p>

    <br>

    <h2 class="Titulo">Adicionar Informações</h2> 
    <HR NOSHADE SIZE="4">

    <div id="botoesAddInformacoes">

        <form style="display: inline;" method="post" action="adicionar_curso_aluno.php">
            <input style="display: none;" type="text" name="id_gede" value="<?php echo($res['id_gede']); ?>">
            <button type="submit" class="btn btn-default" >Informações do Curso</button>
        </form>

        <form style="display: inline;" method="post" action="adicionar_mobilidade_aluno.php">
            <input style="display: none;" type="text" name="id_gede" value="<?php echo($res['id_gede']); ?>">
            <button type="submit" class="btn btn-default" >Mobilidade Acadêmica</button>
        </form>

        <form style="display: inline;" method="post" action="adicionar_ingresso_aluno.php">
            <input style="display: none;" type="text" name="id_gede" value="<?php echo($res['id_gede']); ?>">
            <button type="submit" class="btn btn-default" >Informações de Ingresso</button>
        </form>

        <form style="display: inline;" method="post" action="adicionar_atividade_aluno.php">
            <input style="display: none;" type="text" name="id_gede" value="<?php echo($res['id_gede']); ?>">
            <button type="submit" class="btn btn-default" >Atividade Extracurricular</button>
        </form>

    </div>

</section>

<?php include("fim_pagina.php"); ?>