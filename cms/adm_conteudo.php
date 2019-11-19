<?php
    if (!file_exists(include_once('../db/conexao.php')))
        include_once('../db/conexao.php');

    if (!isset($_SESSION))
    session_start();

    // Validação de segurança
    if (!isset($_SESSION['username'])) {
        header('location:../../'); 
        return;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        
        <title>
            Frajola's Pizzaria - CMS
        </title>
        
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
            <div id="conteudo-container" class="conteudo center">
                <h1> 
                    <strong> Administração de Conteúdo </strong>
                </h1>     
                
                <ul id="curiosidades-opcoes">
                    <li>
                        <a href="./curiosidades.php">
                            <img src="./img/curiosidades.png" alt="Curiosidades" />
                            <label><strong> Curiosidades </strong></label>
                        </a> 
                    </li>   

                    <li>
                        <a href="./filiais.php">
                            <img src="./img/lojas.png" alt="Filiais" />
                            <strong> Nossas lojas </strong>
                        </a> 
                    </li>  

                    <li>
                        <a href="./sobre.php">
                            <img src="./img/sobre.png" alt="Sobre" />
                            <strong> Sobre </strong>
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