<?php
    if (!file_exists(include_once('../db/conexao.php')))
        include_once('../db/conexao.php');

    $button = 'Cadastrar';
    $conexao = conexaoMySQL();

    if (isset($_GET['action']) && strtoupper($_GET['action']) === 'EDIT') {
        $id = $_GET['id'];
        $conexao = conexaoMySQL();
        $sql = 'SELECT * FROM niveis WHERE id_nivel=' . $id . ';';
        $select = mysqli_query($conexao, $sql);

        if ($nivel = mysqli_fetch_array($select)) {
            $name = $nivel['nome'];
            $adm_conteudo = $nivel['adm_conteudo'];
            $adm_contato = $nivel['adm_contato'];
            $adm_usuarios = $nivel['adm_usuarios'];
        }

        $button = "Editar";

        if (!mysqli_query($conexao, $sql))
            echo("<script>alert('ERRO: Falha ao executar o script no banco de dados!');</script>");
    }
?>

<!DOCTYPE html>
<html lang="en">
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

        <!-- Conteúdo principal -->
        <div id="cms-principal">
            <div id="usuarios-container" class="content center">
                <h1> 
                    <strong> Administração de Usuários </strong>
                </h1>   
               
                <h2>
                    Níveis
                </h2>

                <form name="frm_level" method="POST" action="./db/salvar_nivel.php<?php if (isset($id)) echo('?action=edit&id=' . $id); ?>">
                    <input type="text" name="txt_name" value="<?=@$name?>" placeholder="Nome do nível*" required />
                    
                    <div>
                        <label>
                            <input type="checkbox" name="chk_conteudo" <?php if (@$adm_conteudo) echo('checked'); ?>>
                            <span>Administrar Conteúdo</span>
                        </label>
                            
                        <label>
                            <input type="checkbox" name="chk_contato" <?php if (@$adm_contato) echo('checked'); ?>>
                            <span>Administrar Contatos</span>
                        </label>
                            
                        <label>
                            <input type="checkbox" name="chk_usuarios" <?php if (@$adm_usuarios) echo('checked'); ?>>
                            <span>Administrar Usuários</span>
                        </label>
                    </div>

                    <input type="submit" name="btn_submit" value="<?=$button?>" />
                </form> 

                <table>
                    <tr id="tbl-header">
                        <td>NOME</td>
                        <td>ADMINISTRAR CONTEÚDO</td>
                        <td>ADMINISTRAR FALE CONOSCO</td>
                        <td>ADMINISTRAR USUÁRIOS</td>
                        <td>ESTADO</td>
                        <td>OPÇÕES</td>
                    </tr>

                    <?php
                    $sql = "SELECT * from niveis;";
             
                    $select = mysqli_query($conexao, $sql);

                    while ($rsNivel = mysqli_fetch_array($select)) { ?>
                        <tr>
                            <td><?=$rsNivel['nome']?></td>

                            <td> <?php
                                if ($rsNivel['adm_conteudo'])
                                    echo('Sim');
                                else   
                                    echo('Não'); ?>
                            </td>

                            <td> <?php
                                if ($rsNivel['adm_contato'])
                                    echo('Sim');
                                else   
                                    echo('Não'); ?>
                            </td>

                            <td> <?php
                                if ($rsNivel['adm_usuarios'])
                                    echo('Sim');
                                else   
                                    echo('Não'); ?>
                            </td>

                            <td class="tbl-enable-disable"> <?php
                                if ($rsNivel['status'])
                                    echo('
                                    <a href="./db/status_nivel.php?action=disable&id='. $rsNivel['id_nivel'] .'">
                                        <img src="./img/on.png" alt="Desabilitar" title="Desabilitar" /> 
                                    </a>');
                                else   
                                    echo('
                                    <a href="./db/status_nivel.php?action=enable&id='. $rsNivel['id_nivel'] .'">
                                        <img src="./img/off.png" alt="Habilitar" title="Habilitar" /> 
                                    </a>'); ?>
                            </td>

                            <td>
                                <a href="./niveis.php?action=edit&id=<?=$rsNivel['id_nivel']?>">
                                    <img src="./img/edit.png" alt="Editar" title="Editar" />
                                </a>

                                <a href="./db/deletar_nivel.php?action=delete&id=<?=$rsNivel['id_nivel']?>" onclick="return confirm('Deseja realmente excluir esse registro?');">
                                    <img src="./img/remove.png" alt="Remover" title="Remover" />
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <?php
            if (!file_exists(include_once('include/footer.php')))
                include_once('include/footer.php');
        ?>
    </body>
</html>