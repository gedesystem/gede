<?php include("topo_pagina.php");
require_once('funcoes_uteis.php');

?>
<section>

    <h2 class="Titulo">Docentes da Instituição</h2>

    <form method="post" style="display: inline;" action=".php">
        <input style="display: inline;" size="100" type="text"  id="iBusca" name="nBusca" placeholder="&nbsp;Buscar docente por...">

        <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
        </button>

        <div class="radio">
            <label><input type="radio" name="opcao" value="id">ID INEP</label>
            <label><input type="radio" name="opcao" value="nome" checked/>Nome</label>
            <label><input type="radio" name="opcao" value="cpf">CPF</label>
            <label><input type="radio" name="opcao" value="matricula">Matrícula</label>
            <label><input type="radio" name="opcao" value="departamento">Departamento</label>
        </div>
    </form>

    <HR NOSHADE SIZE="6">

    <?php
    conexao();

    $sql_seleciona = "SELECT id_gede, codigo_curso, nome, grau FROM cursos_dados_cadastrais";
    $resultado = seleciona($sql_seleciona);
    ?>

    <h2 class="Titulo">Todos os cursos da Instituição: <?php echo (mysql_num_rows($resultado)); ?></h2> 

    <div style="overflow: auto; width: 1000px; height:500px; margin-bottom: 100px">
        <table border="0">
            <thead>
                <tr id="impar">
                    <th id="primeira_celula">Código INEP</th>
                    <th id="segunda_celula">Nome </th>
                    <th id='terceira_celula'>Grau</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $i = 0;
                while ($res = mysql_fetch_assoc($resultado)) {

                    $parImpar = !($i % 2) ? "par" : "impar";
                    echo('<tr id="' . $parImpar . '">' .
                    '<td>' . $res['codigo_curso'] . '</td>' .
                    '<td>' . $res['nome'] . '</td>' .
                    '<td>' . $res['grau'] . '</td>' .
                    '<td>' .
                    '<form style="display: inline;" method="post" action="detalhes_curso.php" > <input style="display: none;" type="text" name="id" value="' . $res['id'] . '">'
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

</section>

<?php include("fim_pagina.php"); ?>

