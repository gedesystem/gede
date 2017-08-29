<?php
include("topo_pagina.php");
error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once('funcoes_uteis.php');

$matricula_uefs = $_POST["matricula_uefs"];

conexao();

$sql_seleciona = "SELECT * FROM alunos_ingresso WHERE matricula_uefs = '" . $matricula_uefs . "'";
$resultado = seleciona($sql_seleciona);


$res = mysql_fetch_assoc($resultado);

?>

<section>

    <form method="post" action="bd_aluno_editar_ingresso.php">

        <h2 class="Titulo">Editar Dados de Ingresso de Aluno</h2>

        <HR NOSHADE SIZE="4">

        <p>Tipo de Escola que Concluiu o Ensino Médio:</p>
        <div class="radio">
            <label><input type="radio" name="nTipoEscola" value="0"
                <?php echo(($res['tipo_escola'] == 0) ? "checked" : ""); ?>/>Privada</label>
            <label><input type="radio" name="nTipoEscola" value="1"
                <?php echo(($res['tipo_escola'] == 1) ? "checked" : ""); ?>>Pública</label>
            <label><input type="radio" name="nTipoEscola" value="2"
                <?php echo(($res['tipo_escola'] == 2) ? "checked" : ""); ?>>Não Dispõe da Informação</label>
        </div>

        <p>Semestre de Ingresso no Curso:<input type="text" class="form-control" required="required" name="nSemestreIngresso" pattern="0(1|2)[0-9]{4}" placeholder="Semestre e ano no seguinte formato: SSAAAA. Exemplo:012014"
            value="<?php echo($res['semestre_ingresso']); ?>"></p>

        <p>Forma de Ingresso/Seleção:</p>
        <div class="radio">
            <label><input type="radio" name="nFormaIngresso" value="0"
                <?php echo(($res['forma_ingresso'] == 0) ? "checked" : ""); ?>/>Vestibular</label>
            <label><input type="radio" name="nFormaIngresso" value="1"
                <?php echo(($res['forma_ingresso'] == 1) ? "checked" : ""); ?>>ENEM</label>
            <label><input type="radio" name="nFormaIngresso" value="2"
                <?php echo(($res['forma_ingresso'] == 2) ? "checked" : ""); ?>>Avaliação Seriada</label>
            <label><input type="radio" name="nFormaIngresso" value="3"
                <?php echo(($res['forma_ingresso'] == 3) ? "checked" : ""); ?>>Seleção Simplificada (Análise de Currículo, entrevista, etc.)</label><br>
            <label><input type="radio" name="nFormaIngresso" value="4"
                <?php echo(($res['forma_ingresso'] == 4) ? "checked" : ""); ?>>Egresso BI/LI</label>
            <label><input type="radio" name="nFormaIngresso" value="5"
                <?php echo(($res['forma_ingresso'] == 5) ? "checked" : ""); ?>>Transferência <i>Ex-Officio</i></label>
            <label><input type="radio" name="nFormaIngresso" value="6"
                <?php echo(($res['forma_ingresso'] == 6) ? "checked" : ""); ?>>Convênio PEC-G</label>
            <label><input type="radio" name="nFormaIngresso" value="7"
                <?php echo(($res['forma_ingresso'] == 7) ? "checked" : ""); ?>>Decisão Judicial</label><br>
            <label><input type="radio" name="nFormaIngresso" value="8"
                <?php echo(($res['forma_ingresso'] == 8) ? "checked" : ""); ?>>Seleção para Vagas Remanescentes</label>
            <label><input type="radio" name="nFormaIngresso" value="9"
                <?php echo(($res['forma_ingresso'] == 9) ? "checked" : ""); ?>>Seleção para Vagas de Programas Especiais</label>
        </div>

        <p>Participa de Programa de Reserva de Vagas?:</p>
        <div class="radio">
            <label><input type="radio" name="nReservaVagas" value="1"
                <?php echo(($res['reserva_vagas'] == 1) ? "checked" : ""); ?>
                onclick="selecionaReservaVagas(this.value)"/>Sim</label>
            <label><input type="radio" name="nReservaVagas" value="0"
                <?php echo(($res['reserva_vagas'] == 0) ? "checked" : ""); ?>
                onclick="selecionaReservaVagas(this.value)">Não</label>
        </div>

        <div id="reservaVagas" style="<?php echo(($res['reserva_vagas'] == 1) ? 'display:block' : 'display:none'); ?>">
            <p>Tipo de Programa de Reserva de Vagas:</p>
            <div class="radio">
                <label><input type="radio" name="nTipoReserva" value="0"
                    <?php echo(($res['tipo_reserva'] == 0) ? "checked" : ""); ?>/>Étnico</label>
                <label><input type="radio" name="nTipoReserva" value="1"
                    <?php echo(($res['tipo_reserva'] == 1) ? "checked" : ""); ?>>Pessoa com Deficiência</label>
                <label><input type="radio" name="nTipoReserva" value="2"
                    <?php echo(($res['tipo_reserva'] == 2) ? "checked" : ""); ?>>Estudante Procedente de Escola Pública</label>
                <label><input type="radio" name="nTipoReserva" value="3"
                    <?php echo(($res['tipo_reserva'] == 3) ? "checked" : ""); ?>>Social/Renda Familiar</label>
                <label><input type="radio" name="nTipoReserva" value="4"
                    <?php echo(($res['tipo_reserva'] == 4) ? "checked" : ""); ?>>Outros</label>
            </div>
        </div>

        <p>Possui Financiamento Estudantil?:</p>
        <div class="radio">
            <label><input type="radio" name="nFinanciamento" value="1"
                <?php echo(($res['financiamento'] == 1) ? "checked" : ""); ?>/>Sim</label>
            <label><input type="radio" name="nFinanciamento" value="0"
                <?php echo(($res['financiamento'] == 0) ? "checked" : ""); ?>>Não</label>
        </div>

        <p>Fonte:<input type="text" class="form-control"  name="nFonte" placeholder="Entidade que forneceu estas informações."
            value="<?php echo($res['fonte']); ?>"></p>

        <br>
        <div id="botoesAdicao">
            <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula_uefs); ?>">
            <button type="submit" class="btn btn-primary" value="salvar" >Salvar informações</button>
        </div>

        <HR NOSHADE SIZE="4">
    </form>

    <form method="post" action="aluno_editar_cadastro.php">
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($matricula_uefs); ?>">
        <button type="submit" class="btn btn-default"> Voltar </button>
    </form>

</section>

<script src="js/aluno_adicionar_ingresso_form.js"></script>

<?php include("fim_pagina.php"); ?>
