<img width="25" src ="imagens/mobilidade.png"> Mobilidade acadêmica <br><br>

<p>Tipo: <span style="color: #737373"> <?php echo(Exemplo); ?></span></p>

<p>Tipo Mobilidade Internacional: <span style="color: #737373"> <?php echo(Exemplo); ?> </span></p>

<p>País: <span style="color: #737373"> <?php echo(Exemplo); ?> </span></p>

<p>Início: <span style="color: #737373"> <?php echo(Exemplo); ?> </span></p>

<p>Fim: <span style="color: #737373"> <?php echo(Exemplo); ?> </span></p>

<p>Observações: <span style="color: #737373"> <?php echo(Exemplo); ?> </span></p>

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
                    <p>Colaborador: Exemplo</p>
                    <p>Fonte: Exemplo</p>
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