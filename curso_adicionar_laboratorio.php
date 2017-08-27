<?php include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$codigo_curso = $_POST["codigo_curso"];
?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Adicionar Informação de Laboratório de Curso</h2>

        <HR NOSHADE SIZE="4">

        <p>Código:<input type="text" class="form-control" required="required" name="nCodigo" pattern="[0-9]+$" placeholder="Código do laboratório."></p>

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."></p>

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

    </form>

    <HR NOSHADE SIZE="4">

    <form method="post" action="curso_detalhes.php">

        <input style="display: none;" type="text" name="codigo_curso" value="<?php echo($codigo_curso); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>

    </form>

</section>

<?php include("fim_pagina.php"); ?>
