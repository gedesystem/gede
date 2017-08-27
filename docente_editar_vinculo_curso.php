<?php include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$matricula_uefs = $_POST["matricula_uefs"];

conexao();

$sql_seleciona = "SELECT * FROM docentes_vinculo_docentes WHERE matricula_uefs = '" . $matricula_uefs . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);
?>

<section>

    <form method="post" action="bd_docente_editar_vinculo_curso.php">

        <h2 class="Titulo">Editar Informações de Vínculo de Docente a Curso</h2>

        <HR NOSHADE SIZE="4">

        <!-- Abaixo alguns campos padrões que podem ser necessários ou não -->

        <p>Código do Curso:<input type="text" class="form-control" required="required" name="nCodigo" pattern="[0-9]+$" placeholder="Código do curso ao qual o docente terá vínculo."
            value="<?php echo($res['codigo_curso']); ?>"></p>

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."
            value="<?php echo($res['fonte']); ?>"></p>

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

    </form>

    <HR NOSHADE SIZE="4">

    <form method="post" action="docente_detalhes.php">

        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula_uefs); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>

    </form>

</section>

<?php include("fim_pagina.php"); ?>
