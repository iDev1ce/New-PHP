<?php 
    if (!file_exists(include_once('../db/conexao.php')))
        include_once('../db/conexao.php');

    if (!isset($_SESSION))
        session_start();
        
    if (!isset($_SESSION['username'])) 
        header('location:../');

    if (isset($_GET['action']) && strtolower($_GET['action']) === 'logout') {
        session_destroy();
        header('location:../');
    }

    $username = $_SESSION['username'];
?>

<div id="menu">
    <div class="content">
        <ul>
            <?php
            $conexao = conexaoMySQL();
            $sql = 'SELECT * FROM niveis WHERE id_nivel=' . $_SESSION['id_nivel'] . ';';
            $select = mysqli_query($conexao, $sql);

            if ($rsUser = mysqli_fetch_array($select)) {
                if ($rsUser['adm_conteudo']) { ?>
                    <li>
                        <a href="adm_conteudo.php">
                            <img alt="Administração de Conteúdo" src="img/adm_conteudo.png"/>
                            Administração de Conteúdo
                        </a>
                    </li>
                <?php }
                if ($rsUser['adm_usuarios']) { ?>
                    <li>
                        <a href="adm_usuarios.php">
                            <img alt="Administação de Usuários" src="img/adm_usuarios.png" style="margin-left: 0px;"/>
                            Administração de Usuários
                        </a>
                    </li>
                <?php }
                if ($rsUser['adm_contato']) { ?>
                    <li style="margin-right: 0px !important;">
                        <a href="./adm_contato.php">
                            <img alt="Administração do Fale Conosco" src="img/adm_contato.png" style="margin-left: 0px;"/>
                            Administração do Fale Conosco
                        </a>
                    </li>
                <?php }
            } ?>
        </ul>

        <div id="menu-greeting">
            Bem-vindo: <label class="bold"><?=@$username?></label>

            <div>
                <a href="?action=logout" onclick="return confirm('Deseja realmente sair?');"> Logout </a>
            </div>
        </div>
    </div>