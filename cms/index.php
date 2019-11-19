<?php
    if (!file_exists(include_once('../db/conexao.php')))
        include_once('../db/conexao.php');

    if (!isset($_SESSION))
        session_start();

    if (!isset($_SESSION['username'])) 
        header('location:../');
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

        <link type="text/css" rel="stylesheet" href="css/styles.css">
    </head>
    <body>

        <!-- Header -->
        <?php
            if (!file_exists(include_once('include/header.php')))
                include_once('include/header.php');
        ?>

        <!-- Menu -->
        <?php
            if (!file_exists(include_once('include/menu.php')))
                include_once('include/menu.php');
        ?>

        <!-- Conteudo Principal -->
        <div id="cms-principal" style="margin-bottom: 0px;">
            <div class="conteudo center">
                <h2>
                    Bem-vindo ao CMS (Content Management System)
                </h2>
                <br>
                <p>
                    Este sistema tem como objetivo auxiliar a manutenção diária do sistema como um todo, trazendo agilidade e flexibilidade ao usuário.
                </p>
                <br>
                <p>
                    Através deste "terminal" é possível fazer diversas mudanças no sistema, sendo possível:
                </p>
                <br>

                <ul style="margin-left:45px;">
                    <li>
                        Administrar diretamente os conteúdos do site
                    </li> 
                    <li>
                        Administrar usuáríos e permissões
                    </li>
                    <li>
                        Analizar e administrar mensagens enviadas pelos clientes.
                    </li>
                </ul>
                <br>
                <br>
                <p>
                    Trazer <strong>eficiência</strong>, <strong>qualidade</strong> e <strong>velocidade</strong> é o lema da Pizzaria Frajola's
                </p>
                <p style="margin-left: 550px; margin-top: 100px">
                    <strong>"Frajola's, mais que uma pizzaria"</strong>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <?php
            if (!file_exists(include_once('include/footer.php')))
                include_once('include/footer.php');
        ?>
    </body>
</html>