<img width="25" src ="imagens/pesquisa.png"> Projeto de pesquisa <br><br>

<p>Título do projeto: <span style="color: #737373"> <?php echo('Biomassa nas receitas do Brasil'); ?></span></p>

<p>Título do projeto: <span style="color: #737373"> <?php echo('Biomassa em receitas baianas'); ?> </span></p>

<p>Orientador: <span style="color: #737373"> <?php echo ('Maria Luiza da Silva'); ?> </span></p>

<p>Modalidade: <span style="color: #737373"> <?php echo Fapesb; ?> </span></p>

<p>Remoneração: <span style="color: #737373"> <?php echo Sim; ?> </span></p>

<p>Início: <span style="color: #737373"> <?php echo('30/09/2015'); ?> </span></p>

<p>Fim: <span style="color: #737373"> <?php echo('30/12/2015'); ?> </span></p>

<p>Observações: <span style="color: #737373"> <?php echo('Aluno desligado do projeto.'); ?> </span></p>

<!-- Links -->
<img width="20" src ="imagens/topico.png"><a data-toggle="modal" href="#myModal">Informações de importação</a>
<!--<img width="20" src ="imagens/topico.png"> <a>Informações de importação</a>-->

<div class="container">

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Informações de importação</h4>
                </div>
                <div class="modal-body">
                    <p>Colaborador: Júlio</p>
                    <p>Fonte: PPPG</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>

        </div>
    </div>

</div>

<br><br>

<div id="botoesEdicao2">
    <form style="display: inline;" method="post" action=".php">
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
        <button type="submit" class="btn btn-default" onclick="return confirm('Deseja editar?')">Editar</button>
    </form>
    <form style="display: inline;" method="post" action=".php">
        <input style="display: none;" type="text" name="matricula_uefs" value="<?php echo($res['matricula_uefs']); ?>">
        <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja mesmo excluir?')">Excluir</button>
    </form>

</div>