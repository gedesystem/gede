<?php include("topo_pagina.php"); ?>

<section>

    <form method="post" action=".php">
        
        <h2 class="Titulo">Dados de Financiamento de Aluno</h2> 

        <HR NOSHADE SIZE="4">
        
        <p>Tipo de Financiamento Estudantil Reembolsável:</p>
        <div class="radio">
            <label><input type="radio" name="nFinanciamentoReembolsavel" value="FIES" checked/>FIES</label>
            <label><input type="radio" name="nFinanciamentoReembolsavel" value="Estadual">Programa de Financiamento do Governo Estadual</label>
            <label><input type="radio" name="nFinanciamentoReembolsavel" value="Municipal">Programa de Financiamento do Governo Municipal</label>
            <label><input type="radio" name="nFinanciamentoReembolsavel" value="IES">Programa de Financiamento da IES</label>
            <label><input type="radio" name="nFinanciamentoReembolsavel" value="Externas">Programa de Financiamento de Entidades Externas</label>
        </div>
        
        <p>Tipo de Financiamento Estudantil não Reembolsável:</p>
        <div class="radio">
            <label><input type="radio" name="nFinanciamentoNaoReembolsavel" value="ProUniIntegral" checked/>ProUni Integral</label>
            <label><input type="radio" name="nFinanciamentoNaoReembolsavel" value="ProUniParcial">ProUni Parcial</label>
            <label><input type="radio" name="nFinanciamentoNaoReembolsavel" value="Estadual">Programa de Financiamento do Governo Estadual</label>
            <label><input type="radio" name="nFinanciamentoNaoReembolsavel" value="Municipal">Programa de Financiamento do Governo Municipal</label>
            <label><input type="radio" name="nFinanciamentoNaoReembolsavel" value="IES">Programa de Financiamento da IES</label>
            <label><input type="radio" name="nFinanciamentoNaoReembolsavel" value="Externas">Programa de Financiamento de Entidades Externas</label>
        </div>
        
        <p>Possui Apoio Social?:</p>
        <div class="radio">
            <label><input type="radio" name="nApoioSocial" value="Sim" checked/>Sim</label>
            <label><input type="radio" name="nApoioSocial" value="Nao">Não</label>
        </div>
        
        <p>Tipo de Apoio Social:</p>
        <div class="radio">
            <label><input type="radio" name="nTipoApoioSocial" value="Alimentacao" checked/>Alimentação</label>
            <label><input type="radio" name="nTipoApoioSocial" value="Moradia">Moradia</label>
            <label><input type="radio" name="nTipoApoioSocial" value="Transporte">Transporte</label>
            <label><input type="radio" name="nTipoApoioSocial" value="Material">Material Didático</label>
            <label><input type="radio" name="nTipoApoioSocial" value="Trabalho">Bolsa Trabalho</label>
            <label><input type="radio" name="nTipoApoioSocial" value="Permanencia">Bolsa Permanência</label>
        </div>

        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
    </form>
    <button type="button" class="btn btn-warning" onclick="location.href = '.php'">Cancelar</button>

</section>

<?php include("fim_pagina.php"); ?>