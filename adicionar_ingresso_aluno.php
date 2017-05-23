<?php include("topo_pagina.php"); ?>

<section>

    <form method="post" action=".php">
        
        <h2 class="Titulo">Dados de Ingresso de Aluno</h2> 

        <HR NOSHADE SIZE="4">
        
        <p>Tipo de Escola que Concluiu o Ensino Médio:</p>
        <div class="radio">
            <label><input type="radio" name="nTipoEscola" value="Privada" checked/>Privada</label>
            <label><input type="radio" name="nTipoEscola" value="Publica">Pública</label>
            <label><input type="radio" name="nTipoEscola" value="NaoDispoe">Não Dispõe da Informação</label>
        </div>
        
        <p>Semestre de Ingresso no Curso:<input type="text" class="form-control" required="required" name="nSemestreIngresso" pattern="[0-9]+$" placeholder="Semestre de Ingresso. Utilize somente números."></p>
        
        <p>Forma de Ingresso/Seleção:</p>
        <div class="radio">
            <label><input type="radio" name="nFormaIngresso" value="Vestibular" checked/>Vestibular</label>
            <label><input type="radio" name="nFormaIngresso" value="ENEM">ENEM</label>
            <label><input type="radio" name="nFormaIngresso" value="Seriada">Avaliação Seriada</label>
            <label><input type="radio" name="nFormaIngresso" value="Simplificada">Seleção Simplificada (Análise de Currículo, entrevista, etc.)</label><br>
            <label><input type="radio" name="nFormaIngresso" value="BILI">Egresso BI/LI</label>
            <label><input type="radio" name="nFormaIngresso" value="ExOfficio">Transferência <i>Ex-Officio</i></label>
            <label><input type="radio" name="nFormaIngresso" value="Convenio">Convênio PEC-G</label>
            <label><input type="radio" name="nFormaIngresso" value="Judicial">Decisão Judicial</label><br>
            <label><input type="radio" name="nFormaIngresso" value="VagasRemanescentes">Seleção para Vagas Remanescentes</label>
            <label><input type="radio" name="nFormaIngresso" value="VagasEspeciais">Seleção para Vagas de Programas Especiais</label>
        </div>
        
        <p>Participa de Programa de Reserva de Vagas?:</p>
        <div class="radio">
            <label><input type="radio" name="nReservaVagas" value="Sim" checked/>Sim</label>
            <label><input type="radio" name="nReservaVagas" value="Nao">Não</label>
        </div>
        
        <p>Tipo de Programa de Reserva de Vagas:</p>
        <div class="radio">
            <label><input type="radio" name="nTipoReserva" value="Etnico" checked/>Étnico</label>
            <label><input type="radio" name="nTipoReserva" value="Deficiencia">Pessoa com Deficiência</label>
            <label><input type="radio" name="nTipoReserva" value="Publica">Estudante Procedente de Escola Pública</label>
            <label><input type="radio" name="nTipoReserva" value="Social">Social/Renda Familiar</label>
            <label><input type="radio" name="nTipoReserva" value="Outros">Outros</label>
        </div>
        
        <p>Possui Financiamento Estudantil?:</p>
        <div class="radio">
            <label><input type="radio" name="nFinanciamento" value="Sim" checked/>Sim</label>
            <label><input type="radio" name="nFinanciamento" value="Nao">Não</label>
        </div>
        
        <HR NOSHADE SIZE="4">

        <div id="botoesAdicao">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar</button>
    </form>
    <button type="button" class="btn btn-warning" onclick="location.href = '.php'">Cancelar</button>

</section>

<?php include("fim_pagina.php"); ?>