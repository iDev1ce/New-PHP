<?php
    if (!file_exists(include_once('../db/conexao.php')))
        include_once('../db/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        
        <title>
            Frajola's Pizzaria - CMS
        </title>
        
        <link rel="icon" href="./img/icon.png">
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
            <div id="usuarios-container" class="conteudo center">
                <h1> 
                    <strong> Administração de Usuários </strong>
                </h1>   
                
                <ul id="cms-usuarios-opcoes">
                    <li>
                        <a href="./niveis.php">
                            <img src="./img/niveis.png" alt="Níveis" />
                            <div class="bold"> Níveis </div>
                        </a> 
                    </li>   

                    <li>
                        <a href="./usuarios.php">
                            <img src="./img/usuarios.png" alt="Usuários" />
                            <div class="bold"> Usuários </div>
                        </a>
                    </li>     
                </ul>
            </div>
        </div>

        <!-- Rodapé -->
        <?php 
            if (!file_exists(include_once('./include/footer.php')))
                include_once('./include/footer.php'); 
        ?>
    </body>
</html>