<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');

$matricula_uefs = $_POST["matricula_uefs"];

conexao();

$sql_seleciona = "SELECT * FROM alunos_extensao WHERE matricula_uefs = '" . $matricula_uefs . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);
?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Adicionar Informação de Extensão de Aluno</h2>

        <HR NOSHADE SIZE="4">

<!--        <p>Matrícula do Aluno:<input type="text" class="form-control" required="required" name="nMatricula" pattern="[0-9]+$" placeholder="Número de matrícula na IES."></p>-->

        <p>Título do Projeto:<input type="text" class="form-control" required="required" name="nTituloProjeto" pattern="[A-Z\s]+$" placeholder="Título do projeto de extensão. Utilize letras MAIÚSCULAS."
            value="<?php echo($res['titulo_projeto']); ?>"></p>

        <p>Orientador:<input type="text" class="form-control" required="required" name="nOrientador" placeholder="Nome do orientador na IES."
            value="<?php echo($res['orientador']); ?>"></p>

        <p>Extensão remunerada?:</p>
        <div class="radio">
            <label><input type="radio" name="nRemuneracao" value="0"
                <?php echo(($res['remuneracao'] == 0) ? "checked" : ""); ?>>Não</label>
            <label><input type="radio" name="nRemuneracao" value="1"
                <?php echo(($res['remuneracao'] == 1) ? "checked" : ""); ?>>Sim</label>
        </div>

        <p>Tipo de extensão:</p>
        <div class="radio">
            <label><input type="radio" name="nTipo" value="0"
                <?php echo(($res['tipo'] == 0) ? "checked" : ""); ?>/>Programa</label>
            <label><input type="radio" name="nTipo" value="1"
                <?php echo(($res['tipo'] == 1) ? "checked" : ""); ?>>Projeto</label>
        </div>

        <p>Início: <input type="text" class="form-control" required="required" name="nInicio" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de início da extensão, separada por barras. Ex: 01/05/2015."
            value="<?php echo(DateTime::createFromFormat('Y-m-d', $res['inicio'])->format('d/m/Y')); ?>"></p>

        <p>Fim: <input type="text" class="form-control" required="required" name="nFim" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de fim da extensão, separada por barras. Ex: 01/05/2016."
            value="<?php echo(DateTime::createFromFormat('Y-m-d', $res['fim'])->format('d/m/Y')); ?>"></p>

        <p>Observações:<input type="text" class="form-control"  name="nObservacao" placeholder="Observações que precisem ser inseridas."
            value="<?php echo($res['observacao']); ?>"></p>

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."
            value="<?php echo($res['fonte']); ?>"></p>

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

    </form>

    <HR NOSHADE SIZE="4">

    <form method="post" action="aluno_editar_cadastro.php">
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula_uefs); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<?php include("fim_pagina.php"); ?>
