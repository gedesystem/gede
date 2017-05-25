<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$id_gede = $_POST["id_gede"];
?>

<section>
    <form method="post" action=".php">

        <h2 class="Titulo">Atividade Extracurricular de Aluno</h2> 

        Esta sessão destina-se a qualquer tipo de atividade não incluída no currículo do curso.
        <HR NOSHADE SIZE="4">

        <p>Tipo de Atividade Extracurricular:</p>
        <div class="radio">
            <label><input type="radio" name="nTipoAtividade" value="Pesquisa" checked/>Pesquisa</label>
            <label><input type="radio" name="nTipoAtividade" value="Extensao">Extensão</label>
            <label><input type="radio" name="nTipoAtividade" value="Monitoria">Monitoria</label>
            <label><input type="radio" name="nTipoAtividade" value="Estagio">Estágio não Obrigatório</label>
        </div>

        <p>Possui Bolsa/Remuneração?:</p>
        <div class="radio">
            <label><input type="radio" name="nBolsa" value="Sim" checked/>Sim</label>
            <label><input type="radio" name="nBolsa" value="Nao">Não</label>
        </div>

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

        <HR NOSHADE SIZE="4">
        
    </form>

    <form method="post" action="detalhes_aluno.php">
        <input style="display: none;" type="text" name="id_gede" value="<?php echo($id_gede); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<?php include("fim_pagina.php"); ?>