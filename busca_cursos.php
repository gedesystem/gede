<?php
include("topo_pagina.php");

require_once('funcoes_uteis.php');
$opcao = $_POST["opcao"];
$chave = $_POST["nBusca"];
?>

?>

<section>

    <h2 class="Titulo">Cursos da Instituição</h2>

    <form method="post" style="display: inline;" action=".php">
        <input style="display: inline;" size="100" type="text"  id="iBusca" name="nBusca" placeholder="&nbsp;Buscar curso por...">

        <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
        </button>

        <div class="radio">
            <label><input type="radio" name="opcao" value="nome" checked/>Nome</label>
            <label><input type="radio" name="opcao" value="codigo" >Código</label>
            <label><input type="radio" name="opcao" value="grau">Grau acadêmico</label>
        </div>

    </form>

    <HR NOSHADE SIZE="6">

    <?php
    conexao();

    if ($opcao == "codigo_curso") {
        $sql_seleciona = "SELECT codigo_curso, nome, id_gede FROM cursos_dados_cadastrais WHERE codigo_curso='$chave'";
        $resultado = seleciona($sql_seleciona);
    } else if ($opcao == "nome") {
        $sql_seleciona = "SELECT codigo_curso, nome, id_gede FROM cursos_dados_cadastrais WHERE nome LIKE '%$chave%'";
        $resultado = seleciona($sql_seleciona);
    } else if ($opcao == "grau") {
        $sql_seleciona = "SELECT codigo_curso, nome, id_gede FROM cursos_dados_cadastrais WHERE grau_academico='$chave'";
        $resultado = seleciona($sql_seleciona);
    }
    ?>

    <h2 class="Titulo">Todos os cursos da Instituição: <?php echo (mysql_num_rows($resultado)); ?></h2> 

    <div style="overflow: auto; width: 1000px; height:500px; margin-bottom: 100px">
        <table border="0">
            <thead>
                <tr id="par">
                    <th id="primeiraCelula">Código</th>
                    <th id="segundaCelula">Nome </th>
                    <th id='terceiraCelula'>Grau</th>
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
                    '<td>' . $res['cpf'] . '</td>' .
                    '<td>' . $res['grau'] . '</td>' .
                    '<td>' .
                    '<form style="display: inline;" method="post" action="detalhes_curso.php" > <input style="display: none;" type="text" name="id_gede" value="' . $res['id_gede'] . '">'
                    . '<button type="submit" class="btn btn-warning">&nbspExibir&nbsp </button> </form>' .
                    '<form style="display: inline;" method="post" action="bd_exclusao_curso.php" > <input type="text" style="display: none;" name="id_gede" value="' . $res['id_gede'] . '">'
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