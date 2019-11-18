<?php
    if (!file_exists(include_once('../db/conexao.php')))
        include_once('../db/conexao.php');

    $button = 'Cadastrar';
    $conexao = conexaoMySQL();

    if (isset($_GET['action']) && strtoupper($_GET['action']) === 'EDIT') {
        $id = $_GET['id'];

        $sql = 'SELECT * FROM filiais WHERE id_filial='. $id . ';';
        $select = mysqli_query($conexao, $sql);

        if ($rsFiliais = mysqli_fetch_array($select)) {
            $logradouro = $rsFiliais['logradouro'];
            $numero = $rsFiliais['numero'];
            $bairro = $rsFiliais['bairro'];
            $cidade = $rsFiliais['cidade'];
            $uf = $rsFiliais['uf'];
            $cep = $rsFiliais['cep'];
        }

        $button = 'Editar';

        if (!mysqli_query($conexao, $sql))
            echo("<script>alert('ERRO: Falha ao executar o script no banco de dados!');</script>");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Pizzaria Frajola - CMS</title>

    <link href="./css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>

    <!-- Cabeçalho -->
    <?php 
        if (!file_exists(include_once('./include/header.php')))
            include_once('./include/header.php'); 
    ?>

    <!-- Menu -->
    <?php 
        if (!file_exists(include_once('./include/menu.php')))
            include_once('./include/menu.php'); 
    ?>

    <!-- Conteudo Principal -->
    <div id="cms-principal">
        <div id="filiais-container" class="conteudo center">
            <h1> 
                <strong> Administração de Conteúdo </strong>
            </h1>  
                 
            <h2>
                Filiais
            </h2> 

            <form name="frm_filiais" method="POST" action="./db/salvar_filial.php<?php if (isset($id)) echo('?action=edit&id=' . $id); ?>">
                <input type="text" name="txt_logradouro" value="<?=@$logradouro?>" placeholder="Logradouro*" required />
                <input type="text" name="txt_numero" value="<?=@$numero?>" placeholder="Número*" required />
                <input type="text" name="txt_bairro" value="<?=@$bairro?>" placeholder="Bairro*" required />
                <input type="text" name="txt_cidade" value="<?=@$cidade?>" placeholder="Cidade*" required />
                <input type="text" name="txt_uf" value="<?=@$uf?>" placeholder="UF*" required />
                <input type="text" name="txt_cep" value="<?=@$cep?>" placeholder="CEP*" required />

                <input type="submit" name="btn_submit" value="<?=$button?>" />
            </form>
            
            <table>
                    <tr id="tbl-header">
                        <td>LOGRADOURO</td>
                        <td>NÚMERO</td>
                        <td>BAIRRO</td>
                        <td>CIDADE</td>
                        <td>UF</td>
                        <td>CEP</td>
                        <td>ESTADO</td>
                        <td>OPÇÕES</td>
                    </tr>

                    <?php

                    $sql = 'SELECT * FROM filiais;';
                    $select = mysqli_query($conexao, $sql);

                    while ($rsFiliais = mysqli_fetch_array($select)) { ?>
                        <tr>
                            <td><?=$rsFiliais['logradouro']?></td>

                            <td><?=$rsFiliais['numero']?></td>

                            <td><?=$rsFiliais['bairro']?></td>

                            <td><?=$rsFiliais['cidade']?></td>

                            <td><?=$rsFiliais['uf']?></td>

                            <td><?=$rsFiliais['cep']?></td>

                            <td class="tbl-enable-disable"> <?php
                                if ($rsFiliais['status']) {
                                    echo('
                                    <a href="./db/status_filial.php?action=disable&id='. $rsFiliais['id_filial'] .'">
                                        <img src="./img/on.png" alt="Desabilitar" title="Desabilitar" /> 
                                    </a>');
                                }
                                else   
                                    echo('
                                    <a href="./db/status_filial.php?action=enable&id='. $rsFiliais['id_filial'] .'">
                                        <img src="./img/off.png" alt="Habilitar" title="Habilitar" /> 
                                    </a>'); ?>
                            </td>

                            <td>
                                <a href="filiais.php?action=edit&id=<?=$rsFiliais['id_filial']?>">
                                    <img src="./img/edit.png" alt="Editar" title="Editar" />
                                </a>

                                <a href="./db/deletar_filial.php?action=delete&id=<?=$rsFiliais['id_filial']?>" onclick="return confirm('Deseja realmente excluir esse registro?');">
                                    <img src="./img/remove.png" alt="Remover" title="Remover" />
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

        </div>
    </div>
    

    <!-- Rodapé -->
    <?php 
        if (!file_exists(include_once('./include/footer.php')))
            include_once('./include/footer.php'); 
    ?>

</body>
</html>