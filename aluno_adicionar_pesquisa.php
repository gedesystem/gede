<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$matricula = $_POST['matricula_uefs'];
?>

<section>

    <form method="post" action="bd_aluno_adicionar_pesquisa.php">

        <h2 class="Titulo">Adicionar Informação de Pesquisa de Aluno</h2>

        <HR NOSHADE SIZE="4">

<!--        <p>Matrícula do Aluno:<input type="text" class="form-control" required="required" name="nMatricula" pattern="[0-9]+$" placeholder="Número de matrícula na IES."></p>-->

        <p>Pesquisa remunerada?:</p>
        <div class="radio">
            <label><input type="radio" name="nRemuneracao" value="0" checked/>Não</label>
            <label><input type="radio" name="nRemuneracao" value="1">Sim</label>
        </div>

        <p>Orientador:<input type="text" class="form-control" required="required" name="nOrientador" placeholder="Nome do orientador na IES."></p>

        <p>Título do Plano de Trabalho:<input type="text" class="form-control" required="required" name="nTituloPlano" pattern="[A-Z\s]+$" placeholder="Título do plano de trabalho da pesquisa. Utilize letras MAIÚSCULAS."></p>

        <p>Título do Projeto:<input type="text" class="form-control" required="required" name="nTituloProjeto" pattern="[A-Z\s]+$" placeholder="Título do projeto da pesquisa. Utilize letras MAIÚSCULAS."></p>

        <p>Modalidade:<input type="text" class="form-control" required="required" name="nModalidade" pattern="[A-Z\s]+$" placeholder="Modalidade da pesquisa (ex: probic, fapesb, etc.). Utilize letras MAIÚSCULAS."></p>

        <p>Início: <input type="text" class="form-control" required="required" name="nInicio" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de início da pesquisa, separada por barras. Ex: 01/05/2015."></p>

        <p>Fim: <input type="text" class="form-control" required="required" name="nFim" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de fim da pesquisa, separada por barras. Ex: 01/05/2016."></p>

        <p>Observações:<input type="text" class="form-control"  name="nObservacao" placeholder="Observações que precisem ser inseridas."></p>

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."></p>

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

    </form>

    <HR NOSHADE SIZE="4">

    <form method="post" action="aluno_detalhes.php">
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<?php include("fim_pagina.php"); ?>
