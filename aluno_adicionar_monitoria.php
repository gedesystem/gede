<?php include("topo_pagina.php"); ?>

<section>

    <form method="post" action=".php">

        <h2 class="Titulo">Adicionar Informação de Monitoria de Aluno</h2> 

        <HR NOSHADE SIZE="4">

<!--        <p>Matrícula do Aluno:<input type="text" class="form-control" required="required" name="nMatricula" pattern="[0-9]+$" placeholder="Número de matrícula na IES."></p>-->

        <p>Monitoria remunerada?:</p>
        <div class="radio">
            <label><input type="radio" name="nRemuneracao" value="0" checked/>Não</label>
            <label><input type="radio" name="nRemuneracao" value="1">Sim</label>
        </div>

        <p>Início: <input type="text" class="form-control" required="required" name="nInicio" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de início da monitoria, separada por barras. Ex: 01/05/2015."></p>

        <p>Fim: <input type="text" class="form-control" required="required" name="nFim" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de fim da monitoria, separada por barras. Ex: 01/05/2016."></p>

        <p>Observações:<input type="text" class="form-control" pattern="[A-Z\s]+$"  name="nObservacao" placeholder="Observações que precisem ser inseridas."></p>

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

    </form>

    <HR NOSHADE SIZE="4">

    <form method="post" action="aluno_detalhes.php">

        <input style="display: none;" type="text" name="matricula_uefs" value="">
        <button type="submit" class="btn btn-default"> Voltar </button>

    </form>

</section>

<?php include("fim_pagina.php"); ?>