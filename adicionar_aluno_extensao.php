<?php include("topo_pagina.php"); ?>

<section>

    <form method="post" action=".php">
        
        <h2 class="Titulo">Adicionar Informação de Extensão de Aluno</h2> 

        <HR NOSHADE SIZE="4">

<!--        <p>Matrícula do Aluno:<input type="text" class="form-control" required="required" name="nMatricula" pattern="[0-9]+$" placeholder="Número de matrícula na IES."></p>-->

        <p>Título do Projeto:<input type="text" class="form-control" required="required" name="nTituloProjeto" pattern="[A-Z\s]+$" placeholder="Título do projeto de extensão."></p>

        <p>Orientador:<input type="text" class="form-control" required="required" name="nOrientador" pattern="[0-9]+$" placeholder="Número de matrícula do orientador na IES."></p>
        
        <p>Extensão remunerada?:</p>
        <div class="radio">
            <label><input type="radio" name="nRemuneracao" value="0" checked/>Não</label>
            <label><input type="radio" name="nRemuneracao" value="1">Sim</label>
        </div>
        
        <p>Tipo de extensão:</p>
        <div class="radio">
            <label><input type="radio" name="nTipo" value="0" checked/>Programa</label>
            <label><input type="radio" name="nTipo" value="1">Projeto</label>
        </div>
        
        <p>Início: <input type="text" class="form-control" required="required" name="nInicio" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de início da extensão, separada por barras. Ex: 01/05/2015."></p>

        <p>Fim: <input type="text" class="form-control" required="required" name="nFim" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" placeholder="Data de fim da extensão, separada por barras. Ex: 01/05/2016."></p>

        <p>Observações:<input type="text" class="form-control" pattern="[A-Z\s]+$"  name="nObservacao" placeholder="Observações que precisem ser inseridas."></p>

        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
    </form>
    <button type="button" class="btn btn-warning" onclick="location.href = '.php'">Cancelar</button>

</section>

<?php include("fim_pagina.php"); ?>