<?php
include("topo_pagina.php");
require_once('funcoes_uteis.php');
?>

<section>

    <h2 class="Titulo">Cooperadores do Sistema</h2>

    Os cooperadores são usuários que possuem privilégios para realizar a manutenção da base de dados do sistema. 

    <HR NOSHADE SIZE="6">

    <h2 class="Titulo">Ações</h2> 

    <div class="btn-group" role="group" aria-label="...">
        <button type="button" class="btn btn-default" onclick="location.href = 'adicionar_cooperador'">Adicionar cooperador</button>
    </div>
    
    <HR NOSHADE SIZE="6">
    <h2 class="Titulo">Todos os cooperadores</h2> 
    <?php
    conexao();

    $sql_seleciona = "SELECT id_gede, usuario, nome, tipo FROM gede_usuarios";
    $resultado = seleciona($sql_seleciona);
    ?>

    <div style="overflow: auto; width: 1000px; height:500px; margin-bottom: 100px">
        <table border="0">
            <thead>
                <tr id="impar">
                    <th id="primeira_celula">Nome</th>
                    <th id="segunda_celula">Usuário</th>
                    <th id='terceira_celula'>Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                while ($res = mysql_fetch_assoc($resultado)) {

                    $parImpar = !($i % 2) ? "par" : "impar";
                    echo('<tr id="' . $parImpar . '">' .
                    '<td>' . $res['nome'] . '</td>' .
                    '<td>' . $res['usuario'] . '</td>' .
                    '<td>' . $res['tipo'] . '</td>' .
                    '<td>' .
                    '<form style="display: inline;" method="post" action="detalhes_cooperador.php" > <input style="display: none;" type="text" name="id" value="' . $res['id_gede'] . '">'
                    . '<button type="submit" class="btn btn-warning">&nbspExibir&nbsp </button> </form>' .
                    '<form style="display: inline;" method="post" action="" > <input type="text" style="display: none;" name="id" value="' . $res['id_gede'] . '">'
                    . '<button type="submit" class="btn btn-danger" onclick="return confirm(\'Deseja mesmo excluir?\')">Excluir</button> </form>' .
                    '</td>' .
                    '</tr>');
                    $i++;
                }
                ?>

            </tbody>
        </table>
    </div> 

    <h2 class="Titulo">Ações</h2> 

    <div class="btn-group" role="group" aria-label="...">
        <button type="button" class="btn btn-default" onclick="location.href = 'adicionar_cooperador.php'">Adicionar cooperador</button>


    </div>

</section>

<?php include("fim_pagina.php"); ?>