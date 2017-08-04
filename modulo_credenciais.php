<?php
include("topo_pagina.php");
require_once('funcoes_uteis.php');

conexao();

$sql_seleciona = "SELECT nome, credencial FROM gede_credenciais";
$resultado = seleciona($sql_seleciona);
?>

<section>

    <h2 class="Titulo">Credencias ativas no sistema</h2>

    As credenciais permitem que terceiros possam navegar pelo sistema sem a possibilidade de realizar alterações nos dados armazenados. 

    <HR NOSHADE SIZE="6">

    <h2 class="Titulo">Ações</h2>

    <div class="btn-group" role="group" aria-label="...">
        <button type="button" class="btn btn-default" onclick="location.href = 'adicionar_credencial'">Criar credencial</button>
    </div>

    <HR NOSHADE SIZE="6">

    <h2 class="Titulo">Número de registros encontrados: <?php echo (mysql_num_rows($resultado)); ?></h2> 

    <div style="overflow: auto; width: 1000px; height:500px; margin-bottom: 100px">
        <table border="0">
            <thead>
                <tr id="impar">
                    <th id="primeiraCelula">Índice</th>
                    <th id="segundaCelula">Nome </th>
                    <th id='terceiraCelula'>Credencial</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($res = mysql_fetch_assoc($resultado)) {

                    $parImpar = !($i % 2) ? "impar" : "par";
                    echo('<tr id="' . $parImpar . '">' .
                    '<td>' . $i . '</td>' .
                    '<td>' . $res['nome'] . '</td>' .
                    '<td>' . $res['credencial'] . '</td>' .
                    '<td>' .
                    '<form style="display: inline;" method="post" action="" > <input style="display: none;" type="text" name="id" value="' . $res['id'] . '">'
                    . '<button type="submit" class="btn btn-warning">&nbspExibir&nbsp </button> </form>' .
                    '<form style="display: inline;" method="post" action="" > <input type="text" style="display: none;" name="id" value="' . $res['id'] . '">'
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
        <button type="button" class="btn btn-default" onclick="location.href = 'adicionar_credencial.php'">Adicionar credencial</button>


    </div>

</section>

<?php include("fim_pagina.php"); ?>