<?php
include("topo_pagina.php");

require_once('funcoes_uteis.php');
$opcao = $_POST["opcao"];
$chave = $_POST["nBusca"];
?>

<section>

    <h2 class="Titulo">Discentes da Instituição</h2>

    <form method="post" style="display: inline;" action="busca_alunos.php">
        <input style="display: inline;" size="100" type="text"  id="iBusca" name="nBusca" placeholder="&nbsp;Buscar discente por...">

        <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
        </button>

        <div class="radio">
            <label><input type="radio" name="opcao" value="nome" checked/>Nome</label>
            <label><input type="radio" name="opcao" value="id_inep">ID INEP</label>
            <label><input type="radio" name="opcao" value="cpf">CPF</label>
            <label><input type="radio" name="opcao" value="matricula_uefs">Matrícula</label>

        </div>

    </form>

    <?php
    conexao();

    if ($opcao == "id_inep") {
        $sql_seleciona = "SELECT id_inep, cpf, nome, matricula_uefs, id FROM alunos_dados_cadastrais WHERE id_inep='%$chave%'";
        $resultado = seleciona($sql_seleciona);
    } else if ($opcao == "nome") {
        $sql_seleciona = "SELECT id_inep, cpf, nome, matricula_uefs, id FROM alunos_dados_cadastrais WHERE nome LIKE '%$chave%'";
        $resultado = seleciona($sql_seleciona);
    } else if ($opcao == "cpf") {
        $sql_seleciona = "SELECT id_inep, cpf, nome, matricula_uefs, id FROM alunos_dados_cadastrais WHERE cpf LIKE '%$chave%'";
        $resultado = seleciona($sql_seleciona);
    } else if ($opcao == "matricula_uefs") {
        $sql_seleciona = "SELECT id_inep, cpf, nome, matricula_uefs, id FROM alunos_dados_cadastrais WHERE matricula_uefs LIKE '%$chave%'";
        $resultado = seleciona($sql_seleciona);
    }
    ?>

    <h2 class="Titulo">Número de registros encontrados: <?php echo (mysql_num_rows($resultado)); ?></h2> 

    <div style="overflow: auto; width: 1000px; height:500px; margin-bottom: 100px">
        <table border="0">
            <thead>
                <tr id="par">
                    <th id="primeiraCelula">Matrícula</th>
                    <th id="segundaCelula">CPF </th>
                    <th id='terceiraCelula'>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($res = mysql_fetch_assoc($resultado)) {

                    $parImpar = !($i % 2) ? "par" : "impar";
                    echo('<tr id="' . $parImpar . '">' .
                    '<td>' . $res['matricula_uefs'] . '</td>' .
                    '<td>' . $res['cpf'] . '</td>' .
                    '<td>' . $res['nome'] . '</td>' .
                    '<td>' .
                    '<form style="display: inline;" method="post" action="detalhes_aluno.php" > <input style="display: none;" type="text" name="matricula_uefs" value="' . $res['matricula_uefs'] . '">'
                    . '<button type="submit" class="btn btn-warning">&nbspExibir&nbsp </button> </form>' .
                    '<form style="display: inline;" method="post" action="bd_exclusao_aluno.php" > <input type="text" style="display: none;" name="matricula_uefs" value="' . $res['matricula_uefs'] . '">'
                    . '<button type="submit" class="btn btn-danger">Excluir</button> </form>' .
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