<?php
    if (!file_exists(include_once('../db/conexao.php')))
        include_once('../db/conexao.php');

    $button = 'Cadastrar';
    $conexao = conexaoMySQL();

    // Editar registro no banco
    if (isset($_GET['action']) && strtoupper($_GET['action']) === 'EDIT') {
        $id = $_GET['id'];

        $sql = 'SELECT * FROM usuarios WHERE id='. $id . ';';
        $select = mysqli_query($conexao, $sql);

        if ($user = mysqli_fetch_array($select)) {
            $name = $user['nome'];
            $email = $user['email'];
            $level = $user['id_nivel'];
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

        
        <!-- Favicon -->
        <link rel="icon" href="../img/favicon.png">

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
                    Usuários
                </h2>

                <form name="frm_user" method="POST" action="./db/salvar_usuario.php<?php if (isset($id)) echo('?action=edit&id=' . $id); ?>">
                    <input type="text" name="txt_name" value="<?=@$name?>" placeholder="Nome*" required />
                    <input type="email" name="txt_email" value="<?=@$email?>" placeholder="Email*" required />
                    <input type="password" name="txt_password" id="txt_password" placeholder="Senha*" required>
                    <select name="slt_nivel"> 
                        <?php
                        $sql = 'SELECT * FROM niveis;';
                        $select = mysqli_query($conexao, $sql);

                        // Resgatar valores da tabela no banco conforme a necessidade
                        while ($rs_nivel = mysqli_fetch_array($select)) { 
                            if ($rs_nivel['status']) { ?>
                                <option value="<?=$rs_nivel['id_nivel']?>" <?php if ($rs_nivel['id_nivel'] === @$level) echo('selected'); ?>>
                                    <?=$rs_nivel['nome']?>
                                </option>
                        <?php }} ?>
                    </select>

                    <input type="submit" name="btn_submit" value="<?=$button?>" />
                </form> 

                <table>
                    <tr id="tbl-header">
                        <td>NOME</td>
                        <td>E-MAIL</td>
                        <td>NIVEL</td>
                        <td>ESTADO</td>
                        <td>OPÇÕES</td>
                    </tr>

                    <?php
                    $sql = 'SELECT usuarios.*, niveis.nome AS nivel   
                    FROM usuarios INNER JOIN niveis
                    ON usuarios.id_nivel = niveis.id_nivel';
                    $select = mysqli_query($conexao, $sql);
                    
                    // Resgatar valores da tabela no banco conforme a necessidade
                    while ($rsUser = mysqli_fetch_array($select)) { ?>
                        <tr>
                            <td><?=$rsUser['nome']?></td>

                            <td><?=$rsUser['email']?></td>

                            <td><?=$rsUser['nivel']?></td>

                            <td class="tbl-enable-disable"> <?php
                                if ($rsUser['status']) {
                                    echo('
                                    <a href="./db/status_usuario.php?action=disable&id='. $rsUser['id'] .'">
                                        <img src="./img/on.png" alt="Desabilitar" title="Desabilitar" /> 
                                    </a>');
                                }
                                else   
                                    echo('
                                    <a href="./db/status_usuario.php?action=enable&id='. $rsUser['id'] .'">
                                        <img src="./img/off.png" alt="Habilitar" title="Habilitar" /> 
                                    </a>'); ?>
                            </td>

                            <td>
                                <a href="./usuarios.php?action=edit&id=<?=$rsUser['id']?>">
                                    <img src="./img/edit.png" alt="Editar" title="Editar" />
                                </a>

                                <a href="./db/deletar_usuario.php?action=delete&id=<?=$rsUser['id']?>" onclick="return confirm('Deseja realmente excluir esse registro?');">
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