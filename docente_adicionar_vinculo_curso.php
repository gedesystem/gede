<?php include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$matricula_uefs = $_POST["matricula_uefs"];
?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Adicionar Informações de Vínculo de Docente a Curso</h2>

        Esta sessão refere-se à vinculação do docente a um curso.

        <HR NOSHADE SIZE="4">

        <!-- Abaixo alguns campos padrões que podem ser necessários ou não -->

        <p>Código do Curso:<input type="text" class="form-control" required="required" name="nCodigo" pattern="[0-9]+$" placeholder="Código do curso ao qual o docente terá vínculo."></p>

        <p>Observações:<input type="text" class="form-control" pattern="[A-Z\s]+$"  name="nObservacao" placeholder="Observações que precisem ser inseridas."></p>

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
