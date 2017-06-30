<?php include("topo_pagina.php"); 

require_once('funcoes_uteis.php');
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$codigo_curso = $_POST["codigo_curso"];

conexao();

$sql_seleciona = "SELECT * FROM cursos_dados_cadastrais WHERE codigo_curso = '" . $codigo_curso . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);

?>

<section>

    <h2 class="Titulo">Informações do Curso</h2> 

    <div id="botoesEdicao">
        <form style="display: inline;" method="post" action="edicao_curso.php">
            <input style="display: none;" type="text" name="codigo_curso" value="<?php echo($res['codigo_curso']); ?>">
            <button type="submit" class="btn btn-default" onclick="return confirm('Deseja editar?')">Editar</button>
        </form>
        <form style="display: inline;" method="post" action="bd_exclusao_curso.php">
            <input style="display: none;" type="text" name="codigo_curso" value="<?php echo($res['codigo_curso']); ?>">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir?')">Excluir</button>
        </form>

        <button type="button" class="btn btn-warning" onclick="location.href = 'menu_cursos.php'">Cancelar</button>

    </div>

    <HR NOSHADE SIZE="4">

    <p>Código: </p>

    <p>Nome: <span style="color: #737373"> <?php echo($res['nome']); ?></span> </p>

    <p>Grau Acadêmico: </p>

    <p>Modalidade: </p>

    <p>Nível Acadêmico: </p>

    <p>Atributo de Ingresso: </p>

    <p>Carga Horária: </p>

    <p>Data de Início do Funcionamento: </p>

    <p>Data de Autorização: </p>

    <p>Situação do Curso no e-MEC: </p>

    <p>Curso Gratuito?: </p>

    <br>

    <h2 class="Titulo">Adicionar Informações</h2> 
    <HR NOSHADE SIZE="4">

    <div id="botoesAddInformacoes">

        <form style="display: inline;" method="post" action="adicionar_dados_censitarios_curso.php.php">
            <input style="display: none;" type="text" name="codigo_curso" value="<?php echo($res['codigo_curso']); ?>">
            <button type="submit" class="btn btn-default" >Adicionar Dados Censitários</button>
        </form>


    </div>

</section>

<?php include("fim_pagina.php"); ?>