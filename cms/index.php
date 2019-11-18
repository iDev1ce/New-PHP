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
        <title>CMS</title>

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

        <!-- -------------------- -->

        <!-- Footer -->
        <?php
            if (!file_exists(include_once('include/footer.php')))
                include_once('include/footer.php');
        ?>
    </body>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CMS</title>

        <link href="css/styles.css" rel="stylesheet" type="text/css">
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

        <!-- -------------------- -->

        <!-- Footer -->
        <?php
            if (!file_exists(include_once('include/footer.php')))
                include_once('include/footer.php');
        ?>
    </body>
</html>