<?php
    if (!file_exists(include_once('../../db/conexao.php')))
        include_once('../../db/conexao.php');
        
    if (!isset($_SESSION))
        session_start();

    if (!isset($_SESSION['username'])) {
        header('location:../../'); 
        return;
    }

    if (isset($_GET['action'])) {

        $id = $_GET['id'];
        
        $conexao = conexaoMySQL();

        if (strtoupper($_GET['action']) === 'ENABLE') 
            $sql = 'UPDATE curiosidades SET status=1 WHERE id=' . $id . ';';
        elseif (strtoupper($_GET['action']) === 'DISABLE')
            $sql = 'UPDATE curiosidades SET status=0 WHERE id=' . $id . ';';

        if (mysqli_query($conexao, $sql))
            header('location:../curiosidades.php');
        else
            echo("<script>alert('ERRO: Falha ao executar o script no banco de dados!');</script>");
    }
?>