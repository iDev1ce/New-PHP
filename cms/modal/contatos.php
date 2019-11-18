<?php
    if (!file_exists(include_once('../../db/conexao.php')))
        include_once('../../db/conexao.php');

    if (isset($_POST['action'])) {
        if (strtoupper($_POST['action']) === 'VISUALIZAR')  {

            $conexao = conexaoMySQL();
            $id = $_POST['id'];
            $sql = "SELECT * FROM tbl_contatos WHERE id=" . $id . ";";
            $select = mysqli_query($conexao, $sql);

            if ($rsContato = mysqli_fetch_array($select)) {
                $nome = $rsContato['nome'];
                $telefone = $rsContato['telefone'];
                $celular = $rsContato['celular'];
                $email = $rsContato['email'];
                $home_page = $rsContato['homepage'];
                $facebook = $rsContato['facebook'];
                $sugestao_critica = $rsContato['critica_sugestao'];
                $mensagem = $rsContato['mensagem'];
                $sexo = $rsContato['sexo'];
                $profissao = $rsContato['profissao'];
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
                <td>Nome:</td>
                <td><?=$nome?></td>
            </tr>

            <tr> 
                <td>Telefone:</td>
                <td><?=$telefone?></td>
            </tr>

            <tr> 
                <td>Celular:</td>
                <td><?=$celular?></td>
            </tr>

            <tr> 
                <td>E-mail:</td>
                <td><?=$email?></td>
            </tr>

            <tr> 
                <td>Homepage:</td>
                <td><?=$home_page?></td>
            </tr>

            <tr> 
                <td>Facebook:</td>
                <td><?=$facebook?></td>
            </tr>

            <tr> 
                <td>Sugestão/Crítica:</td>
                <td>
                    <?php
                    if ($sugestao_critica === 'critica')
                        echo('Crítica');
                    elseif ($sugestao_critica === 'sugestao')
                        echo('Sugestão'); 
                    ?>
                </td>
            </tr>

            <tr> 
                <td>Mensagem:</td>
                <td><?=$mensagem?></td>
            </tr>

            <tr> 
                <td>Sexo:</td>
                <td>
                    <?php
                    if ($sexo === 'M')
                        echo('Masculino');
                    elseif ($sexo === 'F')
                        echo('Feminino'); 
                    ?>
                </td>
            </tr>

            <tr> 
                <td>Profissão:</td>
                <td><?=$profissao?></td>
            </tr>
        </table>
    </body>
</html>