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
        <form style="display: inline;" method="post" action="">
            <input style="display: none;" type="text" name="codigo_curso" value="<?php echo($res['codigo_curso']); ?>">
            <button type="submit" class="btn btn-default" onclick="return confirm('Deseja editar?')">Editar</button>
        </form>
        <form style="display: inline;" method="post" action="bd_curso_excluir_cadastro.php">
            <input style="display: none;" type="text" name="codigo_curso" value="<?php echo($res['codigo_curso']); ?>">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir?')">Excluir</button>
        </form>

        <button type="button" class="btn btn-warning" onclick="location.href = 'modulo_cursos.php'">Cancelar</button>

    </div>

    <HR NOSHADE SIZE="4">

    <p>Código: <span style="color: #737373"> <?php echo($res['codigo_curso']); ?></span></p>

    <p>Nome: <span style="color: #737373"> <?php echo($res['nome']); ?></span> </p>

    <p>Grau Acadêmico: <span style="color: #737373"> <?php 
    if($res['grau'] == 0) echo("Bacharelado"); 
    if($res['grau'] == 1) echo("Tecnológico"); 
    if($res['grau'] == 2) echo("Licenciatura"); ?></span></p>

    <p>Modalidade: <span style="color: #737373"> <?php 
    if($res['modalidade'] == 0) echo("Presencial"); 
    if($res['modalidade'] == 1) echo("À Distância"); ?></span></p>

    <p>Nível Acadêmico: <span style="color: #737373"> <?php 
    if($res['nivel_academico'] == 0) echo("Graduação"); 
    if($res['nivel_academico'] == 1) echo("Sequencial"); ?></span></p>

    <p>Atributo de Ingresso: <span style="color: #737373"> <?php 
    if($res['tipo_ingresso'] == 0) echo("Normal"); 
    if($res['tipo_ingresso'] == 1) echo("Área Básica de Ingresso"); 
    if($res['tipo_ingresso'] == 2) echo("Bacharelado Integrado"); 
    if($res['tipo_ingresso'] == 3) echo("Licenciatura Integrado"); ?></span></p>

    <p>Carga Horária: <span style="color: #737373"> <?php echo($res['carga_horaria']); ?></span></p>

    <p>Data de Início do Funcionamento: <span style="color: #737373"> <?php echo($res['inicio_funcionamento']); ?></span></p>

    <p>Data de Autorização: <span style="color: #737373"> <?php echo($res['data_autorizacao']); ?></span></p>

    <p>Situação do Curso no e-MEC: <span style="color: #737373"> <?php 
    if($res['situacao_emec'] == 0) echo("Em Atividade");
    if($res['situacao_emec'] == 1) echo("Em Extinção");
    if($res['situacao_emec'] == 2) echo("Extinto em 2015"); ?></span></p>

    <p>Curso Gratuito?: <span style="color: #737373"> <?php 
    if($res['gratuito'] == 0) echo("Não");
    if($res['gratuito'] == 1) echo("Sim"); ?></span></p>

    <br>
    <HR NOSHADE SIZE="4">
    <h2 class="Titulo">Adicionar Informações</h2> 

    <p>Cadastrais</p>
    <div id="botoesAddInformacoes">

        <form style="display: inline;" method="post" action="curso_adicionar_dados_censitarios.php">
            <input style="display: none;" type="text" name="codigo_curso" value="<?php echo($res['codigo_curso']); ?>">
            <button type="submit" class="btn btn-default" >Adicionar Dados Censitários</button>
        </form>
        
        <form style="display: inline;" method="post" action="curso_adicionar_laboratorio.php">
            <input style="display: none;" type="text" name="codigo_curso" value="<?php echo($res['codigo_curso']); ?>">
            <button type="submit" class="btn btn-default" >Adicionar Laboratório</button>
        </form>


    </div>

</section>

<?php include("fim_pagina.php"); ?>