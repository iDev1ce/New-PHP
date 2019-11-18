<?php
    if (!file_exists(include_once('../../db/conexao.php')))
        include_once('../../db/conexao.php');

    if (isset($_POST['action'])) {
        if (strtoupper($_POST['action']) === 'VISUALIZAR')  {

            $conexao = conexaoMySQL();
            $id = $_POST['id'];
            $sql = "SELECT * FROM curiosidades WHERE id=" . $id . ";";
            $select = mysqli_query($conexao, $sql);


            if ($rsCuriosidade = mysqli_fetch_array($select)) {
                $texto = $rsCuriosidade['texto'];
                $imagem = $rsCuriosidade['imagem'];
            }
        }
    }
?>
<html>
    <head>

    </head>

    <body>
        <table border='1'>
            <tr> 
                <td>Texto:</td>
                <td><?=$texto?></td>
            </tr>

            <tr> 
                <td>Imagem:</td>
                <td>
                    <img src="db/uploads/<?=$imagem?>" alt="Imagem">
                </td>
            </tr>
        </table>
    </body>
</html> 