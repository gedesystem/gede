<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');
$matricula = $_POST['matricula_uefs'];
?>

<section>

    <form method="post" action="bd_aluno_adicionar_ingresso.php">

        <h2 class="Titulo">Dados de Ingresso de Aluno</h2>

        <HR NOSHADE SIZE="4">

        <p>Tipo de Escola que Concluiu o Ensino Médio:</p>
        <div class="radio">
            <label><input type="radio" name="nTipoEscola" value="0" checked/>Privada</label>
            <label><input type="radio" name="nTipoEscola" value="1">Pública</label>
            <label><input type="radio" name="nTipoEscola" value="2">Não Dispõe da Informação</label>
        </div>

        <p>Semestre de Ingresso no Curso:<input type="text" class="form-control" required="required" name="nSemestreIngresso" pattern="0(1|2)[0-9]{4}" placeholder="Semestre e ano no seguinte formato: SSAAAA. Exemplo:012014"></p>

        <p>Forma de Ingresso/Seleção:</p>
        <div class="radio">
            <label><input type="radio" name="nFormaIngresso" value="0" checked/>Vestibular</label>
            <label><input type="radio" name="nFormaIngresso" value="1">ENEM</label>
            <label><input type="radio" name="nFormaIngresso" value="2">Avaliação Seriada</label>
            <label><input type="radio" name="nFormaIngresso" value="3">Seleção Simplificada (Análise de Currículo, entrevista, etc.)</label><br>
            <label><input type="radio" name="nFormaIngresso" value="4">Egresso BI/LI</label>
            <label><input type="radio" name="nFormaIngresso" value="5">Transferência <i>Ex-Officio</i></label>
            <label><input type="radio" name="nFormaIngresso" value="6">Convênio PEC-G</label>
            <label><input type="radio" name="nFormaIngresso" value="7">Decisão Judicial</label><br>
            <label><input type="radio" name="nFormaIngresso" value="8">Seleção para Vagas Remanescentes</label>
            <label><input type="radio" name="nFormaIngresso" value="9">Seleção para Vagas de Programas Especiais</label>
        </div>

        <p>Participa de Programa de Reserva de Vagas?:</p>
        <div class="radio">
            <label><input type="radio" name="nReservaVagas" value="1" checked
                onclick="selecionaReservaVagas(this.value)"/>Sim</label>
            <label><input type="radio" name="nReservaVagas" value="0"
                onclick="selecionaReservaVagas(this.value)">Não</label>
        </div>

        <div id="reservaVagas">
            <p>Tipo de Programa de Reserva de Vagas:</p>
            <div class="radio">
                <label><input type="radio" name="nTipoReserva" value="0" checked/>Étnico</label>
                <label><input type="radio" name="nTipoReserva" value="1">Pessoa com Deficiência</label>
                <label><input type="radio" name="nTipoReserva" value="2">Estudante Procedente de Escola Pública</label>
                <label><input type="radio" name="nTipoReserva" value="3">Social/Renda Familiar</label>
                <label><input type="radio" name="nTipoReserva" value="4">Outros</label>
            </div>
        </div>

        <p>Possui Financiamento Estudantil?:</p>
        <div class="radio">
            <label><input type="radio" name="nFinanciamento" value="1" checked/>Sim</label>
            <label><input type="radio" name="nFinanciamento" value="0">Não</label>
        </div>

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."></p>

        <br>
        <div id="botoesAdicao">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula); ?>">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

        <HR NOSHADE SIZE="4">
    </form>

    <form method="post" action="aluno_detalhes.php">
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<script src="js/aluno_adicionar_ingresso_form.js"></script>

<?php include("fim_pagina.php"); ?>
