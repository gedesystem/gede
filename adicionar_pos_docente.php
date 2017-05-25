<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$id_gede = $_POST["id_gede"];
?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Pós Graduação de Docente</h2> 

        <HR NOSHADE SIZE="4">

        <p>Pós-Graduação:</p>
        <div class="radio">
            <label><input type="radio" name="nPosGraduacaoDocente" value="Especializacao" checked/>Especialização</label>
            <label><input type="radio" name="nPosGraduacaoDocente" value="Mestrado">Mestrado</label>
            <label><input type="radio" name="nPosGraduacaoDocente" value="Doutorado">Doutorado</label>
            <label><input type="radio" name="nPosGraduacaoDocente" value="NaoPossui">Não Possui</label>
        </div>

        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

        <HR NOSHADE SIZE="4">

    </form>

    <form method="post" action="detalhes_docente.php">
        <input style="display: none;" type="text" name="id_gede" value="<?php echo($id_gede); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<?php include("fim_pagina.php"); ?>