<?php include("topo_pagina.php"); 

require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$id_gede = $_POST["id_gede"];

conexao();

$sql_seleciona = "SELECT * FROM docentes_dados_cadastrais WHERE id_gede = '" . $id_gede . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);
?>


<section>

    <h2 class="Titulo">Informações do docente</h2> 

    <div id="botoesEdicao">
        <form style="display: inline;" method="post" action="edicao_professor.php">
            <input style="display: none;" type="text" name="id_gede" value="<?php echo($res['id_gede']); ?>">
            <button type="submit" class="btn btn-default" onclick="return confirm('Deseja editar?')">Editar</button>
        </form>
        <form style="display: inline;" method="post" action="bd_exclusao_professor.php">
            <input style="display: none;" type="text" name="id_gede" value="<?php echo($res['id_gede']); ?>">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir?')">Excluir</button>
        </form>

        <button type="button" class="btn btn-warning" onclick="location.href = 'menu_professores.php'">Cancelar</button>

    </div>

    <HR NOSHADE SIZE="4">

    <p>Nome do docente: <span style="color: #737373"> <?php echo($res['nome']); ?></span> </p>

    <p>Matrícula:</p>

    <p>ID INEP:</p>

    <p>CPF do docente:</p>

    <p>Data de Nascimento:</p>

    <p>Sexo do docente:</p>

    <p>Nome Completo da Mãe:</p>

    <p>Cor/Raça do Aluno:</p>

    <p>Nacionalidade: </p>

    <p>País de Origem:  </p>

    <p>UF de Nascimento:</p>

    <p>Município de Nascimento: </p>

    <p>Docente com Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação:</p>

    <p>Tipo de Deficiência, Transtorno Global do Desenvolvimento ou Altas Habilidades/Superdotação:</p> 

    <br>

    <h2 class="Titulo">Adicionar Informações</h2> 
    <HR NOSHADE SIZE="4">

        <div id="botoesAddInformacoes">

        <form style="display: inline;" method="post" action="">
            <input style="display: none;" type="text" name="id_gede" value="<?php echo($res['id_gede']); ?>">
            <button type="submit" class="btn btn-default" >Situação do Docente na IES</button>
        </form>

            <form style="display: inline;" method="post" action="adicionar_atuacao_docente.php">
            <input style="display: none;" type="text" name="id_gede" value="<?php echo($res['id_gede']); ?>">
            <button type="submit" class="btn btn-default" >Atuação do Docente</button>
        </form>

        <form style="display: inline;" method="post" action="">
            <input style="display: none;" type="text" name="id_gede" value="<?php echo($res['id_gede']); ?>">
            <button type="submit" class="btn btn-default" >Vinculação</button>
        </form>

        <form style="display: inline;" method="post" action="">
            <input style="display: none;" type="text" name="id_gede" value="<?php echo($res['id_gede']); ?>">
            <button type="submit" class="btn btn-default" >Curso/Área de Atuação</button>
        </form>

    </div>
    
</section>

<?php include("fim_pagina.php"); ?>